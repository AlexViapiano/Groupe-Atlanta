<?php

  $tpl->openform();
  $tpl->required = array(
				  'website_name_$lang'		 	=> TYPE_TITLE,
				  'website_slogan_$lang'		=> TYPE_TITLE,
				  'email_contact'				=> TYPE_EMAIL);
    
  $tpl->openwindow('Main Settings');
  $tpl->openlang($Process->options);
  $tpl->input(TYPE_STR, 'Website name', 'website_name');   
  $tpl->input(TYPE_STR, 'Website slogan', 'website_slogan');    
  $tpl->set_translate();
  $tpl->closelang();  
  $tpl->title('Configuration');
  $tpl->select(TYPE_STR, 'Default language', 'default_language', form_select('default_language', $languages, 'title', iif('default_language', $Process->options['default_language'])));
  $tpl->input(TYPE_STR, 'Email contact', 'email_contact', iif('email_contact', $Process->options['email_contact']));    
  $tpl->closewindow('Save');
  $tpl->closeform();  
  
  if ($tpl->submitted('save'))
  {
	$tpl->serialize = true;
  	$tpl->process_form();

  	if ($tpl->success)
		$tpl->redirect();
  }
  
?>
