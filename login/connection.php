<?php
//   CLOUD_SQL_USERNAME: root
//   CLOUD_SQL_PASSWORD: wDAh5OHLtsA98Cve
//   CLOUD_SQL_DATABASE_NAME: login
//   CLOUD_SQL_CONNECTION_NAME: verdant-oven-330403:us-west2:titanbin-sql-server
//   CLOUD_SQL_HOST: 35.236.43.76

// CloudSQL connection
$dbUsername = getenv('CLOUD_SQL_USERNAME');
$dbPassword = getenv('CLOUD_SQL_PASSWORD');
$dbName = getenv('CLOUD_SQL_DATABASE_NAME');
$dbHost = getenv('CLOUD_SQL_HOST');
$socketDir = getenv('CLOUD_SQL_SOCKET_DIR');

$con = mysqli_connect(NULL, $dbUsername, $dbPassword, $dbName, NULL, $socketDir);

if(mysqli_connect_errno())
{
	echo "Failed to connect: ". mysqli_connect_error();
  exit();
}

//SOURCE: http://phpsecurity.org/code/ch08-2
// http://books.gigatux.nl/mirror/php5/067232511X/ch24lev1sec3.html
// session_set_save_handler('_open',
//                          '_close',
//                          '_read',
//                          '_write',
//                          '_destroy',
//                          '_clean');

// function _open()
// {
//     global $_sess_db;

//     $dbUsername = getenv('CLOUD_SQL_USERNAME');
//     $dbPassword = getenv('CLOUD_SQL_PASSWORD');
//     $dbName = getenv('CLOUD_SQL_DATABASE_NAME');
//     $socketDir = getenv('CLOUD_SQL_SOCKET_DIR');
    
//     if ($_sess_db = mysqli_connect(NULL, $dbUsername, $dbPassword, $dbName, NULL, $socketDir))
//     {
//         return mysqli_select_db($_sess_db, 'sessions');
//     }
    
//     return FALSE;
// }

// function _close()
// {
//     global $_sess_db;
    
//     return mysqli_close($_sess_db);
// }

// function _read($id)
// {
//     global $_sess_db;

//     $id = mysqli_real_escape_string($_sess_db, $id);

//     $sql = "SELECT data
//             FROM   sessions
//             WHERE  id = '$id'";

//     if ($result = mysqli_query($_sess_db, $sql))
//     {
//         if (mysqli_num_rows($result))
//         {
//             $record = mysqli_fetch_assoc($result);

//             return $record['data'];
//         }
//     }

//     return '';
// }

// function _write($id, $data)
// {   
//     global $_sess_db;

//     $access = time();

//     $id = mysqli_real_escape_string($_sess_db, $id);
//     $access = mysqli_real_escape_string($_sess_db, $access);
//     $data = mysqli_real_escape_string($_sess_db, $data);

//     $sql = "REPLACE 
//             INTO    sessions
//             VALUES  ('$id', '$access', '$data') ";

//     return mysqli_query($_sess_db, $sql);
// }

// function _destroy($id)
// {
//     global $_sess_db;
    
//     $id = mysqli_real_escape_string($_sess_db, $id);

//     $sql = "DELETE
//             FROM   sessions
//             WHERE  id = '$id'";

//     return mysqli_query($_sess_db, $sql);
// }

// function _clean($max)
// {
//     global $_sess_db;
    
//     $old = time() - $max;
//     $old = mysqli_real_escape_string($_sess_db, $old);

//     $sql = "DELETE
//             FROM   sessions
//             WHERE  access < '$old'";

//     return mysqli_query($_sess_db, $sql);
// }

?>
