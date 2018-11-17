<?php

  $tpl->use_script = false;
  $tpl->openform();
  $tpl->required = array(
				  'seperator'		=> TYPE_CHAR);
				  
  $tpl->openwindow('Generate Mailling List');  
  $tpl->title('Delimeter');  
  $tpl->input(TYPE_STR, 'Character seperator', 'seperator', $_POST['seperator']);    
  $tpl->title('Search Filters');    
  $tpl->select(TYPE_INT, 'User Group', 'usergroupid', fetch_form('usergroup', 'usergroupid', $_POST['usergroupid'], false, '' , 'All'));
  $tpl->select(TYPE_INT, 'Status', 'sex', fetch_form('sex', 'sex', $_POST['sex'], true, '', 'All'));
  $tpl->select(TYPE_INT, 'Sex', 'status', fetch_form('status', 'status', $_POST['status'], true, '' , 'All'));
  $tpl->setdo('apply_filters');  
  $tpl->closewindow('Generate list');
  $tpl->closeform();
  
  if ($tpl->submitted())
   {
	  $tpl->process_form(); 
	  if (!$tpl->error_msg)
       {	
		  $result = fetch_users_byfilter('filter');
		  $maillist = implode($Process->GPC['seperator'], fetch_field($result, 'email'));
		  $tpl->BR();
		  $tpl->openwindow('Generated List');
		  $tpl->textarea(TYPE_STR, 'List', 'list', $maillist, 15, 100);  
		  $tpl->closewindow();   
	   }  
   }  
  
?>
