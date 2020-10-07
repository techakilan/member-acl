<?php
/**
 * Scripts_Loader_Base abstract Class File
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

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Scripts_Loader_Base.
 * Loads scripts and styles for the plugin.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @link       https://github.com/techakilan
 *
 * @see        wp-admin/includes/plugin.php
 */
//abstract class Scripts_Loader_Base implements Action_Hook_Interface {
abstract class Scripts_Loader_Base
{

    public $plugin_version;

    public $styles;

    public $scripts;

    public function __construct($required_scripts, $plugin_version){
        $this->styles = $required_scripts['styles'];
        $this->scripts = $required_scripts['scripts'];
        $this->plugin_version = $plugin_version;
    }

    /**
	 * Method enqueue_styles in Scripts_Loader_Base Class
	 *
	 * Inside this method, we call wp_enqueue_style to load CSS files required by the plugin
	 *
	 * @access  public
	 */
    public function enqueue_styles($unique_handle, $style_src, $dependencies, $version, $media)
    {

        
        wp_enqueue_style($unique_handle, $style_src, $dependencies, $version, $media);
        

    }

    /**
	 * Method enqueue_scripts in Scripts_Loader_Base Class
	 *
	 * Inside this method, we call wp_enqueue_script to load JS files required by the plugin
	 *
	 * @access  public
	 */
    public function enqueue_scripts($unique_handle, $script_src, $dependencies, $version, $media)
    {
       
        wp_enqueue_script($unique_handle, $script_src, $dependencies, $version, $media);
        //wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/akils-plugin-admin.js', array('jquery'), $this->version, false);

    }
    public function register(){
        add_action('admin_enqueue_scripts',array($this,'load_scripts'));
    }
    abstract function load_scripts();
}
