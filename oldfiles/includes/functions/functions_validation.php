<?php

function is_logged()
{
  global $Process;
  return $Process->userinfo['userid'] > 0;
}

function validate_referer($referer, $return='')
{ 
   $source = pathinfo($_SERVER['HTTP_REFERER']);
   $return = empty($return) ? 'index' : $return;
   if ($source['filename'] != $referer)
		redirect($return);
   return true;
}

function valName($name)  
{      
	$name = trim($name); 
	$len = strlen($name);
	return preg_match("#^[-A-Za-z' ]*$#", $name) && $len > 1;            
}

function is_valid_email($email)
{
	// checks for a valid email format
	$len = strlen($email);
	return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s\'"<>@,;]+\.+[a-z]{2,6}))$#si', $email) && !empty($len);
}

function already_registered($username, $id=false)
{
	global $Process;

    $id = !$id ? '' : ' and userid != '.$id;
	$user = $Process->db->query_first_slave("SELECT username FROM " . TABLE_PREFIX . "user WHERE username = '$username' ".$id);
	return !$user ? false : true;
}

function already_registered_email($email)
{
	global $Process;

	$user = $Process->db->query_first_slave("SELECT email FROM " . TABLE_PREFIX . "user WHERE email = '$email' ");
	return !$user ? false : true;
}

?>