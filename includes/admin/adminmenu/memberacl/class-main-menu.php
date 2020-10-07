<?php
/**
 * Admin_Menu_Member_ACl Class File
 *
 * This file contains Admin_Menu_Member_ACl class. If you want create an admin page for member acl
 * inside admin panel of WordPress, you can use from this class.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/techakilan
 * @since      1.0
 */

namespace Member_ACL_Name_Space\Includes\Admin\AdminMenu\MemberAcl;

use Member_ACL_Name_Space\Includes\Abstracts\MemberAcl\Admin_Menu_Base;
use Member_ACL_Name_Space\Includes\Admin\Functions\MemberAcl\Role_Capabilities_Master;
use Member_ACL_Name_Space\Includes\Functions\Template_Builder;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Admin_Menu_Member_ACl.
 * If you want create an admin page inside admin panel of WordPress,
 * you can use from this class.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
class Main_Menu extends Admin_Menu_Base
{
    use Template_Builder;
    /**
     * Admin_Menu_Member_ACl constructor.
     * This constructor gets initial values to send to add_menu_page function to
     * create admin menu.
     *
     * @access public
     *
     * @param array $initial_value Initial value to pass to add_menu_page function.
     */
    public function __construct(array $admin_menu_page)
    {
        parent::__construct($admin_menu_page);
    }

    /**
     * Method render_admin_menu_page in Admin_Menu Class
     *
     * For each admin menu page, we must have callable function that render and
     * handle this menu page. For each menu page, you must have its own function.
     *
     * @access  public
     */
    public function render_admin_menu_page()
    {
        $editable_roles = get_editable_roles();
        $roles_caps_master = Role_Capabilities_Master::get($editable_roles );
        $this->load_template( 'member-acl.main-menu', ['roles_caps_master'=>$roles_caps_master] );
    }
}

