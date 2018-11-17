<?php

define('THIS_SCRIPT', 'processcp');

include('init.php');

$Process->input->clean_array_gpc('g', 
  		array('module' 	=> TYPE_STR,
			  'file'	=> TYPE_STR,
			  'session'	=> TYPE_STR,
			  'id'		=> TYPE_INT));

$user = query_first("select * from session where sessionhash = '".$Process->GPC['session']."'");
if (!canviewcp($user['userid']))
	die;
	
$module = '/includes/modules/'.$Process->GPC['module'].'/';
$file = CWD.$module.$Process->GPC['file'].'.php';

if (file_exists($file) && $Process->GPC['module'])
	include($file);

exec_shut_down();

?>