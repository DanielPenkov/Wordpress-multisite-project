<?php
/*
Plugin Name: Options page
Plugin URI:
Description: Create custom options page
Version: 1
Author: Calin Ursu
Author URI: -
License: GPL2
*/


   //add_menu_page('My Plugin', 'My Plugin', 'manage_options', __FILE__, 'clivern_render_plugin_page', plugins_url('/img/icon.png',__DIR__));
 

/**
* Step 1: Create link to the menu page.
*/

function create_menu() {
  //create new top-level menu
  add_menu_page(__( 'Theme Options' ), __( 'Theme Options' ), 'administrator', 'theme-options', 'settings_page', 'dashicons-megaphone'); 
}
add_action('admin_menu', 'create_menu');


/**
* Step 2: Create settings fields.
*/

function register_settings() {
  register_setting( 'settings-general', 'analytics_code' );
}
add_action( 'admin_init', 'register_settings' );


/** 
* Step 3: Create the markup for the options page
*/
function settings_page() {

?>

<div class="wrap">
<h2><?php _e('Theme Options', 'nursery'); ?></h2>

<form method="post" action="options.php">
  
  <?php if(isset( $_GET['settings-updated'])) { ?>
  <div class="updated">
        <p><?php _e('Settings updated successfully', $textdomain); ?></p>
    </div>
  <?php } ?>

    <table class="form-table">
    <tr><td colspan="2"><h3><?php _e('Google Analytics Code', 'nursery'); ?></h3></td></tr>
    
    <tr valign="top">
      <th scope="row"><?php _e('Google Analytics Code', 'nursery'); ?></th>
      <td>
        <textarea name="analytics_code"><?php echo get_option('analytics_code'); ?></textarea>
        <p class="description"><?php _e('Your google analytics tracking code.', 'nursery'); ?></p>
      </td>
    </tr>
    
    <?php settings_fields( 'settings-general' ); ?>
    <?php do_settings_sections( 'settings-general' ); ?>
    </table>
    
    <?php submit_button(); ?>
</form>
</div>
<?php }

