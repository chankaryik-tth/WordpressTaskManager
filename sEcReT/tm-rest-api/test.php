<!DOCTYPE html>
<html>
	<head>
		<title>testing site for api</title>
	</head>
	<body>
		<h1>GET FUNCTIONS</h1>
		<form action="test-helper.php" method="POST">
			<table>
				<tr><th>test get_post</th></tr>
				<tr><input type="text" name="g_id_1" placeholder="id"></tr>
				<tr><input type="submit" name="get_post"></tr>
			</table>
		</form>
		<p><hr></p>
		<form action="test-helper.php" method="POST">
			<table>
				<tr><th>test get_posts</th></tr>
  				<input type="checkbox" name="g_check_1" value="yes"> get<br>
  				<tr><input type="submit" name="get_posts"></tr>
			</table>
		</form>
		<p><hr></p>
		<form action="test-helper.php" method="POST">
			<table>
				<tr><th>test get_posts_page</th></tr>
				<tr><input type="text" name="g_page_1" placeholder="page"></tr>
				<tr><input type="submit" name="get_posts_page"></tr>
			</table>
		</form>
		<p><hr></p>
		<h1>POST FUNCTION</h1>
		<form action="test-helper.php" method="POST">
			<table>
				<tr><th>test post_new_task</th></tr>
				<tr><input type="text" name="p_deadline_1" placeholder="deadline"></tr>
				<tr><input type="text" name="p_title_1" placeholder="title"></tr>
				<tr><input type="text" name="p_desc_1" placeholder="description"></tr>
				<tr><input type="submit" name="post_new_task"></tr>
			</table>
		</form>
		<p><hr></p>
		<h1>PUT FUNCTIONS</h1>
		<form action="test-helper.php" method="POST">
			<table>
				<tr><th>test put_post</th></tr>
				<tr><input type="text" name="pt_id_1" placeholder="id"></tr>
				<tr><input type="text" name="pt_key_1" placeholder="key"></tr>
				<tr><input type="text" name="pt_value_1" placeholder="value"></tr>
				<tr><input type="submit" name="put_post"></tr>
			</table>
		</form>
		<p><hr></p>
		<h1>DELETE FUNCTIONS</h1>
		<form action="test-helper.php" method="POST">
			<table>
				<tr><th>test delete_post</th></tr>
				<tr><input type="text" name="d_id_1" placeholder="id"></tr>
				<tr><input type="submit" name="delete_post"></tr>
			</table>
		</form>
		<p><hr></p>
		<p style="width: 500px; border: 1px solid #000;"><strong>Results: </strong><?php echo $result; ?></p>
	</body>
</html>