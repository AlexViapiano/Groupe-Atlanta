<?php

define('MODULE', 'treatment');

$extra['add_content_same'] = true;
if ($extra['current_page']['parent_id'] == 0)
	$current_module = query_first("select * from page_links where parent_id = 26 and sort = 1");

$extra['treatment_options'] = query_array("select * from page_links where parent_id = 26 order by sort");
$path = query_first("select * from page_links where id = 26");
$extra['parent_path'] = $path['seo_url_'.$languageid];	

$extra['is_selected'] = $current_module['seo_url_'.$languageid];

$extra['view_page'] = $current_module['body_'.$languageid];
$extra['keywords'] = $current_module['meta_keywords_'.$languageid];
$extra['description'] = $current_module['meta_descriptions_'.$languageid];	
$extra['pagetitle'] = $current_module['page_title_'.$languageid];

$extra['PAGE'] = 'treatment';

?>