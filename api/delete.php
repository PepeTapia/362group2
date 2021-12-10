<?php

include "class.php";


$bucketName = isset($_GET['bucket']) ? $_GET['bucket'] : die();
$fileName = isset($_GET['filename']) ? $_GET['filename'] : die();

$storage = new googleStorage();

$storage->set_bucket("titanbin-api-". $bucketName);

// echo $data;
$err = "Error";
if (isset($_GET['bucket']) && isset($_GET['filename'])){
    print_r($storage->deleteObject($_GET['filename'] . ".json"));
} else {
	print_r(json_encode(array('message' => $err)));
}

?>