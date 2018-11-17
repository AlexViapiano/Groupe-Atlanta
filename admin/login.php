<?php

define('THIS_SCRIPT', 'login');

include('init.php');

if (is_logged())
	redirect();

if ($_POST['do'] == 'login')
	process_login();
	
Display('login');

?>