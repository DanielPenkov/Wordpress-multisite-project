<?php
require_once("../../../wp-load.php");
global $wpdb;
$results = $wpdb->get_results("SELECT blog_id FROM $wpdb->blogs");
$ids = array();
$nurseryIds = array();
$response = '<option value="" disabled selected>Select a nursery</option>';
foreach($results as $result){
	$ids[] = $result->blog_id;
}
unset($ids[0]);
foreach($ids as $id){
	$table_name = 'wp_'.$id.'_options';
	$nurseryIds[] = $wpdb->get_var("SELECT option_value FROM {$table_name} WHERE option_name = 'nurseryId'");
}
$str = file_get_contents('../../../cache/cache.json');
$json = json_decode($str, true);
foreach($json as $json_a){
	if(!in_array($json_a['Id'], $nurseryIds)){
		$response .= '<option value="'.$json_a['Id'].'">'.$json_a['Name'].'</option>';
	}
}
echo $response;
?>