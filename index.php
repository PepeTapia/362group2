<?php
ini_set('allow_url_fopen',1);

if( !headers_sent() && '' == session_id() ) {
	session_start();
}

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'intro.php';
        break;
	case '/intro.php':
		require 'intro.php';
		break;
	case '/home.php':
		require 'home.php';
		break;
	case '/files.php':
		require 'files.php';
		break;
	case '/trash.php':
		require 'trash.php';
		break;
	case '/logout.php':
		require './login/logout.php';
		break;
	case '/class.php':
		require 'class.php';
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
