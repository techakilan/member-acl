<?php
/**
 * Admin_Menu_Base abstract Class File
 *
 * This class cannot be instantiated. Any Admin Menu class needs to extend
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
 * Class Admin_Menu_Base.
 * Creates Admin Menu item in the Admin Panel.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @link       https://github.com/techakilan
 *
 * @see        wp-admin/includes/plugin.php
 * @see        https://developer.wordpress.org/reference/functions/add_menu_page/
 */
//abstract class Admin_Menu_Base implements Action_Hook_Interface {
abstract class Admin_Menu_Base{
    /**
	 * Define page_title property in Admin_Menu_Base class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $page_title The text to be displayed in the title tags of the page when the menu is selected.
	 * @since      1.0
	 */
	protected $page_title;
	/**
	 * Define menu_title property in Admin_Menu_Base class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $menu_title The text to be used for the menu.
	 * @since      1.0
	 */
	protected $menu_title;
	/**
	 * Define capability property in Admin_Menu_Base class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $capability The capability required for this menu to be displayed to the user.
	 * @since      1.0
	 */
	protected $capability;
	/**
	 * Define menu_slug property in Admin_Menu_Base class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $menu_slug The slug name to refer to this menu by.
	 * @since      1.0
	 */
	protected $menu_slug;
	/**
	 * Define callable_function property in Admin_Menu_Base class.
	 * This property use to define callable function name in add_menu_page.
	 *
	 * @access     protected
	 * @var callable $callable_function The function to be called to output the content for this page.
	 * @since      1.0
	 */
	protected $callable_function;
	/**
	 * Define icon_url property in Admin_Menu_Base class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var string $icon_url The URL to the icon to be used for this menu.
	 * @since      1.0
	 */
	protected $icon_url;
	/**
	 * Define position property in Admin_Menu_Base class.
	 * This property use to pass to add_menu_page as an argument.
	 *
	 * @access     protected
	 * @var int $position The position in the menu order this one should appear
	 * @since      1.0
	 */
	protected $position;
	
	/**
	 * Admin_Menu_Base constructor.
	 * This constructor gets initial values to send to add_menu_page function to
	 * create admin menu.
	 *
	 * @access public
	 *
	 * @param array $initial_value Initial value to pass to add_menu_page function.
	 */
	public function __construct( array $admin_menu_page ) {
		$this->page_title        = $admin_menu_page['page_title'];
		$this->menu_title        = $admin_menu_page['menu_title'];
		$this->capability        = $admin_menu_page['capability'];
		$this->menu_slug         = $admin_menu_page['menu_slug'];
		$this->callable_function = $admin_menu_page['callable_function'];
		$this->icon_url          = $admin_menu_page['icon_url'];
		$this->position          = $admin_menu_page['position'];
	}

	/**
	 * Method add_admin_menu_page in Admin_Menu Class
	 *
	 * Inside this method, we call add_menu_page function to create admin menu
	 * page in WordPress Admin Panel.
	 *
	 * @access  public
	 */
	public function add_admin_menu_page() {
		add_menu_page(
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, 'render_admin_menu_page' ),
			$this->icon_url,
			$this->position
		);
	}

	/**
	 * call 'admin_menu' add_action to create Admin menu page
	 *
	 * @access public
	 */
	public function register_add_action() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu_page' ) );
	}


	/**
	 * Abstract Method render_admin_menu_page in Admin_Menu Class
	 *
	 * For each admin menu page, we must have callable function that render and
	 * handle this menu page. For each menu page, you must implement it.
	 *
	 * @access  public
	 */
	abstract public function render_admin_menu_page();
}