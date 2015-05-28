<?php
/*
Plugin Name: Add new field on site creation panel
Plugin URI:
Description: Create custom field
Version: 1
Author: Calin Ursu
Author URI: -
License: GPL2
*/

function add_new_blog_field($blog_id, $user_id, $domain, $path, $site_id, $meta) {

    // Make sure the user can perform this action and the request came from the correct page.

    switch_to_blog($blog_id);

    // Use a default value here if the field was not submitted.
    $new_field_value = 'default';

    if ( !empty($_POST['blog']['created_nursery_Name']) )
        $new_field_value = $_POST['blog']['created_nursery_Name'];

    // save option into the database
    update_option( 'nurseryId', $new_field_value);
    global $wpdb;
    $wpdb->insert( 'nurseryId', array('nurseryId' => $new_field_value), array('%d', '%s') );

    restore_current_blog();
}

add_action( 'wpmu_new_blog', 'add_new_blog_field' );

function my_admin_scripts() {
    wp_register_script('input-script', plugins_url('input.js', __FILE__));
    wp_enqueue_script('input-script');
}

add_action( "admin_print_scripts-site-new.php", 'my_admin_scripts' );

?>