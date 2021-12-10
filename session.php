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

?>