<?php

  $tpl->openform();
  $tpl->required = array(
				  'email' 		=> TYPE_EMAIL,
				  'firstname'	=> TYPE_NAME,
				  'lastname'	=> TYPE_NAME);
  $tpl->exceptions = array('already_registered_email' => true);
  $tpl->clean_gpc_exclude = array('emailconfirm');
    
  $tpl->openwindow('Add New User');
  $tpl->title('Login Information');
  $tpl->input(TYPE_STR, 'Email', 'email');
  $tpl->input(TYPE_STR, 'Email confirm', 'emailconfirm');  
  $tpl->title('Personal Information');  
  $tpl->input(TYPE_STR, 'First name', 'firstname');  
  $tpl->input(TYPE_STR, 'Last name', 'lastname');    
  $tpl->select(TYPE_INT, 'Sex', 'sex', fetch_form('sex', $_POST['sex'])); 
  $tpl->select(TYPE_INT, 'Status', 'status', fetch_form('status', $_POST['status'])); 
  $tpl->calendar('dob', 'Date of birth');   
  $tpl->title('Address Information');  
  $tpl->input(TYPE_STR, 'Address', 'address');  
  $tpl->input(TYPE_STR, 'City', 'city');  
  $tpl->input(TYPE_STR, 'State', 'state');    
  $tpl->select(TYPE_INT, 'Country', 'country', fetch_form('countries', 'country', iif('country', $Process->options['default_country'])));  
  $tpl->input(TYPE_STR, 'Postal Code', 'zipcode');   
  $tpl->input(TYPE_STR, 'Phone number', 'phone');   
  $tpl->input(TYPE_STR, 'Fax number', 'fax');     
  $tpl->title('Other Information');   
  $tpl->checkbox(TYPE_INT, 'Newsletter', 'newsletter');
  $tpl->select(TYPE_INT, 'Timezone', 'timezone', fetch_form('timezone', 'timezone', iif('timezone', $Process->options['default_timezone'])));
  $tpl->setdo('add_user');
  $tpl->closewindow('Add user');
  $tpl->closeform();  
  
  if ($tpl->submitted('add_user'))
  {
  	$Process->GPC['newpassword'] = fetch_random_password(8);
  	$Process->GPC['password'] = fetch_new_password($Process->GPC['newpassword'], $salt);

  	$tpl->process_form(array('table' => 'user'),
					 array('password' 		=> $Process->GPC['password'],
							'salt'			=> $salt,
							'dob'			=> strtotime($_POST['dob']),
							'date_join'		=> TIMENOW,
							'lastactivity'	=> -1,
							'usergroupid'	=> 2,
							'ipaddress'		=> $Process->ipaddress,
							'language_id'	=> $Process->userinfo['language_id'],
							'newsletter'	=> $_POST['newsletter'] == 'on'));

  	if ($tpl->success)
     {
  		$tpl->sendmail('new_account_email_password');
		$tpl->redirect();
	 }
  }

?>
