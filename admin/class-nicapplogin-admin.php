<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Nicapplogin
 * @subpackage Nicapplogin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nicapplogin
 * @subpackage Nicapplogin/admin
 * @author     Efraim Bayarri <efraim@efraim.cat>
 */
class Nicapplogin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action('admin_menu', array(
		    $this,
		    'addPluginAdminMenu'
		), 9);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nicapplogin-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nicapplogin-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Admin menu.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param
	 *            void
	 *
	 */
	public function addPluginAdminMenu() {
	    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	    add_menu_page('Nic-app Login', 'Nic-app Login', 'administrator', $this->plugin_name, array(
	        $this,
	        'displayPluginAdminDashboard'
	    ), plugin_dir_url(dirname(__FILE__)) . 'admin/img/nic-app-logo.png', 26);
	    add_submenu_page($this->plugin_name, __('Nic-app Login Settings', $this->plugin_name), __('Settings', $this->plugin_name), 'administrator', $this->plugin_name . '-settings', array(
	        $this,
	        'displayPluginAdminSettings'
	    ));
	}
	
	/**
	 * Admin Dashboard.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param
	 *            void
	 *
	 */
	public function displayPluginAdminDashboard() {
	    if (isset($_GET['error_message'])) {
	        add_action('admin_notices', array(
	            $this,
	            'pluginNameSettingsMessages'
	        ));
	        do_action('admin_notices', sanitize_text_field($_GET['error_message']));
	    }
	    require_once 'partials/' . $this->plugin_name . '-admin-display.php';
	}
	
	/**
	 * Display Admin settings.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param
	 *            void
	 *
	 */
	public function displayPluginAdminSettings() {
	    if (isset($_GET['error_message'])) {
	        add_action('admin_notices', array(
	            $this,
	            'pluginNameSettingsMessages'
	        ));
	        do_action('admin_notices', sanitize_text_field($_GET['error_message']));
	    }
	    require_once 'partials/' . $this->plugin_name . '-admin-settings-display.php';
	}
	
	/**
	 * Admin Dashboard initial.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param
	 *            void
	 *
	 */
	public function displayPluginAdminSettingsInitial() {
	    if (isset($_GET['error_message'])) {
	        add_action('admin_notices', array(
	            $this,
	            'pluginNameSettingsMessages'
	        ));
	        do_action('admin_notices', sanitize_text_field($_GET['error_message']));
	    }
	    esc_html_e( "Options", $this->plugin_name );
	}
	
	/**
	 * Admin Dashboard initial.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param
	 *            void
	 *
	 */
	public function displayPluginAdminSettingsOther() {
	    if (isset($_GET['error_message'])) {
	        add_action('admin_notices', array(
	            $this,
	            'pluginNameSettingsMessages'
	        ));
	        do_action('admin_notices', sanitize_text_field($_GET['error_message']));
	    }
	    esc_html_e( "Other", $this->plugin_name );
	}
	
	/**
	 * Display Admin settings error messages.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param
	 *            $error_message
	 *
	 */
	public function pluginNameSettingsMessages($error_message) {
	    switch ($error_message) {
	        case '1':
	            $message = __('There was an error adding this setting. Please try again.  If this persists, shoot us an email.', $this->plugin_name);
	            $err_code = esc_attr('nicappcrono_setting');
	            $setting_field = 'nicappcrono_setting';
	            break;
	    }
	    $type = 'error';
	    add_settings_error($setting_field, $err_code, $message, $type);
	}
	
}
