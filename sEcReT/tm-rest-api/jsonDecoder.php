<?php
$json = '{"id":88,"date":"2018-03-15T06:09:56","date_gmt":"2018-03-15T06:09:56","guid":{"rendered":"http:\/\/local.taskmanager.com\/tasks\/asd-3\/","raw":"http:\/\/local.taskmanager.com\/tasks\/asd-3\/"},"modified":"2018-03-15T06:09:56","modified_gmt":"2018-03-15T06:09:56","password":"","slug":"asd-3","status":"publish","type":"tasks","link":"http:\/\/local.taskmanager.com\/tasks\/asd-3\/","title":{"raw":"asd","rendered":"asd"},"template":"","meta":[],"acf":{"description":null,"deadline":null},"_links":{"self":[{"href":"http:\/\/local.taskmanager.com\/wp-json\/wp\/v2\/post-tasks\/88"}],"collection":[{"href":"http:\/\/local.taskmanager.com\/wp-json\/wp\/v2\/post-tasks"}],"about":[{"href":"http:\/\/local.taskmanager.com\/wp-json\/wp\/v2\/types\/tasks"}],"wp:attachment":[{"href":"http:\/\/local.taskmanager.com\/wp-json\/wp\/v2\/media?parent=88"}],"curies":[{"name":"wp","href":"https:\/\/api.w.org\/{rel}","templated":true}]}}';

/*$data = json_decode($json, true);
$data['deadline'] = 'new';
$result = json_encode($data);
$data = json_decode($result);

echo $data->{'id'};
echo $data->{'deadline'};
echo $data->{'title'};
echo $data->{'description'};*/

$data = json_decode($json, true);
$json = array( 
	'id' => $data['id'],
	'title' => $data['title']['raw'],
	'description' => 'test',
	'deadline' => '12/3/2018'
);

$data = json_encode($json);



/*$result = json_decode($response,true);
				//just get important data to output
				$response = array('id' => $result['id'])*/
?>
