<?php
ini_set('allow_url_fopen',1);

// if( !headers_sent() && '' == session_id() ) {
// 	session_start();
// }

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'intro.php';
        break;
	case '/intro.php':
		if (!isset($_SESSION)){
			session_start();
		}
		require 'intro.php';
		break;
	case '/home.php':
		if (!isset($_SESSION)){
		  session_start();
		}
		require 'home.php';
		break;
	case '/files.php':
		if (!isset($_SESSION)){
			session_start();
		}
		require 'files.php';
		break;
	case '/trash.php':
		if (!isset($_SESSION)){
			session_start();
		}
		require 'trash.php';
		break;
	case '/logout.php':
		if (!isset($_SESSION)){
			session_start();
		}
		if(isset($_SESSION['user_id'])){
			unset($_SESSION['user_id']);
		
		}
		require './login/logout.php';
		break;
	case '/api/get':
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json; charset=utf-8');
		// header('Access-Control-Allow-Methods: GET');
		// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
		include './api/get.php';
		break;
	case '/api/post':
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json; charset=utf-8');
		header('Access-Control-Allow-Methods: POST');
		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
		include './api/post.php';
		break;
    default:
        require 'intro.php';
		break;
}


// switch ($_SERVER['REQUEST_URI']) {
	// case '/':
		// include 'index.php'
		// break;
	// default:
		// http_response_code(404);
		// exit('Not Found');
// }
?>
