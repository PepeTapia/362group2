
<?php

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
	case '/echo.php':
		include './resources/test/echo.php';
		break;
    case '/':
        require 'intro.php';
        break;
	case '/intro.php':
		include 'intro.php';
		break;
	case '/login.php':	 
		include 'login.php';
		break;
	case '/signup.php':
		include 'signup.php';
		break;
	case '/home.php':
		include 'home.php';
    default:
        http_response_code(404);
		
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
