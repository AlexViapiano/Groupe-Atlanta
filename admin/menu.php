<?php

define('THIS_SCRIPT', 'menucp');

include('init.php');

$extra['menu'] = fetch_menu();

Display('menu');

?>