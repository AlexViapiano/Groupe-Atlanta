<?php

include('includes/class/class.directory.php');

$directory = new directory_info();

function upload_success($name)
{
  return $_FILES[$name]['error'] != 4;
}

function fetch_modules()
{ 
//  $exclude = array('account', 'main_pages');
  $modules = fetch_dir_list(MODULE_PATH);
  foreach ($modules as $module)
    if (file_exists(MODULE_PATH.$module.'add_page.php'))
	  {
		$found = basename($module);
		$pages[format_word($found)] = $found;
	  }
  return $pages;
}


function fetch_dir_list($path, $recursive = null)
{
  global $directory;
  return $directory->get_dir_list($path, $recursive);
}

function fetch_file_list($path, $ext = null)
{
  global $directory;	
  return $directory->get_ext_based_filelist(null, $path, null, $ext);
}

function fetch_file_contents($file)
{
  $file = strtolower($file);
  if (file_exists($file))
  	  return file_get_contents($file);
}
?>