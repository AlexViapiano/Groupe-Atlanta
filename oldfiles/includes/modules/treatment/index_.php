<?php

define('MODULE', 'treatment');
//echo_array($current_module);
//echo_array($current_module);
//echo $languageid.' '.$Process->userinfo['language_id'];
$extra['first_page'] = $current_module['body_'.$languageid];
$extra['treatment_options'] = query_array("select * from page_links where parent_id = ".$current_module['id']." order by sort");

$extra['PAGE'] = 'treatment';
  
?>