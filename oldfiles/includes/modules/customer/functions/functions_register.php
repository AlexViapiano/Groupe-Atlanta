<?php


function update_shipping_address()
{
	global $Process;
	$Process->input->clean_array_gpc('p', array(
		'company_name'        	=> TYPE_STR,
		'address'            	=> TYPE_STR,	
		'city'      	     	=> TYPE_STR,			
		'state'		         	=> TYPE_STR,		
		'zipcode'            	=> TYPE_STR,		
		'country'            	=> TYPE_INT,		
		'phone'            		=> TYPE_STR,		
		'fax'            		=> TYPE_STR,
		'ship_address'          => TYPE_STR,	
		'ship_city'      	    => TYPE_STR,			
		'ship_state'		    => TYPE_STR,		
		'ship_zipcode'          => TYPE_STR,		
		'ship_country'          => TYPE_INT));
	
	$require = array(
		'address'            	=> TYPE_TITLE,	
		'city'      	     	=> TYPE_TITLE,			
		'zipcode'            	=> TYPE_TITLE,		
		'phone'            		=> TYPE_TITLE);
    
	$require_add = array(
		'ship_address'         	=> TYPE_TITLE,	
		'ship_city'      	   	=> TYPE_TITLE,			
		'ship_zipcode'         	=> TYPE_TITLE);

    $required = $_POST['shipping_as_billing'] != 'on' ? array_merge($require, $require_add) : $require;
	
	$Process->input->required($required);
	if (!count($Process->input->error_msg))
	{
		save_input(
			array('table' 				=> 'user', 
				  'action' 				=> 'update',
				  'para'				=> 'userid='.$Process->userinfo['userid']),
			array( 'shipping_as_billing'	=> isset($_POST['shipping_as_billing'])));
		redirect('store/checkout/shipping');
	}
}

function process_quick_registration()
{
  global $Process;
  
  $Process->input->clean_array_gpc('p', array(
		'lastname'            	=> TYPE_STR,		
		'firstname'            	=> TYPE_STR,		
		'email'               	=> TYPE_STR,
		'emailconfirm'        	=> TYPE_STR,
	), array('emailconfirm'));
	
	$Process->input->required(array(
		'firstname'				=> TYPE_NAME,
		'lastname'				=> TYPE_NAME,
		'email'					=> TYPE_EMAIL),
	array(), array('already_registered_email' => true));

	if (!count($Process->input->error_msg))
	{
		require_once('includes/functions/functions_password.php');

		$newpassword = fetch_random_password(8);
		$Process->GPC['password'] = fetch_new_password($newpassword, $salt);
		save_input(
			array('table' 		=> 'user', 
				  'action' 		=> 'insert'),
			array('salt' 		=> $salt,
				  'date_join' 	=> TIMENOW,
				  'password'	=> $Process->GPC['password'],
				  'usergroupid'	=> 2,
				  'ipaddress'	=> $Process->ipaddress,
				  'language_id'	=> $Process->userinfo['language_id'],
				  'lastactivity'=> -1));
		eval(fetch_email_msg('new_account_email_password'));		
		sendmail($Process->GPC['email'], $subject, $message);
		$Process->userinfo = $Process->db->query_first("SELECT userid, email, password, salt FROM " . TABLE_PREFIX . "user WHERE email = '" . $Process->db->escape_string(htmlspecialchars_uni($Process->GPC['email'])) . "'");
		process_new_login(false, $Process->GPC['cookieuser']);
		redirect('store/checkout/account');
	}
}

function process_registration()
{
  global $Process;
  define('CAPTCHA_PAGE', 'registration');		
  
  $Process->input->clean_array_gpc('p', array(
		'lastname'            	=> TYPE_STR,		
		'firstname'            	=> TYPE_STR,		
		'email'               	=> TYPE_STR,
		'emailconfirm'        	=> TYPE_STR,
		'address'            	=> TYPE_STR,	
		'city'      	     	=> TYPE_STR,			
		'state'		         	=> TYPE_STR,		
		'zipcode'            	=> TYPE_STR,		
		'country'            	=> TYPE_INT,		
		'phone'            		=> TYPE_STR,		
		'fax'            		=> TYPE_STR,
		'ship_contact'          => TYPE_STR,	
		'ship_address'          => TYPE_STR,	
		'ship_city'      	    => TYPE_STR,			
		'ship_state'		    => TYPE_STR,		
		'ship_zipcode'          => TYPE_STR,		
		'ship_country'          => TYPE_INT,		
		'ship_phone'            => TYPE_STR,		
		'ship_fax'            	=> TYPE_STR,	
		'sex'					=> TYPE_INT,
		'status'				=> TYPE_INT,
		'timezone'				=> TYPE_INT
	), array('emailconfirm'));
	
	$Process->input->required(array(
		'firstname'				=> TYPE_NAME,
		'lastname'				=> TYPE_NAME,
		'email'					=> TYPE_EMAIL,
		'captcha'				=> TYPE_CAPTCHA),
	array(), array('already_registered_email' => true));

	if (!count($Process->input->error_msg))
	{
		require_once('includes/functions/functions_password.php');

		$newpassword = fetch_random_password(8);
		$Process->GPC['password'] = fetch_new_password($newpassword, $salt);
		save_input(
			array('table' 		=> 'user', 
				  'action' 		=> 'insert'),
			array('salt' 		=> $salt,
				  'dob'			=> strtotime($_POST['dob']),
				  'date_join' 	=> TIMENOW,
				  'password'	=> $Process->GPC['password'],
				  'usergroupid'	=> 2,
				  'ipaddress'	=> $Process->ipaddress,
				  'language_id'	=> $Process->userinfo['language_id'],
				  'newsletter'	=> $_POST['newsletter'] == 'on',
				  'lastactivity'=> -1));
		$Process->GPC['newpassword'] = $newpassword;
		if ($Process->options['registration_no_validation'])
			eval(fetch_email_msg('new_account'));
		else
			eval(fetch_email_msg('new_account_email_password'));		
		sendmail($Process->GPC['email'], $subject, $message);
		redirect('registered_successfully');
	}
}


?>