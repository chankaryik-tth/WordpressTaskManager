<?php
	include_once('api.php');
	$api = new Api();	

?>
<?php 

$json = $api->get_posts();

	$data = json_decode($json, true);
	for($i = 0; $i < sizeof($data); $i++){

		$id = $data[$i]['id'];

		$acfJson = json_decode($api->get_acf_fields($id), true);

		$output[$i]['id']= $id;
		$output[$i]['title']= $data[$i]['title']['rendered'];
		$output[$i]['description']= $acfJson['acf']['description'];
		$output[$i]['deadline']= $acfJson['acf']['deadline'];
		
	}

	echo json_encode($output);
?>