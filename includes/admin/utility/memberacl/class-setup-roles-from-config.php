<?php

namespace Member_ACL_Name_Space\Includes\Admin\Utility\MemberAcl;

if (!defined('ABSPATH')) {
    exit;
}

class Setup_Roles_From_Config{
    public function add_roles(array $user_roles)
    {
        foreach ($user_roles as $user_role) {
            add_role(
                $user_role['role'],
                $user_role['display_name'],
                $user_role['capabilities']
            );
        }
    }
    public function remove_roles(array $role_names)
    {
        foreach ($role_names as $role_name) {
            remove_role($role_name);
        }
    }
    
}