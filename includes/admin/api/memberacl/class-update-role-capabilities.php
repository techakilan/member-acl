<?php

namespace Member_ACL_Name_Space\Includes\Admin\Api\MemberAcl;

use Member_ACL_Name_Space\Includes\Abstracts\MemberAcl\Admin_Ajax_Handler_Base;
use Member_ACL_Name_Space\Includes\Admin\Functions\MemberAcl\Role_Capabilities_Master;

if (!defined('ABSPATH')) {
    exit;
}

class Update_Role_Capabilities extends Admin_Ajax_Handler_Base
{

    /*
     * Handle method for ajax request in back-end
     * */
    public function handle()
    {
        $response = [];

        /* $response = [
        'error' => false,
        'message' => 'debug',
        'action_type' =>  $_POST['action_type'],
        'new_role_name' => $_POST['new_role_name'],
        'selected_member_role'=> $_POST['selected_member_role'],
        'role_capabilities' => $_POST['role_capabilities'],

        ];
        exit(json_encode($response)); */

        switch (true) {
            //Edit role Menu Page actions
            case ((
                    isset($_POST['update_role_capabilities_nonce'])

                    && wp_verify_nonce($_POST['update_role_capabilities_nonce'], 'update_role_capabilities_action_nonce')
                )):
                if (isset($_POST['action_type']) && $_POST['action_type'] == "delete_selected_roles") {
                    $response = $this->remove_role($_POST['selected_member_roles']);
                } else if (isset($_POST['action_type']) && $_POST['action_type'] == "delete_role") {
                    $response = $this->remove_role($_POST['selected_member_role']);
                } else if (isset($_POST['action_type']) && $_POST['action_type'] == "add_role") {
                    $response = $this->add_new_role($_POST['new_role_name'], $_POST['role_capabilities']);
                } else if (isset($_POST['action_type']) && $_POST['action_type'] == "update_role") {
                    $response = $this->update_role_caps($_POST['selected_member_role'], $_POST['role_capabilities']);
                }
                break;
            // Main role menu page actions
            case ((
                    isset($_POST['main_role_capabilities_nonce'])
                    && wp_verify_nonce($_POST['main_role_capabilities_nonce'], 'main_role_capabilities_action_nonce')
                )):
                if (isset($_POST['action_type']) && $_POST['action_type'] == "delete_role") {
                    $response = $this->remove_role($_POST['selected_member_role']);
                }
                break;
            //Add role page actions
            case ((
                    isset($_POST['add_new_role_nonce'])
                    && wp_verify_nonce($_POST['add_new_role_nonce'], 'add_new_role_action_nonce')
                )):
                if (isset($_POST['action_type']) && $_POST['action_type'] == "add_new_role") {
                    $response = $this->add_new_role($_POST['new_role_name'], $_POST['role_capabilities']);
                }
                break;
            default:
                $response = [
                    'error' => true,
                    'message' => 'The form is not valid',
                ];
                break;

        }

        /* if (
        !isset($_POST['update_role_capabilities_nonce'])
        || !wp_verify_nonce($_POST['update_role_capabilities_nonce'], 'update_role_capabilities_action_nonce')
        ) {
        $response = [
        'error' => true,
        'message' => 'The form is not valid',
        ];

        } else {
        if (isset($_POST['action_type']) && $_POST['action_type'] == "delete_selected_roles") {
        $response = $this->remove_role($_POST['selected_member_roles']);
        } else if (isset($_POST['action_type']) && $_POST['action_type'] == "delete_role") {
        $response = $this->remove_role($_POST['selected_member_role']);
        } else if (isset($_POST['action_type']) && $_POST['action_type'] == "add_role") {
        $response = $this->add_new_role($_POST['new_role_name'], $_POST['role_capabilities']);
        } else if (isset($_POST['action_type']) && $_POST['action_type'] == "update_role") {
        $response = $this->update_role_caps($_POST['selected_member_role'], $_POST['role_capabilities']);
        }
        }; */

        // A default response holder, which will have data for sending back to our js file

        // ... Do some code here, like storing inputs to the database, but don't forget to properly sanitize input data!

        // Don't forget to exit at the end of processing

        exit(json_encode($response));
    }

    private function update_role_caps($submitted_member_role, $new_capabilities)
    {
        $selected_role = get_role($submitted_member_role);
        $current_capabilities = array_keys($selected_role->capabilities);
        $new_capabilities = array_keys($new_capabilities);

        $add_caps = array_diff($new_capabilities, $current_capabilities);
        $remove_caps = array_diff($current_capabilities, $new_capabilities);

        foreach ($add_caps as $capability) {
            $selected_role->add_cap($capability);

        }
        foreach ($remove_caps as $capability) {
            $selected_role->remove_cap($capability);
        }

        $roles = get_editable_roles();
        $roles_caps_master = Role_Capabilities_Master::get($roles);

        $response = [
            'error' => false,
            'message' => 'The role is updated',
            'selected_member_role' => $selected_role,
            'roles_caps_master' => $roles_caps_master,
        ];
        return $response;
    }

    private function add_new_role($new_member_name, $new_capabilities)
    {
        if (empty($new_capabilities) || !isset($new_capabilities)) {
            $response = [
                'error' => true,
                'message' => 'Validation Failed',
            ];
            exit(json_encode($response));
        }
        $display_name = trim($new_member_name);
        $role_name = preg_replace('/\s{1,}/', '_', $display_name);
        $display_name = esc_html__($display_name, Member_ACL_TEXTDOMAIN);

        $status = add_role($role_name, $display_name, $new_capabilities);
        if ($status == null) {
            $response = [
                'error' => true,
                'message' => 'Add Role Failed',

            ];
            exit(json_encode($response));
        }
        $roles = get_editable_roles();
        $roles_caps_master = Role_Capabilities_Master::get($roles);

        $response = [
            'error' => false,
            'message' => 'Role added successfully',
            'role_name' => $role_name,
            'display_name' => $display_name,
            'roles_caps_master' => $roles_caps_master,

        ];
        return $response;
    }

    private function remove_role($role_name)
    {
        $args = ['role' => $role_name];
        $users = get_users($args);
        foreach ($users as $user) {
            $u->set_role('subscriber');
        }
        remove_role($role_name);
        $response = [
            'error' => false,
            'message' => 'Role removed successfully',
            'role_name' => $role_name,
        ];
        return $response;
    }

    private function remove_selected_roles(array $role_names)
    {
        foreach ($role_names as $role_name) {
            $args = ['role' => $role_name];
            $users = get_users($args);
            foreach ($users as $user) {
                $u->set_role('subscriber');
            }
            remove_role($role_name);
        }
        $response = [
            'error' => false,
            'message' => 'Roles removed successfully',
            'role_names' => $role_names,
        ];
        return $response;
    }
    public function add_action($action)
    {

    }

}
