<?php

  $modules = fetch_modules();

  $tpl->openform();
  $tpl->openwindow('Add Page');
  $tpl->select(TYPE_STR, 'Select parent page', 'parent_id', fetch_select('page_links', 0, $_POST['parent_id'], 'this.form.submit();'));    
  $tpl->select(TYPE_STR, 'Select module', 'selected_module', form_select('selected_module', $modules, false, $_POST['selected_module'], false, false, 'this.form.submit();'));  
  $tpl->closewindow('Select');  	
  $tpl->closeform();  
  
  if ($tpl->submitted('select') || isset($_POST['selected_module']) || isset($_POST['add_page']))
    { 
	  $Process->input->clean_array_gpc('p', array('selected_module'  => TYPE_STR));
	  $tpl->BR();
	  $info = $_POST;
	  $info['id'] = $_POST['parent_id'];
	  $button = 'Add Page';
	  include(MODULE_PATH.$Process->GPC['selected_module'].'/add_page.php');
	}

  if ($tpl->submitted('add_page'))
	  { 
	    $Process->input->clean_array_gpc('p', array('selected_module' => TYPE_STR,
													'parent_id'		  => TYPE_INT,
													'home'			  => TYPE_INT));
	    
		$sort = query_first("select * from page_links where active_header = 1 order by sort desc");
		if ($Process->GPC['home'])
			query("update page_links set home = 0 where home = 1");
		$insert_query = array('parent_id'		=> $Process->GPC['parent_id'],
				  			  'seo_url'			=> 'link', 
				  			  'module'			=> $Process->GPC['selected_module']);
		if ($_POST['active_header'])
			$insert_query['sort'] = intval($sort['sort']+1);		
			
  	    $tpl->process_form(
			array('table' => 'page_links'), $insert_query);
				  
  	    if ($tpl->success)
		    $tpl->redirect();
	  }  

?>
