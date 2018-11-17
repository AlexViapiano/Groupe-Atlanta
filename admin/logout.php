<?php

define('THIS_SCRIPT', 'logout');

include('init.php');

if (!is_logged())
	redirect('index');

process_logout();

?>