<?php

define('THIS_SCRIPT', 'lostpassword');

include('init.php');

if ($Process->userinfo['userid'] > 0)
	redirect(_ROOT_URL);

if (isset($_GET['reset_key']) && isset($_GET['user']))
  {
	$Process->input->clean_array_gpc('g', array(
								'reset_key' => TYPE_STR,
								'user'		=> TYPE_INT));
    $reset_password = query_first("select * from change_password where password_reset_key = '".$Process->GPC['reset_key']."' and userid = ".$Process->GPC['user']." and ".TIMENOW." < password_reset_key_date");
	if (!empty($reset_password))
	   {
	      $extra['reset_user'] = fetch_userinfo($reset_password['userid']);
		  $extra['change_password'] = true;
		  if ($_POST['do'] == 'change_password')
			  process_change_password($reset_password['userid']);		  
	   }
	 else
	   $extra['reset_password_error'] = true;
  }
else if (isset($_POST['do']) && $_POST['do'] == 'lostpassword')
	process_lostpassword();
else if (isset($_GET['password_change']))
	$extra['password_change'] = true;
	
$extra['action'] = isset($_GET['success']);
$extra['pagetitle'] = 'Lost Your Password?';

Display('lostpassword');

?>