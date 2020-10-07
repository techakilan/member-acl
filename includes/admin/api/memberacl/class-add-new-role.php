<?php

namespace Member_ACL_Name_Space\Includes\Admin\Api\MemberAcl;

use Member_ACL_Name_Space\Includes\Abstracts\MemberAcl\Admin_Ajax_Handler_Base;
use Member_ACL_Name_Space\Includes\Admin\Role_Capabilities_Master;

if (!defined('ABSPATH')) {
    exit;
}

class Add_New_Role extends Admin_Ajax_Handler_Base
{

    /*
     * Handle method for ajax request in back-end
     * */
    public function handle()
    {
        $response = [];

        if (
            !isset($_POST['add_new_role_nonce'])
            || !wp_verify_nonce($_POST['add_new_role_nonce'], 'add_new_role_action_nonce')
        ) {
            $response = [
                'error' => true,
                'message' => 'The form is not valid',
            ];

        } else {

            $display_name = trim($_POST['new_role_name']);
            $role_name = preg_replace('/\s{1,}/', '_',$display_name);
            $display_name = esc_html__($display_name , Member_ACL_TEXTDOMAIN);


            $capabilities = $_POST['role_capabilities'];

            

           $status = add_role($role_name,$display_name, $capabilities);

            $response = [
                'error' => false,
                'message' => 'Role added successfully',
                
            ];
            /* $selected_role = get_role($_POST['selected_member_role']);
            $current_capabilities = array_keys($selected_role->capabilities);
            $new_capabilities = array_keys($_POST['role_capabilities']);
            $add_caps = array_diff($new_capabilities, $current_capabilities);
            $remove_caps = array_diff($current_capabilities, $new_capabilities);
            $test = [];
            foreach ($add_caps as $capability) {
                $selected_role->add_cap($capability);

            }
            foreach ($remove_caps as $capability) {
                $selected_role->remove_cap($capability);
            }

            global $wp_roles;
            $roles = $wp_roles->roles;
            $role_cap_master = Role_Capabilities_Master::get($roles);
            $response = [
                'error' => false,
                'message' => 'The role is updated',
                'selected_member_role' => $selected_role,
                'role_cap_master' => $role_cap_master,
            ]; */

        };

        // A default response holder, which will have data for sending back to our js file

        // ... Do some code here, like storing inputs to the database, but don't forget to properly sanitize input data!

        // Don't forget to exit at the end of processing

        exit(json_encode($response));
    }

}
