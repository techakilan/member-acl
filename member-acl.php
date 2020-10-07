<?php
/**
 * WordPress Plugin for User Role Management
 *
 * User Role Mangement using ACL for user and roles
 *
 * @link              https://github.com/techakilan
 * @since             1.0
 * @package           Member_ACL_Name_Space
 *
 * @wordpress-plugin
 * Plugin Name:       Member ACL Plugin
 * Plugin URI:        https://github.com/teachakilan
 * Description:       WordPress Plugin for User Role Management
 * Version:           1.0
 * Author:            Akilan T <techakilan@gmail.com>
 * Author URI:        https://github.com/techakilan
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use Member_ACL_Name_Space\Includes\Admin\AdminMenu\MemberAcl\Main_Menu;
use Member_ACL_Name_Space\Includes\Admin\AdminSubMenu\MemberAcl\Add_Role_Menu;
use Member_ACL_Name_Space\Includes\Admin\AdminSubMenu\MemberAcl\Edit_Role_Menu;
use Member_ACL_Name_Space\Includes\Admin\Api\MemberAcl\{Add_New_Role, Update_Role_Capabilities};
use Member_ACL_Name_Space\Includes\Admin\Utility\MemberAcl\Scripts_Loader;
use Member_ACL_Name_Space\Includes\Admin\Utility\MemberAcl\Setup_Roles_From_Config;
use Member_ACL_Name_Space\Includes\Config\MemberAcl\Plugin_Config;
use Member_ACL_Name_Space\Includes\Init\MemberAcl\Constant;

/**
 * If this file is called directly, then abort execution.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Member_ACL_Plugin
 *
 * This class is a singleton.
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 *
 */

final class Member_ACL_Plugin
{
    /**
     * Instance property of Member_ACL_Plugin Class.
     * This is a property in your plugin primary class.
     * This property holds Member_ACL_Plugin singleton object.
     *
     * @access private
     * @var    Member_ACL_Plugin $instance will be a singleton.
     * Only one instance ofthis class will be instatiated.
     * @static
     */
    private static $instance;

    /**
     * Member_ACL_Plugin constructor.
     * The method loads autoloader.
     * The method registers activation hook, deactivation hook and
     * uninstall hook and call Core class to run dependencies for plugin
     *
     * @access private
     */
    private function __construct()
    {
        /*Define path of Autoloader class */
        $autoloader_path = 'includes/common/class-autoloader.php';
        /**
         * Include autoloader class to load all of classes inside this plugin
         */
        //echo trailingslashit(plugin_dir_path(__FILE__)) . $autoloader_path;exit;
        require_once trailingslashit(plugin_dir_path(__FILE__)) . $autoloader_path;
        /*Load all constants defined for the plugin in Constant class*/
        Constant::define_constant();

    }

    /**
     * Create a singleton instance from Member_ACL_Plugin class.
     *
     * @access public
     * @since  1.0
     * @return Member_ACL_Plugin
     */
    public static function instance()
    {
        if (is_null((self::$instance))) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Load Core plugin class.
     *
     * @access public
     * @since  1.0
     */
    public function run()
    {

        $pluginConfig = new Plugin_Config();
        $pluginConfig->configure();
        (new Scripts_Loader($pluginConfig->required_scripts, $pluginConfig->version))->register();

        //Register Admin Menu and Submenu Classes
        (new Main_Menu($pluginConfig->admin_menu_pages['Member_Acl_Main_Menu']))->register_add_action();
        (new Edit_Role_Menu($pluginConfig->admin_submenu_pages['Member_Acl_Edit_Role_Menu']))->register_add_action();
        (new Add_Role_Menu($pluginConfig->admin_submenu_pages['Member_Acl_Add_Role_Menu']))->register_add_action();

        //Setup New Role from the Config
        (new Setup_Roles_From_Config())->add_roles($pluginConfig->custom_user_roles);

        //Setup Ajax Action Nonce 
        $ajax_actions = [
            "main_role_capabilities_action",
            "update_role_capabilities_action",
        ];

        (new Update_Role_Capabilities($ajax_actions))->register_add_action();
        $ajax_actions = [
            'add_new_role_action_nonce',
        ];
        (new Add_New_Role($ajax_actions))->register_add_action();

    }
}

$member_acl = Member_ACL_Plugin::instance();
$member_acl->run();
