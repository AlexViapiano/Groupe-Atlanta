<?php

  $tpl->openform();
  $tpl->openwindow('Edit Page Content');
  $tpl->select(TYPE_STR, 'Select page', 'parent_id', fetch_select('page_links', 0, $_POST['parent_id'], 'this.form.submit();', false));    
  $tpl->closewindow('Select');  	
  $tpl->closeform();  
  
  if ($tpl->submitted('select') || isset($_POST['save']))
    { 
	  $Process->input->clean_array_gpc('p', array('parent_id'  => TYPE_INT));
	  $info = fetch_byid('page_links', $Process->GPC['parent_id']);
	  for ($i=0; $i<count($languages); $i++)
		  $info['body_'.$languages[$i]['id']] = str_replace('includes/', '../includes/', $info['body_'.$languages[$i]['id']]);
	  $button = 'Save';
	  $tpl->BR();
	  include(MODULE_PATH.$info['module'].'/add_page.php');
	}

  if ($tpl->submitted('save'))
	  { 
	    $Process->input->clean_array_gpc('p', array('home' => TYPE_INT));
	    
		if ($Process->GPC['home'])
			query("update page_links set home = 0 where home = 1");	  
  	    $tpl->process_form(
			array('table'		=> 'page_links',
				  'action'		=> 'update',
				  'para'		=> 'id='.$info['id']),
			array('seo_url'		=> 'link'));
				  
  	    if ($tpl->success)
		    $tpl->redirect();
	  }  

?>
