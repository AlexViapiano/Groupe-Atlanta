<?php

function process_logout()
{
	global $Process, $languageid;
	$prefix_length = strlen(COOKIE_PREFIX);
	$old_session = $Process->session->vars['dbsessionhash'];	
	foreach ($_COOKIE AS $key => $val)
	{
		$index = strpos($key, COOKIE_PREFIX);
		if ($index == 0 AND $index !== false)
		{
			$key = substr($key, $prefix_length);
			if (trim($key) == '')
				continue;
			set_cookie($key, '', 1);
		}
	}
	if ($Process->userinfo['userid'] AND $Process->userinfo['userid'] != -1)
	{
		unset($Process->current_vars);
		save_input(
			array('table' 			=> 'user', 
				  'action' 			=> 'update',
				  'para'			=> 'userid='.$Process->userinfo['userid']),
			array('lastactivity' 	=> TIMENOW - $Process->options['cookietimeout'],
				  'lastvisit'		=> TIMENOW));
		$Process->db->query_write("DELETE FROM " . TABLE_PREFIX . "session WHERE userid = " . $Process->userinfo['userid']);
	}

	$Process->db->query_write("DELETE FROM " . TABLE_PREFIX . "session WHERE sessionhash = '" . $Process->db->escape_string($Process->session->vars['dbsessionhash']) . "'");

	if ($Process->session->created == true)
		$newsession =& $Process->session;
	else
		$newsession =& new Session($Process, '', 0, '', $Process->session->vars['styleid']);
	$newsession->set('userid', 0);
	$newsession->set('loggedin', 0);
	$newsession->set_session_visibility(($Process->superglobal_size['_COOKIE'] > 0));
	$Process->session =& $newsession;
    redirect(_ROOT_URL);
}

function process_login()
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

function verify_authentication($email, $password, $md5password, $md5password_utf, $cookieuser, $send_cookies)
{
	global $Process;

	$email = strip_blank_ascii($email, ' ');
	if ($Process->userinfo = $Process->db->query_first("SELECT userid, email, password, salt FROM " . TABLE_PREFIX . "user WHERE email = '" . $Process->db->escape_string(htmlspecialchars_uni($email)) . "'"))
	{
		if (
			$Process->userinfo['password'] != iif($password AND !$md5password, md5(md5($password) . $Process->userinfo['salt']), '') AND
			$Process->userinfo['password'] != iif($md5password, md5($md5password . $Process->userinfo['salt']), '') AND
			$Process->userinfo['password'] != iif($md5password_utf, md5($md5password_utf . $Process->userinfo['salt']), ''))
		{
			$return_value = false;
			if (isset($return_value))
				return $return_value;
		}
		else if ($Process->userinfo['password'] == '')
		{
			$return_value = false;
			if (isset($return_value))
				return $return_value;
		}
		if ($send_cookies)
		{
			if ($cookieuser)
			{
				set_cookie('userid', $Process->userinfo['userid'], true, true, true);
				set_cookie('password', md5($Process->userinfo['password'] . COOKIE_SALT), true, true, true);
			}
			else if ($Process->GPC[COOKIE_PREFIX . 'userid'] AND $Process->GPC[COOKIE_PREFIX . 'userid'] != $Process->userinfo['userid'])
			{
				// we have a cookie from a user and we're logging in as
				// a different user and we're not going to store a new cookie,
				// so let's unset the old one
				set_cookie('userid', '', true, true, true);
				set_cookie('password', '', true, true, true);
			}
		}
		$return_value = true;
		return $return_value;
	}

	$return_value = false;
	return $return_value;
}

// ###################### Start process new login #######################
// creates new session once $Process->userinfo has been set to the newly logged in user
// processes logins into CP
function process_new_login($logintype, $cookieuser)
{
	global $Process, $cart;
	
	$old_session = $Process->session->vars['dbsessionhash'];
	$Process->db->query_write("DELETE FROM " . TABLE_PREFIX . "session WHERE sessionhash = '" . $Process->db->escape_string($Process->session->vars['dbsessionhash']) . "' or (userid = ".$Process->userinfo['userid']." and userid != 0)");
	if ($Process->session->created == true AND $Process->session->vars['userid'] == 0)
		$newsession =& $Process->session;
	else
		$newsession =& new Session($Process, '', $Process->userinfo['userid'], '', $Process->session->vars['styleid'], $Process->session->vars['languageid']);
	$newsession->set('userid', $Process->userinfo['userid']);
	$newsession->set('loggedin', 1);
	if ($logintype == 'cplogin')
		$newsession->set('bypass', 1);
	else
		$newsession->set('bypass', 0);
	$newsession->set_session_visibility(($Process->superglobal_size['_COOKIE'] > 0));
	$newsession->fetch_userinfo();
	$Process->session =& $newsession; 
	$Process->userinfo = $newsession->userinfo;
	if (is_object($cart))
		$cart->update_session($old_session);
}

// ###################### Start verify_strike_status #######################
function verify_strike_status($username = '', $supress_error = false)
{
	global $Process; 

	$Process->db->query_write("DELETE FROM " . TABLE_PREFIX . "strikes WHERE striketime < " . (TIMENOW - 3600));
	if (!$Process->options['usestrikesystem'])
		return 0;
	$strikes = $Process->db->query_first("SELECT COUNT(*) AS strikes, MAX(striketime) AS lasttime FROM " . TABLE_PREFIX . "strikes	WHERE strikeip = '" . $Process->db->escape_string(IPADDRESS) . "'");
	if ($strikes['strikes'] >= 5 AND $strikes['lasttime'] > TIMENOW - 900)
	{ 
		exec_strike_user($username);
		if (!$supress_error)
			echo 'bad login strike '.$strikes['strikes'];
		else
			return false;
	}
	else if ($strikes['strikes'] > 5)
		$strikes['strikes'] = 5;
	return $strikes['strikes'];
}

// ###################### Start exec_strike_user #######################
function exec_strike_user($username = '')
{
	global $Process, $strikes;
	if (!$Process->options['usestrikesystem'])
		return 0;
	if (!empty($username))
	{
		$strikes_user = $Process->db->query_first("SELECT COUNT(*) AS strikes FROM " . TABLE_PREFIX . "strikes WHERE strikeip = '" . $Process->db->escape_string(IPADDRESS) . "'
				AND username = '" . $Process->db->escape_string(htmlspecialchars_uni($username)) . "'");
		if ($strikes_user['strikes'] == 4)		// We're about to add the 5th Strike for a user
		{
			if ($user = $Process->db->query_first("SELECT userid, username, email, language_id FROM " . TABLE_PREFIX . "user WHERE username = '" . $Process->db->escape_string($username) . "'"))
			{
				$ip = IPADDRESS;
				echo('your account is locked');
/*				eval(fetch_email_phrases('accountlocked', $user['languageid']));
				vbmail($user['email'], $subject, $message, true);*/
			}
		}
	}
	$Process->db->query_write("INSERT INTO strikes (striketime, strikeip, username) VALUES (".TIMENOW.", '".$Process->db->escape_string(IPADDRESS)."', '".$Process->db->escape_string(htmlspecialchars_uni($username))."')");
	$strikes++;
}

// ###################### Start exec_unstrike_user #######################
function exec_unstrike_user($username)
{
	global $Process;

	$Process->db->query_write("DELETE FROM " . TABLE_PREFIX . "strikes WHERE strikeip = '" . $Process->db->escape_string(IPADDRESS) . "' AND username='" . $Process->db->escape_string(htmlspecialchars_uni($username)) . "'");
}
?>