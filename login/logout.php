<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

echo "<script> location.href='intro.php'; </script>"; 
exit(); 
#die();