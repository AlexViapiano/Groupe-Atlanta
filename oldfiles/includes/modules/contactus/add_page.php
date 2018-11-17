<?php

  $tpl->openform();
  $tpl->openwindow('Contact Us Page');
  $tpl->add_page_header($info);
  $tpl->openlang($info);
  $tpl->input(TYPE_STR, 'Meta Tags Keywords', 'meta_keywords');           
  $tpl->input(TYPE_STR, 'Meta Tags Description', 'meta_descriptions');    
  $tpl->input(TYPE_STR, 'Link name', 'link');  
  $tpl->input(TYPE_STR, 'Page Title', 'page_title');  
  $tpl->closelang();  	    
  $tpl->closewindow($button);
  $tpl->closeform();
    
?>
