<?php
//url: local.apitestingdy1111.com/deleteTask.php
//ip_url: 192.168.1.176/tm-rest-api/deleteTask.php
	include_once('api.php');
	$api = new Api();	
?>

<?php
	$json = file_get_contents('php://input');

	$obj = json_decode($json, true);
	$id = $obj['id'];
	$forceDelete = $obj['forceDelete'];

	if($forceDelete == 'yes'){
		$forceDelete = true;
	}else{
		$forceDelete = false;
	}

	$api->delete_post($id,$forceDelete);
?>