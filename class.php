<?php
if (!isset($_SESSION))
  {
    session_start();
  }
?>

<?php
require './vendor/autoload.php';
include "./login/connection.php";

use \Google\Cloud\Storage\StorageClient;

class googleStorage{
	private $projectId;
	private $storage;
	private $serviceAccPath;
	private $bucketName;
	public $object_name;
	public function __construct(){
		// $this->bucketName = "empty";
		$this->projectId = 'verdant-oven-330403';
	#	$this->projectId = 'nifty-pursuit-326703';
		$this->serviceAccPath = 'keyfile.json';
	#	$this->serviceAccPath = 'keyfile.json';
		$this->storage = new StorageClient([
			'keyFilePath' => $this->serviceAccPath,
			'projectId' => $this->projectId
		]);
		$this->storage->registerStreamWrapper();
	}
	function create_bucket($bucketName){
		$storageClass = 'STANDARD';
		$location = 'US';
		$bucket = $this->storage->createBucket($bucketName, [
			'storageClass' => $storageClass, 
			'location' => $location
		]);
		// $objects = $bucket->objects([
		// 	'encryption' => [
		// 		'defaultKmsKeyName' => null,
		// 	]
		// ]);	
	}
	function get_bucket(){
		return $this->bucketName;
	}
	function set_bucket($bucketName){
		$this->bucketName = $bucketName;
	}
	function upload_object($objectName, $source){
		$file = fopen($source, 'r');
		$bucket = $this->storage->bucket($this->bucketName);
		$bucket->upload($file, [
			'name' => $objectName
		]);
		$msg = 'Uploaded ' . $objectName;
		echo '<div class="msg">' . $msg . '</div>';
	}
	function download_object($objectName, $destination){
		$bucket = $this->storage->bucket($this->bucketName);
		$object = $bucket->object($objectName);
		$object->downloadToFile($destination);
		$msg = sprintf('Downloaded gs://%s/%s to %s' . PHP_EOL, $this->bucketName, $objectName, basename($destination));
		echo '<div class="msg">' . $msg . '</div>';
	}

	// }
	function getUrl($objectName){
		return 'https://storage.cloud.google.com/'. $this->bucketName . '/' . $objectName;
	}

	function list_objects(){
 #    	$bucketname = "titanbin.appspot.com";
 		#$bucketName = 'cloud-site-325604.appspot.com';
#    	$directoryPrefix = 'myDirectory/';


    	$bucket = $this->storage->bucket($this->bucketName);
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

$user_id = $_SESSION['user_id'];

// find username of user session
$query = $con->prepare("select user_name from users where user_id = ? limit 1");
$query->bind_param('s', $user_id);
$query->execute();
$result = $query->get_result();

$user = mysqli_fetch_assoc($result);
$username = $user['user_name'];

$storage = new googleStorage();

// create bucket if user is new
try {
	$storage->create_bucket($user_id);
} catch (Exception $e){
	echo "";
}

// set bucket based on user 
$storage->set_bucket($user_id);

?>

<!-- <!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="./resources/stylesheets/style-home.css"></link>
	</head>
</html> -->