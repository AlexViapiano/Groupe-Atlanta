<?php

error_reporting(0);
chdir('../');

define('admin_module', true);
define('CSRF_PROTECTION', true);
$languageid = 'en';
require_once('includes/init.php');

define('_BASE_URL', _ROOT_URL.'/admin/');
$extra['_BASE_URL'] = _BASE_URL;

?>