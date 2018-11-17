<?php

  define('MODULE', 'account');
  
  include(ACTIVE_MODULE_PATH.'functions/functions.php');

//  $page->home('account');  

  switch ($Process->GPC['type'])
  {
	 case 'logout':
	    if (!is_logged())
	   		 redirect();
			 
		process_logout();
	 	break;
	
	 case 'lostpassword':
		if (is_logged())
			redirect($Process->path['index']);
			
		if ($_POST['do'] == 'lostpassword')
			process_lostpassword();
			
		$extra['over4'] = 'over_';			
		$page->title('forgotyourpassword');		
		break;

	case 'newpassword_emailed':
		if (is_logged())
			redirect();
	
	 	validate_referer('lostpassword');	
		$page->title('newpassword_emailed');		
		break;
		
	case 'firstlogin':
		if (!is_logged())
	   		 redirect();	
			 
	 	validate_referer('login');
		$page->title('firstlogin');		
	 	break;

	 case 'registered_successfully':
		if (is_logged())
	   		 redirect();
			 
	 	validate_referer('register');
		$page->title('registered_successfully');
	 	break;
		
     case 'login': 
		if (is_logged())
	   		 redirect();
		
		if ($_POST['do'] == 'login')		
		    process_login();
		
		$extra['over5']	= 'over_';
		$page->title('login');
	 	break;
	
	case 'change_password':
		if (!is_logged())
	   		 redirect();	
		
		if ($_POST['do'] == 'change_password')
			process_change_password();
			
		$page->title('edit_profile');			 			
		$page->add('change_password');		
		break;
	
	case 'update_email': 
		if (!is_logged())
	   		 redirect();	
		
		if ($_POST['do'] == 'update_email')
			process_update_email();
			
		$page->title('edit_profile');	
		$page->add('update_email');				 			
		break;
	
	case 'personal':
		if (!is_logged())
	   		 redirect();

		$page->title('edit_profile');	
		$page->add('personal');				 			
	  	$extra['firstname'] = iif('firstname', $Process->userinfo['firstname']);
  		$extra['lastname'] = iif('lastname', $Process->userinfo['lastname']);
  		$extra['status'] = fetch_form('status', 'status', iif('status', $Process->userinfo['status']));
  		$extra['sex'] = fetch_form('sex', 'sex', iif('sex', $Process->userinfo['sex']));
  		$extra['dob'] = date("y-m-d", iif('dob', $Process->userinfo['dob']));
		
		if ($_POST['do'] == 'personal')
			process_personal();
		break;
		
	case 'address':
		if (!is_logged())
	   		 redirect();
			 
		$page->title('edit_profile');		
		$page->add('address');			 				 
  		$extra['address'] = iif('address', $Process->userinfo['address']);
		$extra['city'] = iif('city', $Process->userinfo['city']);
		$extra['state'] = iif('state', $Process->userinfo['state']);
		$extra['zipcode'] = iif('zipcode', $Process->userinfo['zipcode']);
		$extra['phone'] = iif('phone', $Process->userinfo['phone']);
		$extra['fax'] = iif('fax', $Process->userinfo['fax']);
		$extra['country'] = fetch_form('countries', 'country', iif('country', $Process->userinfo['country']));
		
		if ($_POST['do'] == 'address')
			process_address();
		break;
		
	case 'other':
		if (!is_logged())
	   		 redirect();

		$page->title('edit_profile');
		$page->add('other');			 				 
		$extra['timezone'] = fetch_form('timezone', 'timezone', iif('timezone', $Process->userinfo['timezone']));
		$extra['newsletter'] = $Process->userinfo['newsletter'] ? 'checked = "checked"' : '';
			
		if ($_POST['do'] == 'other')
			process_other();			
		break;
		
	case 'register':
	
		if (is_logged())
			redirect();	
			
		$extra['over4'] = 'over_';
		$page->title('register');
		$extra['status'] = fetch_form('status', $_POST['status']);
		$extra['sex'] = fetch_form('sex', $_POST['sex']);
		$extra['country'] = fetch_form('countries', 'country', iif('country', $Process->options['default_country']));
		$extra['ship_country'] = fetch_form('countries', 'ship_country', iif('ship_country', $Process->options['default_country']));
		$extra['timezone'] = fetch_form('timezone', 'timezone', iif('timezone', $Process->options['default_timezone']));
		$extra['register_success'] = isset($_GET['success']);
		
		if ($_POST['do'] == 'addmember')
			process_registration();
			
		_CALLBACK_FUNCTION('fetch_captcha', array('registration'));
		break;
		
	default:
		break;
  }

  $extra['PAGE'] = $Process->GPC['type'];

?>