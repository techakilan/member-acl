<?php
/**
 * Constant Class File
 * Constant class defines all constants used by the plugin
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/techakilan
 * @since      1.0
 */

namespace Member_ACL_Name_Space\Includes\Init\MemberAcl;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Constant
 * This class defines all constants used by the plugin.
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 */
class Constant
{

    /**
     * Define define_constant method in Constant class
     *
     * It defines all of constants that you need
     *
     * @access  public
     * @static
     */
    public static function define_constant()
    {
        /**
         * Member_ACL_TEXTDOMAIN constant
         *
         * It defines text domain name for plugin
         */
        if (!defined('Member_ACL_TEXTDOMAIN')) {
            define('Member_ACL_TEXTDOMAIN', 'member-acl-textdomain');
        }
        /**
		 * Member_ACL_PATH constant.
		 * It is used to specify plugin path
		 */
		if ( ! defined( 'Member_ACL_PATH' ) ) {
			define( 'Member_ACL_PATH', trailingslashit( plugin_dir_path( dirname( dirname( dirname( __FILE__ )  ) ) ) ) );
			
		}

		/**
		 * Member_ACL_URL constant.
		 * It is used to specify plugin urls
		 */
		if ( ! defined( 'Member_ACL_URL' ) ) {
			define( 'Member_ACL_URL', trailingslashit( plugin_dir_url( dirname( dirname( __FILE__ ) ) ) ) );
		}

		/**
		 * Member_ACL_CSS constant.
		 * It is used to specify css urls inside assets directory. It's used in front end and
		 * using to  load related CSS files for front end user.
		 */
		if ( ! defined( 'Member_ACL_CSS' ) ) {
			define( 'Member_ACL_CSS', trailingslashit( Member_ACL_URL ) . 'assets/css/' );
		}

		/**
		 * Member_ACL_JS constant.
		 * It is used to specify JavaScript urls inside assets directory. It's used in front end and
		 * using to load related JS files for front end user.
		 */
		if ( ! defined( 'Member_ACL_JS' ) ) {
			define( 'Member_ACL_JS', trailingslashit( Member_ACL_URL ) . 'assets/js/' );
		}

		/**
		 * Member_ACL_IMG constant.
		 * It is used to specify image urls inside assets directory. It's used in front end and
		 * using to load related image files for front end user.
		 */
		if ( ! defined( 'Member_ACL_IMG' ) ) {
			define( 'Member_ACL_IMG', trailingslashit( Member_ACL_URL ) . 'assets/images/' );
		}

		/**
		 * Member_ACL_ADMIN_CSS constant.
		 * It is used to specify css urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related CSS files for admin user.
		 */
		if ( ! defined( 'Member_ACL_ADMIN_CSS' ) ) {
			define( 'Member_ACL_ADMIN_CSS', trailingslashit( Member_ACL_URL ) . 'assets/admin/css/' );
		}

		/**
		 * Member_ACL_ADMIN_JS constant.
		 * It is used to specify JS urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'Member_ACL_ADMIN_JS' ) ) {
			define( 'Member_ACL_ADMIN_JS', trailingslashit( Member_ACL_URL ) . 'assets/admin/js/' );
		}

		/**
		 * Member_ACL_ADMIN_IMG constant.
		 * It is used to specify image urls inside assets/admin directory. It's used in WordPress
		 *  admin panel and using to  load related JS files for admin user.
		 */
		if ( ! defined( 'Member_ACL_ADMIN_IMG' ) ) {
			define( 'Member_ACL_ADMIN_IMG', trailingslashit( Member_ACL_URL ) . 'assets/admin/images/' );
		}

		/**
		 * Member_ACL_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'Member_ACL_TPL' ) ) {
			define( 'Member_ACL_TPL', trailingslashit( Member_ACL_PATH . 'templates' ) );
		}

		/**
		 * Member_ACL_INC constant.
		 * It is used to specify include path inside includes directory.
		 */
		if ( ! defined( 'Member_ACL_INC' ) ) {
			define( 'Member_ACL_INC', trailingslashit( Member_ACL_PATH . 'includes' ) );
		}

		/**
		 * Member_ACL_LANG constant.
		 * It is used to specify language path inside languages directory.
		 */
		if ( ! defined( 'Member_ACL_LANG' ) ) {
			define( 'Member_ACL_LANG', trailingslashit( Member_ACL_PATH . 'languages' ) );
		}

		/**
		 * Member_ACL_TPL_ADMIN constant.
		 * It is used to specify template urls inside templates/admin directory. If you want to
		 * create a template for admin panel or administration purpose, you will use from it.
		 */
		if ( ! defined( 'Member_ACL_TPL_ADMIN' ) ) {
			define( 'Member_ACL_TPL_ADMIN', trailingslashit( Member_ACL_TPL . 'admin' ) );
		}

		/**
		 * Member_ACL_TPL_FRONT constant.
		 * It is used to specify template urls inside templates/front directory. If you want to
		 * create a template for front end or end user purposes, you will use from it.
		 */
		if ( ! defined( 'Member_ACL_TPL_FRONT' ) ) {
			define( 'Member_ACL_TPL_FRONT', trailingslashit( Member_ACL_TPL . 'front' ) );
		}

		/**
		 * Member_ACL_TPL constant.
		 * It is used to specify template urls inside templates directory.
		 */
		if ( ! defined( 'Member_ACL_LOGS' ) ) {
			define( 'Member_ACL_LOGS', trailingslashit( Member_ACL_PATH . 'logs' ) );
		}

		/**
		 * Member_ACL_CSS_VERSION constant.
		 * You can use from this constant to apply on main CSS file when you have changed it.
		 */
		if ( ! defined( 'Member_ACL_CSS_VERSION' ) ) {
			define( 'Member_ACL_CSS_VERSION', 1 );
		}
		/**
		 * Member_ACL_JS_VERSION constant.
		 * You can use from this constant to apply on main JS file when you have changed it.
		 */
		if ( ! defined( 'Member_ACL_JS_VERSION' ) ) {
			define( 'Member_ACL_JS_VERSION', 1 );
		}

		/**
		 * Member_ACL_CSS_VERSION constant.
		 * You can use from this constant to apply on main CSS file when you have changed it.
		 */
		if ( ! defined( 'Member_ACL_ADMIN_CSS_VERSION' ) ) {
			define( 'Member_ACL_ADMIN_CSS_VERSION', 1 );
		}
		/**
		 * Member_ACL_JS_VERSION constant.
		 * You can use from this constant to apply on main JS file when you have changed it.
		 */
		if ( ! defined( 'Member_ACL_ADMIN_JS_VERSION' ) ) {
			define( 'Member_ACL_ADMIN_JS_VERSION', 1 );
		}

		/**
		 * Member_ACL_VERSION constant.
		 * It defines version of plugin for management tasks in your plugin
		 */
		if ( ! defined( 'Member_ACL_VERSION') ) {
			define( 'Member_ACL_VERSION', '1.0.2' );
		}

		/**
		 * Member_ACL_MAIN_NAME constant.
		 * It defines name of plugin for management tasks in your plugin
		 */
		if ( ! defined( 'Member_ACL_MAIN_NAME') ) {
			define( 'Member_ACL_MAIN_NAME', 'plugin-name' );
		}

		/**
		 * Member_ACL_DB_VERSION constant
		 *
		 * It defines database version
		 * You can use from this constant to apply your changes in updates or
		 * activate plugin again
		 */
		if ( ! defined( 'Member_ACL_DB_VERSION') ) {
			define( 'Member_ACL_DB_VERSION', 1 );
		}

		/**
		 * Member_ACL_TEXTDOMAIN constant
		 *
		 * It defines text domain name for plugin
		 */
		if ( ! defined( 'Member_ACL_TEXTDOMAIN') ) {
			define( 'Member_ACL_TEXTDOMAIN', 'plugin-name-textdomain' );
		}

    }
}
