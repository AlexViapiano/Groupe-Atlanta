<?php


function load_module()
{
  global $extra, $Process, $page, $cart;
  define('ACTIVE_MODULE_PATH', CWD.'/includes/modules/'.$Process->GPC['module'].'/');  
  $file = ACTIVE_MODULE_PATH.'index.php';  
  if (file_exists($file))
    { 
	  $Process->path['module'] = ACTIVE_MODULE_PATH;
	  $Process->http['module'] = $Process->http['index'].'/web/'.$Process->GPC['module'];
	  $page->set_module($Process->http['module']);
	  $page->set_type($Process->scriptpath);	  
  	  include($file); 
	}
}

function load_modules()
{
  global $Process;
  $modules = fetch_dir_list(MODULE_PATH);
  foreach ($modules as $module)
  {
	  $file = MODULE_PATH.$module.'functions/functions.php';

	  if (file_exists($file) && $Process->GPC['module'].'/' != $module)
	    {
  		  include($file);
		  $modules_found[] = $module;
		}
  }
  return $modules_found;
}


function func_exec($func, $module)
{ 
   include_once(MODULE_PATH.$module.'/functions/functions_block.php');
   $custom_function = 'func_'.$func;
   $custom_function();
   return fetch_template(MODULE_PATH.$module.'/blocks/block_'.$func);
}

function load_template($template_var = array())
{
   global $extra;
   foreach ($template_var as $func => $module)
	 $extra[$func] = func_exec($func, $module);
}

function _CALLBACK_FUNCTION($func_name, $parameters = array())
{ 
   if (function_exists($func_name))
   	   return $func_name($parameters);
   else
   	   return false; 	
}

?>