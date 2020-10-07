<?php

namespace Member_Acl_Name_Space\Includes\Abstracts\MemberAcl;

if (!defined('ABSPATH')) {
    exit;
}

abstract class Admin_Ajax_Handler_Base
{
    /**
     * @var string $ajax_url Use to identify admin-ajax.php.
     */
    protected $ajax_url;
    /**
     * @var string Action name for wp_create_nonce.
     */
    protected $ajax_nonce;
    /**
     * @var array action name for ajax call
     */
    protected $actions;

    /**
     * Main constructor.
     * This is constructor of Admin_Ajax_Handler_Base class
     *
     * @access public
     * @since  1.0
     *
     * @param string $action Action name for ajax call
     */

    /**
     * Main constructor.
     * This is constructor of Admin_Ajax_Handler_Base class
     *
     * @access public
     * @since  1.0
     *
     * @param string $action Action name for ajax call
     */
    public function __construct($actions)
    {
        $this->ajax_url = admin_url('admin-ajax.php');
       // $this->ajax_nonce = wp_create_nonce('sample_ajax_nonce');
        $this->actions = $actions;

    }

    /**
     * Method to define add_action for using in theme or plugin
     *
     * @access public
     * @since  1.0
     *
     */
    public function register_add_action()
    {
        //add_action( 'wp_enqueue_scripts', array( $this, 'register_script' ), 10 );
        //hook to add your ajax request
        foreach($this->actions as $action){
            add_action('wp_ajax_' . $action, [$this, 'handle']);
            add_action('wp_ajax_nopriv_' . $action, [$this, 'handle']);
        }
    }
    

    /*
     * Handle method for ajax request in back-end
     * */
    abstract public function handle();

}
