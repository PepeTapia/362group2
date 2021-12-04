<?php

include "class.php";


$bucketName = isset($_GET['bucket']) ? $_GET['bucket'] : die();
$fileName = isset($_GET['filename']) ? $_GET['filename'] : die();

$storage = new googleStorage();

try {
	$storage->create_bucket("titanbin-api-". $bucketName);
} catch (Exception $e){
	echo "";
}

$storage->set_bucket("titanbin-api-". $bucketName);

$data = json_decode(file_get_contents("php://input"), true);
// echo $data;

print_r($storage->post_upload($fileName . ".json", $data));

?>