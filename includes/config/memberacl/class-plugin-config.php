<?php
/**
 * Plugin_Config Class File
 * Configuration elements like custom post types, admin menu,
 * admin submenus, taxonomies etc for the plugin are defined here.
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/techakilan
 * @since      1.0
 */

namespace Member_ACL_Name_Space\Includes\Config\MemberAcl;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Plugin_Config.
 * Configuration elements like custom post types, admin menu,
 * admin submenus, taxonomies etc for the plugin are defined heby this class.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 */

class Plugin_Config
{
    /**
     * Version Number of the plugin
     *
     * @access public
     * @var string current version number of the plugin.
     * @since      1.0
     */
    public $version = '1.0';
    /**
     * Define admin_menu_pages property in Plugin_Config class.
     * This property use to configure element admin menu
     * @access     protected
     * @var array $admin_menu_pages The array having details of admin menu pages
     * @since      1.0
     */
    public $admin_menu_pages;

    /**
     * Define admin_submenu_pages property in Plugin_Config class.
     * This property use to configure element admin submenus
     * @access     protected
     * @var array $admin_submenu_pages The array having details of admin submenu pages
     * @since      1.0
     */
    public $admin_submenu_pages;

    /**
     * Define custom_user_roles property in Plugin_Config class.
     * This property use to configure custom user roles
     * @access     protected
     * @var array $custom_user_roles The array having details of custom user roles
     * that is created during plugin install.
     * @since      1.0
     */
    public $custom_user_roles;

    /**
     * Default user roles as defined in wordpress
     *
     * @access public
     * @var array It has all of Default user roles as defined in wordpres
     * @since      1.0
     */

    public $default_wp_user_roles;

    /**
     * Required JS,CSS etc scripts required for the plugin.
     *
     * @access public
     * @var array It has all JS,CSS etc scripts required for the plugin.
     * @since      1.0
     */
    public $required_scripts;
    public function configure()
    {
        $this->admin_menu_pages = [
            'Member_Acl_Main_Menu' => [
                'page_title' => esc_html__('Member ACL', Member_ACL_TEXTDOMAIN),
                'menu_title' => esc_html__('Member ACL', Member_ACL_TEXTDOMAIN),
                'capability' => 'manage_options',
                'menu_slug' => 'member-acl',
                'callable_function' => 'render_admin_menu_page',
                'icon_url' => 'dashicons-welcome-widgets-menus',
                'position' => 2,
            ],
            'Test_Values' => [
                'page_title' => esc_html__('Member ACL2', Member_ACL_TEXTDOMAIN),
                'menu_title' => esc_html__('Member ACL2', Member_ACL_TEXTDOMAIN),
                'capability' => 'manage_options',
                'menu_slug' => 'member-acl-new',
                'callable_function' => 'render_admin_menu_page',
                'icon_url' => 'dashicons-welcome-widgets-menus',
                'position' => 99,
            ],

        ];
        $this->admin_submenu_pages = [
            'Member_Acl_List_Roles_Menu' => [
                'parent-slug' => 'member-acl',
                'page_title' => esc_html__('List Custom Roles', Member_ACL_TEXTDOMAIN),
                'menu_title' => esc_html__('List Custom Roles', Member_ACL_TEXTDOMAIN),
                'capability' => 'manage_options',
                'menu_slug' => 'member-acl',
                'callable_function' => 'render_admin_submenu_page',
            ],
            'Member_Acl_Edit_Role_Menu' => [
                'parent-slug' => 'member-acl',
                'page_title' => esc_html__('Edit Custom Role', Member_ACL_TEXTDOMAIN),
                'menu_title' => esc_html__('Edit Custom Role', Member_ACL_TEXTDOMAIN),
                'capability' => 'manage_options',
                'menu_slug' => 'member-acl-edit-role',
                'callable_function' => 'render_admin_submenu_page',
            ],
            'Member_Acl_Add_Role_Menu' => [
                'parent-slug' => 'member-acl',
                'page_title' => esc_html__('Add Custom Role', Member_ACL_TEXTDOMAIN),
                'menu_title' => esc_html__('Add Custom Role', Member_ACL_TEXTDOMAIN),
                'capability' => 'manage_options',
                'menu_slug' => 'member-acl-add-role',
                'callable_function' => 'render_admin_submenu_page',
            ],
        ];
        $this->custom_user_roles = [
            'member_acl_admin' => [
                'role' => 'member_acl_admin',
                'display_name' => esc_html__('Member Acl Admin', Member_ACL_TEXTDOMAIN),
                'capabilities' => [
                    'read' => true,
                    'edit_posts' => true,
                    'edit_others_posts' => true,
                    'edit_published_posts' => true,
                ],

            ],
            'member_acl_member' => [
                'role' => 'member_acl_member',
                'display_name' => esc_html__('Member Acl Member', Member_ACL_TEXTDOMAIN),
                'capabilities' => [
                    'read' => true,
                    'edit_posts' => true,

                ],

            ],
        ];
        $this->default_wp_user_roles = [
            'administrator',
            'editor',
            'author',
            'contributor',
            'subscriber',
        ];
        $this->required_scripts = [
            'styles' => [
                'member-acl-main-css' => 'assets/admin/css/member-acl-main.css',
            ],
            'scripts' => [
                'member-acl-main-js' => 'assets/admin/js/member-acl-main.js',
            ],
            'localized_scripts' => [
                'ajax_url' =>
                [
                    'script_name' => 'member-acl-main-js',
                    'object_name' => 'ajax_obj',
                    'object_props' => [
                        'ajax_url' => admin_url('admin-ajax.php'),
                    ],

                ],
            ],
        ];

    }
}
