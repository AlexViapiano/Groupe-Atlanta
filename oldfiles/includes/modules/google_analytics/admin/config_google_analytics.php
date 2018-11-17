<?php

  $settings = fetch_settings('google_analytics');   

  $tpl->openform();
  $tpl->required = array(
				  'id' 		=> TYPE_NAME);  
  $tpl->openwindow('Google Analytics Settings');
  $tpl->title('Options');
  $tpl->select(TYPE_STR, 'Enable', 'enable', form_select('enable', fetch_YesNo(), false, iif('enable', $settings['enable'])));  
  $tpl->input(TYPE_STR, 'Tracking Id', 'id', iif('id', $settings['id']));  
  $tpl->closewindow('Save');
  $tpl->closeform();  


  if ($tpl->submitted('save'))
  {
	$tpl->serialize = 'google_analytics';
  	$tpl->process_form();

  	if ($tpl->success)
		$tpl->redirect();
  }

?>
