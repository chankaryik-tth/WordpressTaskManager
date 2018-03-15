<?php
	include_once('api.php');
	$api = new Api();	

?>
<?php 
		$result = "No submit button clicked or fields are empty";
		if(check($_POST['g_id_1'])){
			?>
				<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $api->get_post($_POST['g_id_1']); ?></p>
			<?php
			$result = "Success!!";
		}

		if(check($_POST['g_check_1'])){
			?>
				<!--<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $api->get_posts(); ?></p>-->
			<?php
			//$result = "Success!!";
			$result = $api->get_posts();
		}
	
		if(check($_POST['g_page_1'])){
			?>
				<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $api->get_posts_page($_POST['g_page_1']); ?></p>
			<?php
			$result = "Success!!";

		}	

		if(check($_POST['p_desc_1'])&&check($_POST['p_title_1'])&&check($_POST['p_deadline_1'])){
			?>
				<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $api->post_new_task($_POST['p_title_1'], $_POST['p_desc_1'], $_POST['p_deadline_1']); ?></p>
			<?php
			$result = "Success!!";
		}

		if(check($_POST['pt_id_1'])&&check($_POST['pt_key_1'])&&check($_POST['pt_value_1'])){
			?>
				<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $api->put_post($_POST['pt_id_1'], $_POST['pt_key_1'], $_POST['pt_value_1']); ?></p>
			<?php
			$result = "Success!!";
		}

		if(check($_POST['d_id_1'])){
			?>
				<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $api->delete_post($_POST['d_id_1']); ?></p>
			<?php
			$result = "Success!!";
		}

	function check($arg){
		if($arg != "" && $arg != null){
			return true;
		}else{
			return false;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p style="width: 100%; border: 1px solid #000;"><strong>Results: </strong><?php echo $result; ?></p>
	<a href="test.php">Go Back>></a>

</body>
</html>