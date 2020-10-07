<?php
/**
 * Admin_Submenu_Member_Acl Class File
 *
 * This file contains Admin_Sub_Menu class. If you want create an sub menu page
 * under an admin page (inside Admin panel of WordPress), you can use from this class.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/techakilan
 * @since      1.0
 */

namespace Member_ACL_Name_Space\Includes\Admin\AdminSubmenu\MemberAcl;

use Member_ACL_Name_Space\Includes\Abstracts\MemberAcl\Admin_Submenu_Base;
use Member_ACL_Name_Space\Includes\Admin\Functions\MemberAcl\Role_Capabilities_Master;
use Member_ACL_Name_Space\Includes\Functions\Template_Builder;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Admin_Submenu_Member_Acl.
 * If you want create an sub menu page under an admin page
 * (inside Admin panel of WordPress), you can use from this class.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_submenu_page/
 * @see        https://codex.wordpress.org/Creating_Options_Pages
 * @see        https://codex.wordpress.org/Settings_API
 * @see        https://wisdmlabs.com/blog/create-settings-options-page-for-wordpress-plugin/
 * @see        https://www.smashingmagazine.com/2016/04/three-approaches-to-adding-configurable-fields-to-your-plugin/
 */
class Add_Role_Menu extends Admin_Submenu_Base {
	use Template_Builder;

	/**
	 * Admin_Submenu_Member_Acl constructor.
	 * This constructor gets initial values to send to add_submenu_page function to
	 * create admin submenu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_submenu_page function.
	 */
	public function __construct( array $admin_submenu_page ) {
		parent::__construct( $admin_submenu_page );
	}

	/**
	 * Method render_sub_menu_page in Admin_Submenu_Member_Acl Class
	 *
	 * For each admin submenu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must have its own function.
	 *
	 * @access  public
	 * @see     https://codex.wordpress.org/index.php?title=Creating_Options_Pages&oldid=97268
	 * @see     https://wisdmlabs.com/blog/create-settings-options-page-for-wordpress-plugin/
	 */
	public function render_sub_menu_page() {
		$editable_roles = get_editable_roles();
        $roles_cap_master = Role_Capabilities_Master::get($editable_roles );
        $this->load_template( 'member-acl.add-role', ['roles_cap_master'=>$roles_cap_master] );
	}
}
