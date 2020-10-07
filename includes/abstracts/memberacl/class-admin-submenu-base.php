<?php
/**
 * Admin_Submenu_Base abstract Class File
 *
 * This class cannot be instantiated. Any Admin Submenu class needs to extend
 * this class and fulfill the contract as required by this class
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/techakilan
 * @since      1.0
 */

namespace Member_ACL_Name_Space\Includes\Abstracts\MemberAcl;

//use Plugin_Name_Name_Space\Includes\Interfaces\Action_Hook_Interface;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Admin_Submenu_Base.
 * Creates Admin Submenu item in the Admin Panel.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @link       https://github.com/techakilan
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
//abstract class Admin_Submenu_Base implements Action_Hook_Interface {
abstract class Admin_Submenu_Base{
    /**
	 * Define parent_slug property in Admin_Submenu_Base class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     protected
	 * @var string $parent_slug The slug name for the parent menu.
	 * @since      1.0.2
	 */
	protected $parent_slug;
	/**
	 * Define page_title property in Admin_Submenu_Base class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     protected
	 * @var string $page_title The text to be displayed in the title tags of the page when the menu is selected.
	 * @since      1.0.2
	 */
	protected $page_title;
	/**
	 * Define menu_title property in Admin_Submenu_Base class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     protected
	 * @var string $menu_title The text to be used for the menu.
	 * @since      1.0.2
	 */
	protected $menu_title;
	/**
	 * Define capability property in Admin_Submenu_Base class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     protected
	 * @var string $capability he capability required for this menu to be displayed to the user.
	 * @since      1.0.2
	 */
	protected $capability;
	/**
	 * Define menu_slug property in Admin_Submenu_Base class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     protected
	 * @var string $menu_slug The slug name to refer to this menu by.
	 * @since      1.0.2
	 */
	protected $menu_slug;
	/**
	 * Define callable_function property in Admin_Submenu_Base class.
	 * This property use to pass to add_submenu_page as an argument.
	 *
	 * @access     protected
	 * @var callable $callable_function The function to be called to output the content for this page.
	 * @since      1.0.2
	 */
	protected $callable_function;

	/**
	 * Admin_Submenu_Base constructor.
	 * This constructor gets initial values to send to add_submenu_page function to
	 * create admin submenu.
	 *
	 * @access public
	 *
	 * @param array $admin_subbmenu_page Initial value to pass to add_submenu_page function.
	 */
	public function __construct( array $admin_subbmenu_page ) {

		$this->parent_slug       = $admin_subbmenu_page['parent-slug'];
		$this->page_title        = $admin_subbmenu_page['page_title'];
		$this->menu_title        = $admin_subbmenu_page['menu_title'];
		$this->capability        = $admin_subbmenu_page['capability'];
		$this->menu_slug         = $admin_subbmenu_page['menu_slug'];
		$this->callable_function = $admin_subbmenu_page['callable_function'];

	}

	/**
	 * Method add_admin_sub_menu_page in Admin_Submenu_Base Class
	 *
	 * Inside this method, we call add_submenu_page function to create admin menu
	 * page in WordPress Admin Panel.
	 *
	 * @access  public
	 */
	public function add_admin_sub_menu_page() {
		add_submenu_page(
			$this->parent_slug,
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, 'render_sub_menu_page' )
		);

	}


	/**
		 * call 'admin_menu' add_action to create Admin submenu page
		 *
		 * @access public
		 */
	public function register_add_action() {
		add_action( 'admin_menu', array( $this, 'add_admin_sub_menu_page' ) );
	}


	/**
	 * Method render_sub_menu_page in Admin_Submenu_Base Class
	 *
	 * For each admin submenu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must implement this method.
	 *
	 * @access  public
	 */
	abstract public function render_sub_menu_page();
}