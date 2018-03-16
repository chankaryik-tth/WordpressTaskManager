<?php
//url: local.apitestingdy1111.com/putTask.php
//ip_url: 192.168.1.176/tm-rest-api/putTask.php
	include_once('api.php');
	$api = new Api();	

?>

<?php
	$json = file_get_contents('php://input');

	$obj = json_decode($json, true);
	$id = $obj['id'];
	$title = $obj['title'];
	$desc = $obj['description'];
	$deadline = $obj['deadline'];

	if(check($title)){
	 	$api->put_post($id, 'title', $title);
	}

	if(check($desc)){
		$api->put_post($id, 'description', $desc);
	}

	if(check($deadline)){
		$api->put_post($id, 'deadline', $deadline);
	}

?>
<?php 
	function check($arg){
		if($arg != "" && $arg != null){
			return true;
		}else{
			return false;
		}
	}
?>
