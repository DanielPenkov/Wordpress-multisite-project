<?php

/*
Plugin Name: API cache
*/

define( 'HOURS', 60 * 60 );

function get_api_info( ) {

    global $apiInfo; // Check if it's in the runtime cache (saves database calls)
    if( empty($apiInfo) ) $apiInfo = get_transient('api_info'); // Check database (saves expensive HTTP requests)
    if( !empty($apiInfo) ) return $apiInfo;

    $response = wp_remote_get('http://api.kidslink.dk/api/public/nursery/4?tenantId=1');
    $data = wp_remote_retrieve_body($response);

    if( empty($data) ) return false;

    $apiInfo = json_decode($data); // Load data into runtime cache
    set_transient( 'api_info', $apiInfo, 12 * HOURS ); // Store in database for up to 12 hours

    return $apiInfo;
}