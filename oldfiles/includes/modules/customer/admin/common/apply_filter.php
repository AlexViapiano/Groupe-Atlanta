<?php

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
  
?>