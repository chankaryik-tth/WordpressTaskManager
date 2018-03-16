<?php
//url: local.apitestingdy1111.com/createTask.php
//ip_url: 192.168.1.176/tm-rest-api/createTask.php
	include_once('api.php');
	$api = new Api();	

?>
<?php
	$json = file_get_contents('php://input');

	//decode json and store in var
	$obj = json_decode($json, true);

	$title = $obj['taskTitle'];
	$desc = $obj['taskDesc'];
	$deadline = $obj['taskDeadline']; 

	if(check($title)&&check($desc)&&check($deadline)){
		$api->post_new_task($title, $desc, $deadline);

		return "Success!!";
	}else{
		return "Failed";
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