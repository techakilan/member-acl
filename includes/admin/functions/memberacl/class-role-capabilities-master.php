<?php
namespace Member_ACL_Name_Space\Includes\Admin\Functions\MemberAcl;

if (!defined('ABSPATH')) {
    exit;
}

class Role_Capabilities_Master{
    public static function get(array $roles){
        $custom_roles =array(); 
        $capabilities = array();
        foreach ($roles as $key => $value) {
            $capabilities = array_merge($value['capabilities'],$capabilities);
            if (!in_array($key, [
                'administrator',
                'editor',
                'author',
                'contributor',
                'subscriber',
            ])) {
                $custom_roles[$key] = $value;
                //echo implode(" ", $value['capabilities']);
            }
        }
        $result =[
            'all_roles' => $roles ,
            'custom_roles' => $custom_roles,
            'capabilities' => $capabilities
        ];
        return $result;
    }
}