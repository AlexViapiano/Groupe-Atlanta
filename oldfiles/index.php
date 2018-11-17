<?php

define('THIS_SCRIPT', 'index');
define('CSRF_PROTECTION', false);
		
require_once('includes/init.php');

$gallery_files = scandir('includes/templates/images/gallery');
foreach ($gallery_files as $gfiles)
	{
		if ((stripos($gfiles, '.jpg') !== false) || (stripos($gfiles, '.png') !== false))
			$gallery[] = 'includes/templates/images/gallery/'.$gfiles;
	}
$extra['gallery'] = $gallery;
	
if(stripos($_SERVER['HTTP_USER_AGENT'],"mobile") && $_GET['full'] != 'y')
{
	$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
	 
	$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$BlackBerry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	$Windows = stripos($_SERVER['HTTP_USER_AGENT'],"Windows");
}


 
if (isset($_GET['full']) && $_GET['full'] == 'y')
	query('update session set full = "Y" where idhash = "'.$Process->session->vars['idhash'].'" and userid = "'.$Process->session->vars['userid'].'"');

	
$extra['default_language'] = form_select('default_language', $languages, 'title', iif('default_language', $Process->options['default_language']));
$pages->change_lang = $change_lang;
$pages->load($Process->script);
define('_HOME', $pages->home['seo_url_'.$languageid]);
$current_module = $pages->module;
$extra['groups'] = $pages->groups;
$extra['group'] = $pages->group;
$extra['header_links'] = $pages->header_links;
$extra['footer_links'] = $pages->footer_links;
$extra['current_page'] = $pages->module;
$extra['keywords'] = $pages->keywords;
$extra['description'] = $pages->description;
$extra['pagetitle'] = $pages->pagetitle;
$extra['static_page'] = $pages->static_page;
$extra['link_en'] = fetch_url_link($pages->module_id, 'en');
$extra['link_fr'] = fetch_url_link($pages->module_id, 'fr');
$extra['lang_link'] = fetch_url_link($pages->module_id, $change_lang);
$extra['current_link'] = fetch_url_link($pages->module_id, $languageid);
$extra['is_home'] = $pages->is_home;
$extra['home_link'] = _HOME;
$extra['selected_link'] = $pages->module_id;
$extra['url_location'] = $pages->url_location;
$extra['url_location_id'] = $pages->url_location_id;
$extra['url_id'] = $pages->url_id;
$extra['sessionhash'] = $Process->session->vars['dbsessionhash'];
$extra['breadcrum'] = $pages->get_breadcrum();
$extra['sub_pages'] = $pages->fetch_subpages();
$extra['pages'] = $pages->load_pages(0);
$extra['TIMENOW'] = TIMENOW;
define('_BASE_URL', _ROOT_URL.'/'.$extra['current_link']);
$extra['_BASE_URL'] = _BASE_URL;
$extra['canonical'] = isset($_GET['lang']) && !empty($_GET['lang']);

$total_pages = query_first("select count(*) as total from page_links where module != 'block' and visible = 1");
$extra['total_pages'] = $total_pages['total'];
$extra['is_admin'] = $extra['is_admin'] && $Process->userinfo['god'];
if ($extra['is_admin'] && $Process->userinfo['god'])
 {  
	$extra['logout_time'] = date('Y/m/d H:i', TIMENOW + $Process->options['cookietimeout']);	 
	$extra['enable_ckeditor'] = enable_ckeditor($pages->module);  
	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
	    cms_process();
  }  

$module = !empty($Process->GPC['module']) ? $Process->GPC['module'] : '';

define('ACTIVE_MODULE_PATH', CWD.'/includes/modules/'.$module.'/');  
if (file_exists($file = ACTIVE_MODULE_PATH.'index.php'))
    include($file); 

if (file_exists(ACTIVE_MODULE_PATH.'templates/tpl_'.$extra['PAGE'].'.tpl'))
{
	$extra['add_content'] = fetch_template(ACTIVE_MODULE_PATH.'templates/tpl_'.$extra['PAGE'], $languageid);
	$extra['content_before'] = $extra['content_before'] ? $extra['content_before'] : false;
}

$extra['urlencode'] = urlencode($Process->scriptpath);
$extra['pagetitle_encode'] =  urlencode($pages->pagetitle);	
$extra['meta_description_encode'] = urlencode($pages->description);
$extra['website_name_encode'] = urlencode($Process->options['website_name_'.$languageid]);
$extra['maintenance'] = $Process->maintenance;
if ($Process->maintenance['enable'] == 'on' && !$extra['is_admin'])
	{
		echo $Process->maintenance['body_'.$languageid];
		die;
	}
display();

?>