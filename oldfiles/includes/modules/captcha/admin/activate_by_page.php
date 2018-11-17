<?php

  $captcha = fetch_settings('captcha');
  
  $tpl->openform();
  $tpl->openwindow('Human Verification');				  
  $tpl->title('Active pages');  
  $tpl->select(TYPE_STR, 'Registration page', 'captcha_registration_page', form_select('captcha_registration_page', fetch_YesNo(), false, iif('captcha_registration_page', $captcha['captcha_registration_page'])));
  $tpl->select(TYPE_STR, 'Contact Us page', 'captcha_contact_us_page', form_select('captcha_contact_us_page', fetch_YesNo(), false, iif('captcha_contact_us_page', $captcha['captcha_contact_us_page'])));
  $tpl->select(TYPE_STR, 'Login page', 'captcha_login_page', form_select('captcha_login_page', fetch_YesNo(), false, iif('captcha_login_page', $captcha['captcha_login_page'])));
  $tpl->setdo('save_settings');
  $tpl->closewindow('Save');
  $tpl->closeform();  
  
  if ($tpl->submitted())
  {
	$tpl->serialize = 'captcha';
  	$tpl->process_form();

  	if ($tpl->success)
		$tpl->redirect();
  }

?>
