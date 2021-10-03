
<?php

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'intro.php';
        break;
	case '/login':	 
		include 'login.php';
		break;
	case '/signup':
		include 'signup.php';
		break;
	case '/home':
		include 'home.php';
    default:
        http_response_code(404);
        exit('Not Found');
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
