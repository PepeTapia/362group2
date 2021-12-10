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
		$temp = 0;
		foreach ($object_array as $object) {
			$temp = $temp + 1;
			$info = $object->info();

			$this->display_chart_elements($info,$temp);
    	}

	}

	function display_chart_elements($info,$temp){
		echo '<tr>';

		echo '<th style="width:3%" class="custom-checkbox-header">';
		echo '<div class="custom-control custom-checkbox">';
		echo '<input type="checkbox" class="custom-control-input" id="js-select-all-items" onclick="checkbox_toggle()">';
		echo '<label class="custom-control-label" for="js-select-all-items"></label>';
		echo '</div>';
		echo '</th>';
		
		echo '<td>'.$info['name'].'</td>';
		echo '<td>'.$this->formatSize($info['size']).'</td>';
		echo '<td>'.$info['updated'].'</td>';
		echo '<td>'.$info['contentType'].'</td>';
		echo '<td>';
		echo '<div class="kebab" style="cursor: pointer;" onclick="clickEnabler('. $temp.')">';
		echo '<figure></figure>';
    	echo '<figure class="middle'. $temp.' middlestlye"></figure>';
    	echo '<p class="cross'. $temp.' crossstlye">x</p>';
    	echo '<figure></figure>';
    	echo '<ul class="flowdown'. $temp.' flowdownstyle">';
		echo '<li><button name="rnm" class="btn" onclick="myAjax(\''.$info['name'].'\',\'rename\')">Rename</button></li>';
		echo '<li><button name="dld" class="btn" onclick="myAjax(\''.$info['name'].'\',\'download\')">Download</button></li>';
		echo '<li><button name="dlt" class="btn"onclick="myAjax(\''.$info['name'].'\',\'delete\')">Delete</button></li>';
    	echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '</td>';
		echo '</tr>';
	}

	function formatSize($bytes){
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
		$precision = 2;

		$bytes = max($bytes, 0);
		$pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
		$pow = min($pow, count($units) - 1); 

		$bytes /= pow(1024, $pow);

		return round($bytes, $precision) . ' ' . $units[$pow]; 
	}

	function deleteObject($objectName){
			$bucket = $this->storage->bucket($this->bucketName);
			$object = $bucket->object($objectName);
			$object->delete();
			printf('Deleted gs://%s/%s' . PHP_EOL, $bucketName, $objectName);
		}
	
	function rename_move_object($objectName,$newObjectName){
		$bucket = $this->storage->bucket($this->bucketName);
		$object = $bucket->object($objectName);
		$object->copy($this->bucketName, ['name' => $newObjectName]);
		$object->delete();
		printf('Moved gs://%s/%s to gs://%s/%s' . PHP_EOL,
			$bucket_unit,
			$objectName,
			$new_bucket_unit,
			$newObjectName);
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
	$storage->create_bucket("titanbin".$user_id);
} catch (Exception $e){
	echo "";
}

// set bucket based on user 
$storage->set_bucket("titanbin".$user_id);

if($_POST['action_param'] == 'rename') {

	$storage->rename_move_object($_POST['name_param'], $_POST['new_name']);
}
else if($_POST['action_param'] == 'delete') {

	$storage->deleteObject($_POST['name_param']);
}
else if($_POST['action_param'] == 'download') {

    $fp = fopen($path, 'w');
	$storage->download_object($_POST['name_param'],$fp);
	fclose($fp);
}
?>
