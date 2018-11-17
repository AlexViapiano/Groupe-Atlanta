<?php

class _pages
{
   var $seperator = ' &raquo; ';
    
   function load($url)
   {
	   $this->set_home();	   
	   $this->init_page($url);
	   $this->init();
	   $this->set_links();
       $this->load_blocks(0);
       $this->load_blocks($this->module_id);
   }
   
   function get_breadcrum()
   {
	  foreach ($this->breadcrum as $key => $value)
	  	$bread[] = '<a href="'.$value.'">'.$key.'</a>';
	  return implode($this->seperator, $bread);
   }

   function load_pages($parent_id=0, &$pages=array())
   {
	   $fetch = query_array("select * from page_links where parent_id = ".$parent_id." and visible = 1 and module != 'block' order by sort");
	   foreach ($fetch as $page)
	   {
	   	  $pages[$page['id']] = $page;
  	      $children = query_array("select * from page_links where parent_id = ".$page['id']." and visible = 1 and module != 'block' order by sort");
		  if (count($children) > 0)
		  	  $this->load_pages($page['id'], $pages[$page['id']]['child']);
	   }
	   return $pages;
   }
   function set_page($module)
   {
	 global $Process;
     if (empty($module['body_'.$this->lang]))
	   {
	   	   $Process->GPC['module'] = $module['module'];
		   if (!empty($module['page_title_'.$this->lang]))
		  	   $this->pagetitle = $module['page_title_'.$this->lang];		   
	   }
	 else
	    { 
		   if ($module['module'] != 'custom')
		   		$Process->GPC['module'] = $module['module'];
		   if (!empty($module['body_'.$this->lang]))
			    $this->static_page = $module['body_'.$this->lang];
		   $this->pagetitle = $module['page_title_'.$this->lang];
		}
	 $this->keywords = $this->module['meta_keywords_'.$this->lang];
	 $this->description = $this->module['meta_descriptions_'.$this->lang];
   }
  
   function init_page($url)
   {
	   global $languageid;
	   $add_url = '';
	   $point = 0;
	   $this->url = $url;
	   $this->lang = $languageid;
	   $thisscript = substr($this->url, strlen(ADD_DIR.'/'));
	   $url = explode('/', $thisscript);
	   $parent_id=0;
	   $this->module_name = $url[0];
	   $this->breadcrum[$this->home['link_'.$languageid]] = $this->home['seo_url_'.$languageid];
	   for ($i=0; $i<count($url); $i++)
       {
	 	   $module = $this->fetch_page($this->lang, $url[$i], $parent_id);
		   if (!empty($module['module']))
			   $this->module_name = $module['module'];		   
		   $breadtitle = $module['link_'.$languageid];
		   $this->breadcrum[$breadtitle] .= $add_url.$module['seo_url_'.$languageid];
		   $add_url .= $module['seo_url_'.$languageid].'/';
		   $url_level[] = $module['seo_url_'.$languageid];
		   $url_id[] = $module['id'];
		   $this->url_location_id = $i;
	   	   if (empty($module))
		     {
	   	 	    $point = $i;
				break;
			 }
	   	   $parent_id = $module['id'];
		}
		$this->module = $module;
		$this->parent_id = $parent_id;
		$this->module_id = $this->module['id'];
		$this->url = $url[$point];
		$this->url_id = $url_id; 
		$this->url_location = $url_level;
		$this->home_url = empty($url[0]);
    }
   
   function init()
   {
 	    global $Process; 
 		$this->is_home = $this->home['id'] == $this->module_id || $this->home_url;
  	 	if (empty($this->module) && !empty($this->url))
	  	 {  
			$temp = $this->fetch_page($this->change_lang, $this->url, $this->parent_id);
			if (!empty($temp) && lang_found($this->change_lang))
			    redirect(_ROOT_URL.'/'.$temp['seo_url_'.$this->change_lang].'?lang='.$this->change_lang);
		  }
		if (empty($this->url))
			{
			  $this->module = $this->home;
			  $this->module_id = $this->module['id'];			
			  $this->set_page($this->home);
			}
	    else if (!empty($this->module))
	  	    $this->set_page($this->module);
		else
		  {
			@header("HTTP/1.0 404 Not Found");
		    $this->set_page($this->page_404);
		  } 
        if (file_exists('includes/modules/'.$this->module_name.'/index.php'))
		   {  
			  $Process->GPC['module'] = $this->module_name;
			  $this->url_info = $url;
		   }
	   }

   function set_home()
   {
	  global $languageid;
	  $this->home = query_first("select * from page_links where home = 1"); 
	  $this->page_404 = query_first("select * from page_links where seo_url_".$languageid." = 404 and parent_id = 0"); 
   }
   
   function set_links()
   {
	  global $languageid;
	  $this->header_links = query_array("select * from page_links where parent_id = 0 and active_header = 1 and visible = 1 order by sort");
	  $this->footer_links = query_array("select * from page_links where parent_id = 0 and active_footer = 1 and visible = 1 order by sort");
	  $this->groups = query_array("select * from groups where active = 1");
	  foreach ($this->groups as $group)
	  {
	    $position = query_array("select * from page_links where position = ".$group['id']." order by sort");
		for ($i=0; $i<count($position); $i++)
			$position[$i]['path_'.$languageid] = fetch_url_link($position[$i]['id'], $languageid);
	    $this->group[$group['id']] = $position;
	  }
   }

   function load_blocks($parent_id=0)
   { 
	 global $extra, $languageid;;
     $blocks = query_array("select * from page_links where module = 'block' and parent_id = ".$parent_id." order by sort");
	 for ($i=0; $i<count($blocks); $i++)
	  if ($parent_id > 0)
  	      $extra['blocks_page'][] = $blocks[$i];	  
	  else
  		  $extra[$blocks[$i]['name']] = $blocks[$i];
   }
   
   function fetch_page($lang, $url, $parent_id=0, $group = '')
   {
	   if ($gourp)
	   	   $group = " and groups = '".$group."'";
	   return query_first("select * from page_links where seo_url_".$lang." = '".MakeURLSafeString($url)."' and parent_id = ".intval($parent_id)." and module != 'block' ".$gourp);	   
   }
   
   function fetch_subpages($parentid=0)
   {
	   $child = array();
	   if ($parentid == 0)
	   	   $pages = $this->header_links;
	   else
		   $pages = query_array("select * from page_links where parent_id = ".$parentid." and visible = 1 and module != 'block' order by sort");
	   foreach ($pages as $page)
	     { 
			 $children = query_array("select * from page_links where parent_id = ".$page['id']." and visible = 1 and module != 'block' order by sort");
			 if (count($children))
			 	 $child[$page['id']] = $children;
		 }
	   return $child;
   }
}



?>