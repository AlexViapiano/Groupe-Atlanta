<?php

  $tpl->openform();
  $tpl->required = array(
				  'fromname'		=> TYPE_NAME,
				  'fromemail'		=> TYPE_EMAIL,
				  'sentatonce'		=> TYPE_INT,				  
				  'subject_$lang'	=> TYPE_TITLE,
				  'message_$lang'	=> TYPE_BODY);
				 
  $tpl->openwindow('Apply Filter');  
  $tpl->title('Email by type');  
  $tpl->input(TYPE_STR, 'Send email by first name, last name or email', 'search_field', $_POST['search_field']);    
  $tpl->title('Email by User Group');    
  $tpl->select(TYPE_INT, 'User Group', 'usergroupid', fetch_form('usergroup', 'usergroupid', $_POST['usergroupid'], false, '' , 'All'));
  $tpl->select(TYPE_INT, 'Status', 'sex', fetch_form('sex', 'sex', $_POST['sex'], true, '', 'All'));
  $tpl->select(TYPE_INT, 'Sex', 'status', fetch_form('status', 'status', $_POST['status'], true, '' , 'All'));  
  $tpl->title('Template Settings');      
  $tpl->select(TYPE_INT, 'Use template', 'use_template', form_select('use_template', fetch_YesNo(), false, iif('use_template', 1)));
  $tpl->select(TYPE_INT, 'Use footer', 'use_footer', form_select('use_footer', fetch_YesNo(), false, iif('use_footer', 1)));  
  $tpl->closewindow('Send Email');
  $tpl->BR();
  $tpl->openwindow('Email Message');
  $tpl->title('Email Information');
  $tpl->input(TYPE_STR, 'Emails to send at once', 'sentatonce', iif('sentatonce', 100));
  $tpl->input(TYPE_STR, 'From name', 'fromname', iif('fromname', $Process->options['website_name']));  
  $tpl->input(TYPE_STR, 'From email', 'fromemail', iif('fromemail',$Process->options['website_email'])); 
  $tpl->select(TYPE_INT, 'Language', 'language_selected', form_select('language_selected', $languages, 'title', iif('language_selected', $Process->options['language_selected']), '', 'By User Profile'));
  $tpl->openlang();
  $tpl->input(TYPE_STR, 'Subject', 'subject');   
  $tpl->textarea(TYPE_STR, 'Message', 'message');     
  $tpl->set_translate();
  $tpl->closelang();
  $tpl->setdo('send_email');
  $tpl->closewindow('Send Email');
  $tpl->closeform();  
  
  if ($tpl->submitted())
   {
	  $tpl->process_form(); 
	  if (!$tpl->error_msg)
       {	
		 $users = fetch_users_byfilter('email_filter');
		 mass_email($users); 
		 $tpl->redirect();
	   }  
   }

?>
