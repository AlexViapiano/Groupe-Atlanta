<?php

  $tpl->openform();
  $tpl->openwindow('Edit Page');
  $tpl->select(TYPE_STR, 'Select page', 'parent_id', fetch_select('page_links', 0, $_POST['parent_id'], 'this.form.submit();'));    
  $tpl->closewindow('Select');  	
  $tpl->closeform();  
  
  if ($tpl->submitted('select') || isset($_POST['save']))
    { 
	  $Process->input->clean_array_gpc('p', array('parent_id'  => TYPE_INT));
	  $info = query_array("select * from page_links where parent_id = ".$Process->GPC['parent_id']." order by sort");
	  $tpl->BR();
	  $tpl->openform();
	  $tpl->openwindow('Order Page Links');
	  for ($i=0; $i<count($info); $i++)
		   $tpl->input(TYPE_INT, $info[$i]['link_en'], 'link_'.$info[$i]['id'], $info[$i]['sort']);
	  $tpl->hidden('parent_id', $Process->GPC['parent_id']);
	  $tpl->closewindow('Save');
	  $tpl->closeform();
	}

  if ($tpl->submitted('save'))
	  { 
	    for ($i=0; $i<count($info); $i++)
		     query("update page_links set sort = ".intval($_POST['link_'.$info[$i]['id']])." where id = ".$info[$i]['id']);
		set_form_submitted(false, true);
	    $tpl->redirect();
	  }  

?>
