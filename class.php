<?php

require './vendor/autoload.php';

use \Google\Cloud\Storage\StorageClient;
// use \Google\Cloud\Firestore\FirestoreClient;

// class googleFirestore{
	// private $projectId;
	// private $serviceAccPath;
	// private $db;
	// public function __construct(){
		// $this->projectId = 'verdant-oven-330403';
		// $this->serviceAccPath = 'keyfile.json';
		// $this->db = new FirestoreClient([
			// 'keyFilePath' => $this->serviceAccPath,
			// 'projectId' => $this->projectId
		// ]);
	// }
	// function add(){
		// $docRef = $this->db->collection('sample/php/users')->document(1);
		// $docRef->set([
			// 'username' => 'test123',
			// 'password' => '123'
		// ]);
	// }
// }

class googleStorage{
	private $projectId;
	private $storage;
	private $serviceAccPath;
	public $object_name;
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

	function list_objects($bucketName){
 #    	$bucketname = "titanbin.appspot.com";
 		#$bucketName = 'cloud-site-325604.appspot.com';
#    	$directoryPrefix = 'myDirectory/';


    	$bucket = $this->storage->bucket($bucketName);
    	#$options = ['prefix' => $directoryPrefix];
		
		$object_array = $bucket->objects();

		foreach ($object_array as $object) {
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
			echo '<td>'.'<button name="dl" class="btn">Download</button>'.'</td>';
			echo '</tr>';

			// if(isset($_POST['dl'])){
			// 	$bucket = $this->storage->bucket($bucketName);
			// 	$object = $bucket->object($object->name());

			// 	// $uri = "https://storage.cloud.google.com/". $bucketName . '/' . $object->name();
			// 	// echo file_get_contents($uri);

			// 	// $object->downloadToFile($object->name());

			// 	$msg = "Downloaded!";
			// 	// $msg = sprintf('Downloaded gs://%s/%s to %s' . PHP_EOL, $bucketName, $object->name(), basename("__DIR__". $object->name()));
			// 	echo '<div class="msg">' . $msg . '</div>';
			// }
			
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