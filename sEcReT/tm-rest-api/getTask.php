<?php
//url: local.apitestingdy1111.com/getTask.php
//ip_url: 192.168.1.176/tm-rest-api/getTask.php
	include_once('api.php');
	$api = new Api();	

?>
<?php 
	$json = file_get_contents('php://input');

	$obj = json_decode($json, true);
	$page = $obj['page'];
	$id = $obj['id'];


	if(!check($id)){//if id is empty, the request is not calling for a specific page
		if(!check($page)){//if page is empty, get first page of tasks(10 task per page)
			$page = 1;
		}
		$json = $api->get_posts_page($page);

		$data = json_decode($json, true);

		for($i = 0; $i < sizeof($data); $i++){//filter and get only the important information
			$id = $data[$i]['id'];

			$acfJson = json_decode($api->get_acf_fields($id), true);

			$output[$i]['id'] = $id;
			$output[$i]['title']= $data[$i]['title']['rendered'];
			$output[$i]['description']= $acfJson['acf']['description'];
			$output[$i]['deadline']= $acfJson['acf']['deadline'];
			
		}

		echo json_encode($output);
	}else{

		$json = $api->get_post($id);

		$data = json_decode($json, true);

		$acfJson = json_decode($api->get_acf_fields($id), true);

		$output[0]['id'] = $id;
		$output[0]['title'] = $data['title']['rendered'];
		$output[0]['description']= $acfJson['acf']['description'];
		$output[0]['deadline']= $acfJson['acf']['deadline'];

		echo json_encode($output);//in an array because that is how fx-GET.js recieve and output data (MODIFY if possible)
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