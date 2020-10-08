<?php
/**
 * Scripts_Loader Class File
 *
 * This file contains Scripts_Loader class. Loads CSS and JS dependencies for the plugin.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/techakilan
 * @since      1.0
 */

namespace Member_ACL_Name_Space\Includes\Admin\Utility\MemberAcl;
use Member_ACL_Name_Space\Includes\Abstracts\MemberAcl\Scripts_Loader_Base;
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Scripts_Loader.
 * Loads scripts and styles for the plugin.
 *
 * @package    Member_ACL_Name_Space
 * @author     Akilan T <techakilan@gmail.com>
 * @link       https://github.com/techakilan
 *
 * @see        wp-admin/includes/plugin.php
 */
//class Scripts_Loader_Base implements Action_Hook_Interface {
class Scripts_Loader extends Scripts_Loader_Base
{

    
    public function load_scripts(){
        
        foreach($this->styles as $key=>$style_src){
            $this->enqueue_styles($key, plugin_dir_url(__FILE__) . '../../../../'.$style_src, array(), $this->plugin_version, 'all');
        }
        foreach($this->scripts as $key=>$script_src){
            $this->enqueue_scripts($key, plugin_dir_url(__FILE__) . '../../../../'.$script_src, array(), $this->plugin_version, true);
        }
        foreach($this->localized_scripts as $key=>$localized_scripts_values){
            wp_localize_script( $localized_scripts_values['script_name'], $localized_scripts_values['object_name'], $localized_scripts_values['object_props'] );
        }


    }
   
}
