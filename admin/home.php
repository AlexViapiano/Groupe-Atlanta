<?php

define('THIS_SCRIPT', 'maincp');

include('init.php');
include(CWD.'/includes/class/class.admin.php');

confirm_cp_access();

$tpl = new admin_tpl();

$Process->input->clean_array_gpc('g', 
  		array('module' 	=> TYPE_STR,
			  'file'	=> TYPE_STR));

is_allowed($Process->GPC['module'], $Process->GPC['file']);

$module = '/includes/modules/'.$Process->GPC['module'].'/';
$file = CWD.$module.'admin/'.$Process->GPC['file'].'.php';

$languages = fetch_languages();
$extra['languages']	= $languages;

$extra['popup_msg'] = !empty($extra['form_submitted']);
$extra['msg'] = $extra['form_submitted'];

if (file_exists($file) && $Process->GPC['module'])
 { 
	define('MODULE', $Process->GPC['module']);
    if (file_exists(CWD.$module.'functions/functions.php') && $Process->GPC['module'] != 'account')
	    include_once(CWD.$module.'functions/functions.php');
	include($file);
	$tpl->parse();
    $extra['popup_msg'] = !empty($tpl->error_msg);
    $extra['msg'] = $tpl->error_msg;
 }

if (empty($extra['page']))
	{ 
	  include('cms_intro.php');
	  echo include_cms_tutorials();
	}
	
Display('home');

?>