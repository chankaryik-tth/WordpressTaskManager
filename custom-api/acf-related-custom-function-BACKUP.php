<?php 
define('WP_USE_THEMES', false);
	require('../wp-load.php');

if (isset($_GET['id'])&&isset($_GET['desc'])&&isset($_GET['deadline'])){
	
	$id = $_GET['id'];
	$desc = $_GET['desc'];
	$deadline = $_GET['deadline'];

	update_field('description', $desc, $id);
	update_field('deadline', $deadline, $id );
}

 ?>