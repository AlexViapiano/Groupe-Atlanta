<?php

  $tpl->openform();
  $tpl->openwindow('Custom Page');
  $tpl->add_page_header($info);
  $tpl->openlang($info);
  $tpl->textarea(TYPE_STR, 'Meta Tags Keywords', 'meta_keywords', false, 3, 150);           
  $tpl->textarea(TYPE_STR, 'Meta Tags Description', 'meta_descriptions', false, 3, 150);  
  $tpl->input(TYPE_STR, 'Link name', 'link');  
  $tpl->input(TYPE_STR, 'Page Title', 'page_title');  
  $tpl->textarea(TYPE_STR, 'Page content', 'body'); 
  $tpl->closelang();  	    
  $tpl->closewindow($button);
  $tpl->closeform();
  
?>
