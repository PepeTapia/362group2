<?

include "class.php";

$bucketName = isset($_GET['bucket']) ? $_GET['bucket'] : die();


$storage = new googleStorage();
$storage->set_bucket("titanbin-api-". $bucketName);

if (isset($_GET['bucket']) && isset($_GET['filename'])){
    print_r($storage->get_object($_GET['filename'] . ".json"));
} else if (!isset($_GET['filename'])){
    print_r($storage->get_all_objects());
} 



?>

