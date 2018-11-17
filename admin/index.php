<?php

define('THIS_SCRIPT', 'login');

include('init.php');

if (is_logged())
	redirect(_ROOT_URL);

if (isset($_POST['do']) && $_POST['do'] == 'login')
	{
		  global $Process, $home;

  $Process->input->clean_array_gpc('p', 
  	array(
		'login_email'           => TYPE_STR,
		'login_password'        => TYPE_STR,
		'login_md5password'     => TYPE_STR,
		'login_md5password_utf' => TYPE_STR,
		'cookieuser'            => TYPE_BOOL,
		'logintype'             => TYPE_STR));

  $require = array(
		'login_email'			=> TYPE_EMAIL,
		'login_md5password'		=> TYPE_PASSWORD);	
		
  if (defined('admin_module'))	
  	  $require['license'] = TYPE_LICENSE;

  $Process->input->required($require);
		
  $strikes = verify_strike_status($Process->GPC['login_username']);
  $original_userinfo = $Process->userinfo;
  if (!verify_authentication($Process->GPC['login_email'], $Process->GPC['login_password'], $Process->GPC['login_md5password'], $Process->GPC['login_md5password_utf'], $Process->GPC['cookieuser'], true))
	{
		exec_strike_user($Process->userinfo['login_email']);
		$Process->userinfo = $original_userinfo;

		if ($Process->options['usestrikesystem'])
			eval(fetch_error_msg('badlogin_strike'));
		else
			eval(fetch_error_msg('badlogin_failed')); 
		if (empty($Process->input->error_msg))
			$Process->input->error_msg['email'] = fetch_error_msg('login_failed');
	}
  else if ( (!defined('admin_module') || canviewcp($Process->GPC['login_email'])) && empty($Process->input->error_msg))
	{
		exec_unstrike_user($Process->GPC['login_email']);
		process_new_login($Process->GPC['logintype'], $Process->GPC['cookieuser']); 
		if (defined('admin_module'))
			redirect(_ROOT_URL);
		$is_firstlogin = $Process->userinfo['lastactivity'] == -1 && $Process->options['registration_email_password'];
		$is_firstlogin ? redirect('account/firstlogin') : redirect();
	 }
  else if (empty($Process->input->error_msg))
	 $Process->input->error_msg['email'] = fetch_error_msg('cp_denied');
	}
	
Display('login');

?>
