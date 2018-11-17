<?php

function include_cms_tutorials()
{ 
    global $extra, $Process;
	$modules = fetch_menu();
	foreach ($modules as $module => $info)
	{ 
	   $module = strtolower(str_replace(' ', '_', $module));
	   for ($i=0; $i<count($info); $i++)
		if (file_exists(MODULE_PATH.$module.'/admin/tutorial/'.$info[$i]['option'].'.php'))
	    {
		   include(MODULE_PATH.$module.'/admin/tutorial/'.$info[$i]['option'].'.php');
		   $questions[] = $question;
		   $answers[] = $answer;
	    }
	}
  if (is_array($questions))
     {
		 $result = '<br /><h2>F.A.Q</h2>';
		 for ($i=0; $i<count($questions); $i++)
		 	$result .= '<p>- <a href="'.$Process->scriptpath.'#faq'.$i.'" title="'.$questions[$i].'">'.$questions[$i].'</a></p>';
		 $result .= '<br /><hr><br />';
		 for ($i=0; $i<count($answers); $i++)
			$result .= '<p><a name="faq'.$i.'">'.$answers[$i].'</a></p><br />';
	 }
  return $result;
}

function canviewcp($field)
{ 
   $user = fetch_userinfo($field);
   return $user['god'] || ($user['permissions']['canviewcp'] && $user['permissions']['modules']);
}

function validate_input_language(&$GPC = array(), $fields = array(), $type = TYPE_STR)
{
  $empty_field = true;
  $languages = fetch_languages();
  for ($i=0; $i<count($languages); $i++)
  {
	foreach ($fields as $value)
	  {
		$key = $value.'_'.$languages[$i]['id'];   
		$GPC[$key] = $type;
		if (empty($_POST[$key]))
			$empty_field = false;
	  }
  }  
  return $empty_field;
}

function redirect_form($success='', $url='home', $input='', $option='')
{
  global $Process;
  echo '<form action="'.$url.'.php?success='.$success.'&'.$$option.'='.$option.'&'.$_SERVER['QUERY_STRING'].'" method="post" name="redirect_cp"> '.$input.'
	  	<input type="hidden" name="securitytoken" value="'.$Process->userinfo['securitytoken'].'" /> </form> 
  		<SCRIPT LANGUAGE="JavaScript"> setTimeout(\'document.redirect_cp.submit()\',1000);</SCRIPT>';
  die;
}

function mass_email($users)
{
	global $Process;
	@set_time_limit(0);
	$found = count($users);
	header_start();
	flush_out();
	for ($i=0; $i<$found; $i++)
	 {
		 $lang = $Process->GPC['language_selected'] != false ? $Process->GPC['language_selected'] : $users[$i]['language_id'];
		 echo '<strong>Username:</strong> '.$users[$i]['username'].'<br /> ';
		 echo '<strong>Full name:</strong> '.$users[$i]['firstname'].' '.$users[$i]['lastname'].'<br /> ';
		 echo '<strong>Email:</strong> '.$users[$i]['email'].'<br />';
		 echo '<strong>Prefered language:</strong> '.$users[$i]['lang_title'].'<br />';		 
		 echo 'Sending.....';
		 flush_out();
		 if (sendmail($users[$i]['email'], $Process->GPC['subject_'.$lang], $Process->GPC['message_'.$lang], $Process->GPC['use_template'], $users[$i]['language_id'], true))
		 	echo ' sent successfully!';
		 else
		   {
		  	  echo ' email failed!';
			  $failed++;
		   }
		 echo '<br /><br />';
		 echo str_repeat(" ", 256);
		 echo '<SCRIPT language=JavaScript>window.scrollBy(0,50);</script>';
		 flush_out(); 
	 }
	 $button = '<input type=submit name=redirect_cp value="Continue">';
	 redirect_form('massemail', 'home', $button);
}

function admin_script($theme='simple')
{   global $Process;
	return '<script type="text/javascript" src="../includes/scripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "'.$theme.'",
		force_p_newlines:false,
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		extended_valid_elements: "div[align,class,dir,title,id,lang,style,onclick,ondblclick,onmousedown,onmousemove,onmouseout,onmouseover,onmouseup,onkeydown,onkeypress,onkeyup],script[type|src],iframe[class|src|frameborder=0|alt|title|width|height|align|name]",


		// Example content CSS (should be your site CSS)
		content_css : "'.$Process->path['index'].ADD_DIR.'/includes/templates/css/style.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js"
	});
</script>';
}

function build_query_byarray($GPC, $oper='and', $symb='')
{
	global $Process;

    $keys = !empty($Process->current_vars) ? explode(',', $Process->current_vars) : false;
	for ($i=0; $i<count($keys); $i++)
	   { 
	      if (!empty($Process->GPC[$keys[$i]]) || ($GPC[$keys[$i]] == TYPE_BOOL))
		 	 $temp[] = $symb.$keys[$i]."='".$Process->GPC[$keys[$i]]."'";
	   }
   return !empty($temp) ? implode(' '.$oper.' ', $temp) : '';  
}

function build_query_byfield($data, $value, $oper='or', $symb='', $like=false)
{
  if (empty($value))
  	return;
  $value = $like == false ? " ='".$value."' " : " like '%".$value."%' ";	
  for ($i=0; $i<count($data); $i++)
 	 $temp[] = $symb.$data[$i]." ".$value;
  return !empty($temp) ? implode(" ".$oper." ", $temp) : '';  	
}

function fetch_news_byfilter($Type, $orderby='')
{
	global $Process;
	$filter = build_query_byarray($Type, 'and');
	$filter .= $filter ? " and in_calendar between ".date_interval($Process->GPC['incalendar1'], 0)." and ".date_interval($Process->GPC['incalendar2']) : '';		
	return fetch_news($filter, $orderby);
}

function fetch_users_byfilter($is_filter = false)
{
	global $Process;

	$fields = array('username', 'email', 'firstname', 'lastname');
	$Process->current_vars = 'status,sex,usergroupid';	
    $orderby = empty($Process->GPC['orderby']) ? 'username' : $Process->GPC['orderby'];
    switch ($is_filter)
	{
		case 'filter' : 
			   $filter = build_query_byarray('and', 'u.');
			break;
			
		case 'exact_match':
				$filter = build_query_byfield($fields, $Process->GPC['search_field'], 'or', 'u.');
			break;
			
		case 'find':
				$filter = build_query_byfield($fields, $Process->GPC['search_field'], 'or', 'u.', true);
			break;
			
		case 'email_filter': 
			   $filter1 = build_query_byarray('and', 'u.');
			   $keywords = explode(';', $Process->GPC['search_field']);
			   for ($i=0; $i<count($keywords); $i++)
				   $filter2[] = build_query_byfield($fields, $keywords[$i], 'or', 'u.', true);
			   $filter2 = implode(' or ', $filter2);
			   $filter = (empty($filter1) or empty($filter2)) ? $filter1.''.$filter2 : $filter1.' and '.$filter2;
			break;
			
		default: $filter = '';
			break;
	} 
    return fetch_users($filter, $orderby);
}

function is_allowed($module, $file)
{
	global $Process;
	
	/*$find = $Process->db->query_first_slave("select * from ".TABLE_PREFIX."admin_menu_options ops, ".TABLE_PREFIX."admin_access a 
			where ops.action = '".$page."' and ops.menu_option_id = a.menu_option_id and a.userid = ".$Process->userinfo['userid']." and canaccess = 1 order by sort");
	if (empty($find))
		process_logout();*/
	return true;
}

function confirm_cp_access($module = null, $file=null)
{
  global $Process;
  if ($Process->userinfo['userid'] < 1)
  	  redirect('redirect_parent.php');
  else if (!$Process->userinfo['permissions']['canviewcp'])
  	  process_logout();
}

function fetch_menu_options($module, $options, &$config)
{
  for ($j=0; $j<count($options); $j++)
   {
     $option = array();
	 $name = format_word($options[$j]);
	 $name = basename($name, '.php');
	 $option['name'] = $name;
	 $option['option'] = basename($options[$j], '.php');
	 $option['file'] = $Process->path['index'].ADD_DIR.'/admin/home.php?module='.basename($module).'&file='.$option['option'];
	 if (strpos($option['file'], 'config_'))
	    {
	 	  $option['name'] = ucfirst(substr($name, 7));			
	 	  $config[] = $option;
		}
	 else
		 $option_list[] = $option;
	}
  return $option_list;
}

function fetch_module_templates_files($module)
{  
   return fetch_file_list(strtolower($module).'templates/', array('tpl'));
}

function fetch_module_templates($module='')
{ 
  if ($module)
      return fetch_module_templates_files(MODULE_PATH.$module);
  else
    {
	  $modules = fetch_dir_list(MODULE_PATH);
	  for ($i=0; $i<count($modules); $i++)	  
	  {
		$templates = fetch_module_templates_files(MODULE_PATH.$modules[$i]);
		if (count($templates) > 0)
			$found[] = ucfirst(substr($modules[$i], 0, -1));
	  }
	} 
  return $found;
}

function fetch_menu()
{
  global $Process;
  $menu = array();
  $menu['Configuration'] = array();
  $modules = fetch_dir_list(MODULE_PATH);	
  for ($i=0; $i<count($modules); $i++)
  { 
	$options = fetch_file_list(MODULE_PATH.$modules[$i].'admin/', array('php'));
    $module = format_word($modules[$i]);	   
	$module = basename($module);	
    $found = fetch_menu_options($modules[$i], $options, $config);
	if (!empty($found))
		$menu[$module] = $found;
  }
  $menu['Configuration'] = $config;
  return $menu;
}



?>