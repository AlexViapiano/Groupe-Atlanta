<?php

  define('MODULE', 'main_pages');
  $page->home($Process->GPC['type']);  
  
  if (empty($Process->GPC['type']))
  	  redirect('index');
	  
  $page_result = fetch_byid('pages_fixed', $Process->GPC['type'], 'link');
  
  if (empty($page_result))
  	  redirect('index');

  $extra['body'] = $page_result['body_'.$Process->userinfo['language_id']];  
  $extra['PAGE'] = 'default_page';
  
?>