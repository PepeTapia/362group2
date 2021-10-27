<?php

require './vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$link = "";
$link_status ="display: none;";
$foobar = array();

class googleStorage{
	private $projectId;
	private $storage;
	private $serviceAccPath;
	public function __construct(){
		$this->projectId = 'titanbin';
	#	$this->projectId = 'nifty-pursuit-326703';
		$this->serviceAccPath = 'keyfile.json';
	#	$this->serviceAccPath = 'keyfile.json';
		$this->storage = new StorageClient([
			'keyFilePath' => $this->serviceAccPath,
			'projectId' => $this->projectId
		]);
		$this->storage->registerStreamWrapper();
	}
	function upload_object($bucketName, $objectName, $source){
		$file = fopen($source, 'r');
		$bucket = $this->storage->bucket($bucketName);
		$object = $bucket->upload($file, [
			'name' => $objectName
		]);
		$msg = 'Uploaded ' . $objectName;
		echo '<div class="msg">' . $msg . '</div>';
	}
	function download_object($bucketName, $objectName, $destination){
		$bucket = $this->storage->bucket($bucketName);
		$object = $bucket->object($objectName);
		$object->downloadToFile($destination);
		$msg = sprintf('Downloaded gs://%s/%s to %s' . PHP_EOL, $bucketName, $objectName, basename($destination));
		echo '<div class="msg">' . $msg . '</div>';
	}

	// }
	function getUrl($bucketName, $objectName){
		return 'https://storage.cloud.google.com/'. $bucketName . '/' . $objectName;
	}

	function list_objects_with_prefix($bucketName, $directoryPrefix){
    	$bucketName = 'cloud-site-325604.appspot.com';
    	$directoryPrefix = 'myDirectory/';

		//$files = array();

    	$storage = new StorageClient();
    	$bucket = $storage->bucket($bucketName);
    	$options = ['prefix' => $directoryPrefix];
		
		$foobar = $bucket->objects($options);

		foreach ($foobar as $object) {
			$info = $object->info();
			echo '<tr>';

			echo '<th style="width:3%" class="custom-checkbox-header">';
			echo '<div class="custom-control custom-checkbox">';
			echo '<input type="checkbox" class="custom-control-input" id="js-select-all-items" onclick="checkbox_toggle()">';
			echo '<label class="custom-control-label" for="js-select-all-items"></label>';
			echo '</div>';
			echo '</th>';
			
			echo '<td>'.$object->name().'</td>';
			echo '<td>'.$info['size'].'</td>';
			echo '<td>'.$info['updated'].'</td>';
			echo '<td>'.$info['contentType'].'</td>';
			echo '<td>'."Temp for Actions".'</td>';
			echo '</tr>';
    	}

	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="./resources/stylesheets/style-home.css"></link>
	</head>
</html>