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
try {
	if (!isset($_GET['url'])){
		$data = json_decode(file_get_contents("php://input"), true);
	} else{
		// ** URL was not able to work as planned **
		// $curlSession = curl_init();
		// curl_setopt($curlSession, CURLOPT_URL, $_GET['url']);
		// // curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
		// curl_setopt($curlSession,CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
	
		// $data = json_decode(curl_exec($curlSession));
		// // $data = json_decode(file_get_contents($_GET['url']));
		// curl_close($curlSession);
	}
} catch (Exception $e){
	echo json_encode($e);
}
// echo $data;


print_r($storage->post_upload($fileName . ".json", $data));


?>

