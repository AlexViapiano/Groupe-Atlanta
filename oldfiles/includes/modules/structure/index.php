<?php

  define('MODULE', 'structure');
  $sitemap = fetch_sitemap();

  function is_header($page)
  {
	 global $sitemap;
     if ($page['active_header'] && $page['parent_id'] == 0)
	 	 return true;
	 else if ($page['parent_id'] != 0)
	  {
		 $page = query_first("select active_header, parent_id from page_links where id = ".$page['parent_id']);
	 	 return is_header($page);
	  }
	 return false;
  }
  
  function groups()
  {
	 global $languageid;
     $groups = query_array("select * from page_links where position != 0");
	 foreach ($groups as $group)
	    $li .= '<li><a href="'.fetch_url_link($group['id'], $languageid).'">'.$group['link_'.$languageid].'</a></li>	';
	 return $li;
  }
  
  function create_schema($sitemap, $url = '', $echo = '')
  {
	  global $languageid;
	  foreach ($sitemap as $page)
	  {
		 if (is_header($page) || (!$page['position'] && !$page['home']))
		 {
			 $echo .= '<li><a href="'.$url.$page['seo_url_'.$languageid].'">'.$page['link_'.$languageid].'</a>';
			 if (is_array($page['children']) && count($page['children']))
			 	 $echo .= '<ul>'.create_schema($page['children'], $page['seo_url_'.$languageid].'/').'</ul>';
			 $echo .= '</li>';
		 }
	  }
	  return $echo;
  }
  echo '
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.$languageid.'" lang="'.$languageid.'">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1"/>
	<meta name="author" content="Divergence Marketing, http://www.divergencemarketing.com" />
	<title>'.$Process->options['website_name_'.$languageid].'</title>
	<base href="http://www.divergencemarketing.com/inspira/" />

	<link rel="stylesheet" type="text/css" media="screen, print" href="includes/modules/structure/slickmap.css" />
</head>

<body>
<div class="sitemap">
		
		<h1>'.$Process->options['website_name_'.$languageid].'</h1>
		<h2>Website Structure &mdash; English Version</h2>
	
		<ul id="utilityNav">'.groups().'</ul>
<ul id="primaryNav"  class="col9"><li id="home"><a href="'.$pages->home['seo_url_'.$languageid].'">'.$pages->home['link_'.$languageid].'</a></li>'.create_schema($sitemap).'</ul>
</div>
	
</body>

</html>';

  die;


?>