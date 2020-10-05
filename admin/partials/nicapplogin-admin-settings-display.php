<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    Nicapplogin
 * @subpackage Nicapplogin/admin/partials
 */

$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'initial';

?>
<div class="wrap">
	<div id="icon-themes" class="icon32"></div>
	<h2><?php esc_html_e( get_admin_page_title() .' '.$this->version); ?></h2>
	<h2><?php _e( 'Nic-app Login Settings', $this->plugin_name ); ?></h2>  
	<h2 class="nav-tab-wrapper">
		<a href="?page=<?php esc_html_e( $this->plugin_name ); ?>-settings&tab=initial" class="nav-tab <?php echo $active_tab == 'initial' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Initial', $this->plugin_name ); ?></a>
		<a href="?page=<?php esc_html_e( $this->plugin_name ); ?>-settings&tab=cronofy" class="nav-tab <?php echo $active_tab == 'cronofy' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Cronofy', $this->plugin_name ); ?></a>
		<a href="?page=<?php esc_html_e( $this->plugin_name ); ?>-settings&tab=other" class="nav-tab <?php echo $active_tab == 'other' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Other', $this->plugin_name ); ?></a>
	</h2>
	<?php settings_errors(); ?>
	<form method="post" action="" id="">
		<?php
	        if ($active_tab == 'initial') {
	            $this->displayPluginAdminSettingsInitial();
	        } elseif ($active_tab == 'cronofy') {
	            
	        } else {
	            $this->displayPluginAdminSettingsOther();
	        }
	     ?>
	</form>  
</div>