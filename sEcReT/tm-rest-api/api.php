<?php 
//url: local.apitestingdy1111.com/api.php
//ip_url: 192.168.1.176/tm-rest-api/api.php
class Api{
	
	function __construct(){
		define("ADMIN_USER", "http://local.taskmanager.com/wp-json");	
		define("ADMIN_PW", "http://local.taskmanager.com/wp-json");	
		//for acf must use /acf/v3/post-tasks
	}

	//OTHER FUNCTIONS
	private function clean_text($text){
		$text = str_replace('+', '%2B', $text);
		$text = str_replace("'", '%27', $text);
		$text = str_replace('!', '%21', $text);
		$text = str_replace(' ', '+', $text);
		return $text;
	}

	private function num_only($input){
	 	//convert to string for match
		$input = (string)$input;
		//remove spaces in case
		$input = str_replace(' ', '', $input);

		if (preg_match('/^[0-9]+$/', $input)) {
			return true;
		} else {
			return false;
		}
	}

	//GET FUNCTIONS
	//single post
	function get_post($id){
		if($this->num_only($id)){
			$id = $this->clean_text($id);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://local.taskmanager.com/wp-json/wp/v2/post-tasks/".$id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
			    "Cache-Control: no-cache",
			    "Content-Type: application/json",
			    "Postman-Token: 8da68287-76ee-4e71-922a-fdabf0ebae1c"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				/*//get necessary data only
				$data = json_decode($response, true);
				
				$json = array( 
					'id' => $data['id'],
					'title' => $data['title']['rendered'],
					'description' => 'have not add method to recieve description',
					'deadline' => 'have not add method to recieve deadline'
				);

				$result = json_encode($json);
			  	return $result;*/
			  	return $response;
			}
		}else{
			echo "ERROR: ID IS NOT A NUMBER";
		}
	}

	//multiple(10) post
	function get_posts(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://local.taskmanager.com/wp-json/wp/v2/post-tasks",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
		    "Cache-Control: no-cache",
		    "Content-Type: application/json",
		    "Postman-Token: 8f83bfdd-2656-45c9-8fa4-84ea6cb54f79"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}

	//page number
	function get_posts_page($page){
		if($this->num_only($page)){
			$page = $this->clean_text($page);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://local.taskmanager.com/wp-json/wp/v2/post-tasks?page=".$page,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
			    "Cache-Control: no-cache",
			    "Content-Type: application/json",
			    "Postman-Token: e0f0261c-6a49-4136-8efe-11c4b0c2f692"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return $response;
			}
		}else{
			echo "ERROR: PAGE IS NOT A NUMBER";
		}
	}

	//POST FUNCTIONS
	//create post
	function post_new_task($title, $desc, $deadline){
		//date format: d/m/Y g:i a
		//clean the text
		$title = $this->clean_text($title);
		$desc = $this->clean_text($desc);
		$deadline = $this->clean_text($deadline);

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://local.taskmanager.com/wp-json/wp/v2/post-tasks?title=".$title."&status=publish",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
		    "Cache-Control: no-cache",
		    "Postman-Token: 97c11a72-cf18-4189-8ab6-7217e4eae644"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			//get id of new post
			$result = json_decode($response);
			$id = $result->{'id'};
			//update acf fields
			$acf_result = $this->post_acf_fields($id, $desc, $deadline);

			if($acf_result){
				return $response;
			}else{
				echo "ERROR: UNABLE TO UPDATE ACF FIELDS <br>ADDITIONAL ERRORS: ".$acf_result;
			}
		}
	}

	//used to fill in acf field when a post is created
	private function post_acf_fields($id, $desc, $deadline){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://local.taskmanager.com/wp-content/acf-related-custom-function.php?method=POST&id=".$id."&desc=".$desc."&deadline=".$deadline,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "PUT",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
		    "Cache-Control: no-cache",
		    "Content-Type: application/json",
		    "Postman-Token: 6b25ec17-47bc-4425-8070-f9df1aecce4f"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		}else{
			return true;
		}
	}

	function get_acf_fields($id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://local.taskmanager.com/wp-json/acf/v3/post-tasks/".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "Cache-Control: no-cache",
		    "Content-Type: application/json",
		    "Postman-Token: e422945b-314e-46c0-8250-4ab28be591c7"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}	

	private function put_acf_field($id, $key, $value){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://local.taskmanager.com/wp-content/acf-related-custom-function.php?method=PUT&id=".$id."&key=".$key."&value=".$value,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "PUT",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
		    "Cache-Control: no-cache",
		    "Content-Type: application/json",
		    "Postman-Token: 6b25ec17-47bc-4425-8070-f9df1aecce4f"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		}else{
			echo $response;
		}
	}

	//PUT FUNCTIONS
	function put_post($id, $key, $value){
		if($this->num_only($id)){
			if($key == 'title'){
				$id = $this->clean_text($id);
				$key = $this->clean_text($key);
				$value = $this->clean_text($value);
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://local.taskmanager.com/wp-json/wp/v2/post-tasks/".$id."?".$key."=".$value,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "PUT",
				  CURLOPT_HTTPHEADER => array(
				    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
				    "Cache-Control: no-cache",
				    "Postman-Token: af7e7274-1af2-4bd7-b167-a2846dbef9d0"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  return $response;
				}
			}elseif ($key == 'description' || $key == 'deadline') {
				return $this->put_acf_field($id, $key, $value);
			}else{
				echo "ERROR: This key".$key." is undefined";
			}
		}else{
			echo "ERROR: ID IS NOT A NUMBER";
		}
	}

	//DELETE FUNCTION
	function delete_post($id,$forceDelete){
		if($this->num_only($id)){
			$delete = '';
			$id = $this->clean_text($id);

			if($forceDelete){//permanatly delete
				$delete = '?force=true'	;
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://local.taskmanager.com/wp-json/wp/v2/post-tasks/".$id.$delete,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "DELETE",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbC50YXNrbWFuYWdlci5jb20iLCJpYXQiOjE1MjEwMTI0NTEsIm5iZiI6MTUyMTAxMjQ1MSwiZXhwIjoxNTIxNjE3MjUxLCJkYXRhIjp7InVzZXIiOnsiaWQiOiIxIn19fQ.izt0t4-lt21uFqfmcX1DQsvnZUS4OaF9qr-6kqTfDO0",
			    "Cache-Control: no-cache",
			    "Postman-Token: abdcb8c1-ee5f-4bc2-9b73-f916c52d77ac"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  return $response;
			}
		}else{
			echo "ERROR: ID IS NOT A NUMBER";
		}
	}


}

?>