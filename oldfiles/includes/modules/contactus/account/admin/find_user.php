<?php

  $choice =array('First name' => 'firstname',
				 'Last name' => 'lastname',
				 'Email' => 'email',
				 'User Group' => 'usergroupid',
				 'Sex' => 'sex',
				 'Status' => 'status',
				 'Date Joined' => 'date_join',							
			 	 'Date of Birth' => 'dob');
							
  $tpl->openform();
  $tpl->openwindow('Apply Filter');  
  $tpl->title('Search by field');  
  $tpl->input(TYPE_STR, 'Find by First name, Last name or Email', 'search_field', $_POST['search_field']); 
  $tpl->add_custom('', $tpl->button('find', 'Find').' '.$tpl->button('exact_match', 'Exact Match'));
  $tpl->title('Search filters');    
  $tpl->select(TYPE_INT, 'User Group', 'usergroupid', fetch_form('usergroup', 'usergroupid', $_POST['usergroupid'], false, '' , 'All'));
  $tpl->select(TYPE_INT, 'Sex', 'sex', fetch_form('sex', 'sex', $_POST['sex'], true, '', 'All'));
  $tpl->select(TYPE_INT, 'Status', 'status', fetch_form('status', 'status', $_POST['status'], true, '' , 'All'));  
  $tpl->select(TYPE_STR, 'Sort by', 'orderby', form_select('orderby', $choice, false, $_POST['orderby']));   
  $tpl->setdo('find_user');   
  $tpl->closewindow('filter', 'Search');
  $tpl->closeform();  

  if ($tpl->submitted('find_user'))
   {
	  $tpl->process_form(); 
	  foreach ($_POST as $field => $value)
	    if (in_array($field, array('filter', 'find', 'exact_match')))
		    $apply_filter = $field; 
	  $users = fetch_users_byfilter($apply_filter);
	  $tpl->BR();		
	  $tpl->openwindow('Users Found');	 
	  $tpl->query_array($users,
	  	array('firstname'		=> 'First name',
			  'lastname'		=> 'Last name',
			  'email'			=> 'Email',
			  'phone'			=> 'Phone',
			  'name_sex'		=> 'Sex',
			  'name_status'		=> 'Status',
			  'name_usergroup'	=> 'User group',
			  'date_join'		=> 'Date joined',
			  'dob'				=> 'Date of birth'),
		array('edit_user' 		=> 'Edit user: {$firstname} {$lastname}?',
			  'reset_password'	=> 'Are you sure you want to reset the password of {$firstname} {$lastname}?'), 'userid');
	  $tpl->closewindow();
   }
   
  if ($tpl->submitted('edit_user'))
  {
	$tpl->BR();
	$tpl->openform();
    $tpl->required = array(
				  'email' 		=> TYPE_EMAIL,
				  'firstname'	=> TYPE_NAME,
				  'lastname'	=> TYPE_NAME);

	$Process->input->clean_array_gpc('p', array('userid' => TYPE_INT));	  
	
	$user = fetch_userinfo($Process->GPC['userid']);

  	$tpl->openwindow('Edit User');
  	$tpl->title('Login Information');
  	$tpl->input(TYPE_STR, 'Email', 'email', iif('email', $user['email']));
  	$tpl->title('Personal Information');  
  	$tpl->input(TYPE_STR, 'First name', 'firstname', iif('firstname', $user['firstname']));  
  	$tpl->input(TYPE_STR, 'Last name', 'lastname', iif('lastname', $user['lastname']));    
  	$tpl->select(TYPE_INT, 'Sex', 'sex', fetch_form('sex', 'sex', iif('sex', $user['sex']))); 
  	$tpl->select(TYPE_INT, 'Status', 'status', fetch_form('status', 'status', iif('status', $user['status']))); 
  	$tpl->calendar('dob', 'Date of birth', date('Y-m-d', $user['dob']));   
    $tpl->title('Address Information');  
    $tpl->input(TYPE_STR, 'Address', 'address', iif('address', $user['address']));  
    $tpl->input(TYPE_STR, 'City', 'city', iif('city', $user['city']));  
    $tpl->input(TYPE_STR, 'State', 'state', iif('state', $user['state']));    
    $tpl->select(TYPE_INT, 'Country', 'country', fetch_form('countries', 'country', iif('country', $user['country'])));  
    $tpl->input(TYPE_STR, 'Postal Code', 'zipcode', iif('zipcode', $user['zipcode']));   
    $tpl->input(TYPE_STR, 'Phone number', 'phone', iif('phone', $user['phone']));   
    $tpl->input(TYPE_STR, 'Fax number', 'fax', iif('fax', $user['fax']));     
    $tpl->title('Other Information');   
    $tpl->checkbox(TYPE_INT, 'Newsletter', 'newsletter', iif('newsletter', $user['newsletter']));
    $tpl->select(TYPE_INT, 'Timezone', 'timezone', fetch_form('timezone', 'timezone', iif('timezone', $user['timezone'])));
    $tpl->setdo('update_user');
	$tpl->hidden('userid', $Process->GPC['userid']);
	$tpl->hidden('edit_user', 'edit_user');	
    $tpl->closewindow('Update');
    $tpl->closeform();  

    if ($tpl->submitted('update_user'))
	  { 
	  	$tpl->process_form(array('table' 		=> 'user',
								 'action'		=> 'update',
								 'para'			=> 'userid='.$Process->GPC['userid']),
					 	   array('dob'			=> strtotime($_POST['dob']),
								 'newsletter'	=> $_POST['newsletter'] == 'on'));
  
  		if ($tpl->success)
	     {
	  		$tpl->sendmail('account_personal_change');
			$tpl->redirect();
		 }
	  }
  }
  
  if ($tpl->submitted('reset_password'))
  {
    $Process->input->clean_array_gpc('p', array('userid' => TYPE_INT));
	require_once('includes/functions/functions_password.php');
	$user = fetch_userinfo($Process->GPC['userid']);
	$email = $user['email'];
	$Process->GPC['newpassword'] = fetch_random_password(8);
	$password = fetch_new_password($Process->GPC['newpassword'], $salt);
	$tpl->process_form(
			array('table' 		=> 'user', 
				  'action' 		=> 'update',
				  'update'		=> 'userid='.$Process->GPC['userid']),
			array('password'	=> $password,
				  'salt'		=> $salt));
	$tpl->sendmail('reset_password');
	$tpl->redirect();		  
  }

?>
