<?php 
define('WP_USE_THEMES', false);
	require('../wp-load.php');

	$request = $_GET['method'];
if($request == "POST"){
	if (isset($_GET['id'])&&isset($_GET['desc'])&&isset($_GET['deadline'])){
	
		$id = $_GET['id'];
		$desc = $_GET['desc'];
		$deadline = $_GET['deadline'];

		update_field('description', $desc, $id);
		update_field('deadline', $deadline, $id );
	}
}elseif ($request == "PUT") {
	if (isset($_GET['id'])&&isset($_GET['key'])&&isset($_GET['value'])){

		$id = $_GET['id'];
		$key = $_GET['key'];
		$value = $_GET['value'];
		
		update_field($key, $value, $id );
	}
}
 ?>