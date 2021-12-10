<?
if (!isset($_SESSION)){
	session_start();
}

include "./login/connection.php";
include "class.php";


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