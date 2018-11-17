<?php

include('functions_login.php');
include('functions_register.php');

function process_other()
{
  global $Process;
  $Process->input->clean_array_gpc('p', array(
		'timezone'            	=> TYPE_INT));
  
  save_input(array('table' 		=> 'user', 
			  	   'action' 	=> 'update',
			  	   'para'		=> 'userid='.$Process->userinfo['userid']),
			 array('newsletter'	=> $_POST['newsletter'] == 'on'));
  redirect('account');  
}

function process_address()
{
  global $Process;
  $Process->input->clean_array_gpc('p', array(
		'address'            	=> TYPE_STR,	
		'city'      	     	=> TYPE_STR,			
		'state'		         	=> TYPE_STR,		
		'zipcode'            	=> TYPE_STR,		
		'country'            	=> TYPE_INT,		
		'phone'            		=> TYPE_STR,		
		'fax'            		=> TYPE_STR,
		 ));
  save_input(array('table' 		=> 'user', 
			  	   'action' 	=> 'update',
			  	   'para'		=> 'userid='.$Process->userinfo['userid']));
  eval(fetch_email_msg('account_address_change'));
  sendmail($Process->userinfo['email'], $subject, $message);
  redirect('account');  
}

function process_personal()
{
  global $Process;
  $Process->input->clean_array_gpc('p', array(
		'lastname'            	=> TYPE_STR,		
		'firstname'            	=> TYPE_STR,		
		'sex'					=> TYPE_INT,
		'status'				=> TYPE_INT, 
		 ));
  $Process->input->required(array(
		'firstname'         	=> TYPE_NAME,
		'lastname'	      		=> TYPE_NAME));

  if (!$Process->input->error_msg)
   {
	  save_input(array('table' 		=> 'user', 
			  	   'action' 	=> 'update',
			  	   'para'		=> 'userid='.$Process->userinfo['userid']),
			 array('dob'		=> strtotime($_POST['dob'])));
	  eval(fetch_email_msg('account_personal_change'));
	  sendmail($Process->userinfo['email'], $subject, $message);
	  redirect('account');  
   }
}

function process_change_password()
{
  global $Process;

  $Process->input->clean_array_gpc('p', array(
		'password'             	=> TYPE_STR,
		'passwordconfirm'      	=> TYPE_STR,
		'password_old'      	=> TYPE_STR
	), array('passwordconfirm', 'password_old'));

  $Process->input->required(array(
		'password' 	        	=> TYPE_PASSWORD,
		'password_old'      	=> TYPE_PASSWORD));

  if (!valid_password(md5($Process->GPC['password_old']), $Process->userinfo['userid']) && !$Process->input->error_msg)
     {
		eval(fetch_error_msg('incorrect_password', 'password_old')); 
		$Process->input->error_msg = $error_msg;
	 }  
  if (!count($Process->input->error_msg))
	{
       $Process->GPC['password'] = verify_password($Process->GPC['password'], $salt);
	   save_input(array('table' 		=> 'user', 
				  	    'action' 		=> 'update',
				  		'para'			=> 'userid='.$Process->userinfo['userid']),
				  array('salt'			=> $salt));
	   
	   eval(fetch_email_msg('account_password_change'));
	   sendmail($Process->userinfo['email'], $subject, $message);
	   redirect('account');   		
	}
}

function process_update_email()
{
  global $Process;

  $Process->input->clean_array_gpc('p', array(
		'email'               	=> TYPE_STR,
		'emailconfirm'        	=> TYPE_STR
	), array('emailconfirm'));

  $Process->input->required(array(
		'email'					=> TYPE_EMAIL),
		array(), array('already_registered_email' => true));

  if (!count($Process->input->error_msg))
	{
	   save_input(array('table' 		=> 'user', 
				  	    'action' 		=> 'update',
				  		'para'			=> 'userid='.$Process->userinfo['userid']));
	   eval(fetch_email_msg('account_email_update'));
	   sendmail($Process->GPC['email'], $subject, $message);
	   redirect('account');  
	}
}


?>