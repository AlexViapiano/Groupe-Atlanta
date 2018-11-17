<?php

function fetch_link($link, $path, $title=false, $class=false)
{
  $title = !$title ? $link : $title;
  $class = $class ? 'class="'.$class.'"' : '';
  return '<a href="'.$path.'" title="'.$title.'" '.$class.' >'.$link.'</a>';
}

function fetch_img($img, $title, $class=false, $id=false, $width=false)
{
  $class = $class ? 'class="'.$class.'"' : '';	
  $name = $id ? 'name="'.$id.'"' : '';
  $id = $id ? 'id="'.$id.'"' : '';	  
  $width = $width ? 'width="'.$width.'"' : '';	    
  return '<img src="'.$img.'" '.$class.' '.$id.' '.$name.' title="'.$title.'" alt="'.$title.'" '.$width.' border="0">';
}

function fetch_select($table, $root=0, $selected=false, $action='', $parent_name='Root', $disabled = false, $title='')
{
   return form_select('parent_id', fetch_select_list($table, $root), 'name', $selected, false, $parent_name, $action, false, $disabled, $title);
}

function fetch_select_list($table, $parent_id = 0, &$final = array(), $spacer='', $field='link')
{
   global $Process, $languageid, $extra;
   if ($extra['ignore_parent'])
   	   $ignore_parent = ' and parent_id <> '.$extra['ignore_parent'].' and id <> '.$extra['ignore_parent'];
   $result = $Process->db->query_array("select ".$field."_".$languageid." as name, id from ".$table." where parent_id = ".$parent_id." and module !='block' and visible = 1 ".$ignore_parent." order by link_en");
   $spacer .= '&nbsp;&nbsp;';   
   foreach ($result as $data)
   {
      $final[] = $data;
	  $final[count($final)-1]['name'] = !empty($parent_id) ? $spacer.'- '.$final[count($final)-1]['name'] : '- '.$final[count($final)-1]['name'];

	  fetch_select_list($table, $data['id'], $final, $spacer);
   }
   $spacer = '';
   return $final;
}

function strip_html_tags( $text )
{
	// PHP's strip_tags() function will remove tags, but it
	// doesn't remove scripts, styles, and other unwanted
	// invisible text between tags.  Also, as a prelude to
	// tokenizing the text, we need to insure that when
	// block-level tags (such as <p> or <div>) are removed,
	// neighboring words aren't joined.
	$text = preg_replace(
		array(
			// Remove invisible content
			'@<head[^>]*?>.*?</head>@siu',
			'@<style[^>]*?>.*?</style>@siu',
			'@<script[^>]*?.*?</script>@siu',
			'@<object[^>]*?.*?</object>@siu',
			'@<embed[^>]*?.*?</embed>@siu',
			'@<applet[^>]*?.*?</applet>@siu',
			'@<noframes[^>]*?.*?</noframes>@siu',
			'@<noscript[^>]*?.*?</noscript>@siu',
			'@<noembed[^>]*?.*?</noembed>@siu',

			// Add line breaks before & after blocks
			'@<((br)|(hr))@iu',
			'@</?((address)|(blockquote)|(center)|(del))@iu',
			'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
			'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
			'@</?((table)|(th)|(td)|(caption))@iu',
			'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
			'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
			'@</?((frameset)|(frame)|(iframe))@iu',
		),
		array(
			' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
			"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
			"\n\$0", "\n\$0",
		),
		$text );

	// Remove all remaining tags and comments and return.
	return strip_tags( $text );
}

function fetch_state_form($country_id = 39, $state_id = 73)
{ 
  global $Process;
  $states = query_array("select * from state where country_id = ".$country_id);
  if (empty($states))
  	  return '<input type="text" name="state">';
  return form_select('state', $states, 'name_'.$Process->userinfo['language_id'], $state_id);
}

function fetch_form_field($name, $table, $field, $selected=false, $para=false)
{
  global $Process;
  $para = $para == false ? '' : " where ".$para;
  $data = $Process->db->query_array("select * from ".$table." ".$para);
}

function fetch_form($table, $name=false, $selected=false, $lang=true, $style='form', $add=false, $onchange=false)
{
  global $db, $Process;
  $name = !$name ? $table : $name;
  $find = $lang ? "name_".$Process->userinfo['language_id'] : 'name';
  $Data = $db->query_array("select id, ".$find." from ".$table);
  return form_select($name, $Data, $find, $selected, $style, $add, $onchange);
}

function fetch_name($table, $id, $lang=true, $field='')
{
  global $db, $Process;
  $name = !$name ? $table : $name;
  $find = $lang ? "name_".$Process->userinfo['language_id'] : $field;
  $Data = $db->query_first_slave("select ".$find." from ".$table." where id = ".$id);
  return $Data[$find];
}

function form_select($name, $data, $field=false, $selected=false, $style='form', $add=false, $onchange=false, $encode=false, $disabled=false, $title=false)
{
  $Options = '';
  if ($add != false)
  	 $Options .= "<option value=0>".$add."</option>";
  $style = !empty($style) ? 'class='.$style : '';
  $onchange = $onchange == false ? '' : 'onchange="'.$onchange.'"'; 
  $disabled = $disabled == false ? '' : 'disabled="disabled"';
  $title = $title == false ? '' : 'title="'.$title.'"';  
  if (!is_assoc_array($data))
  	foreach ($data as $key => $value)
  	  $Options .= $value == $selected ? "<option value='".$value."' selected>".$key."</option>" : "<option value='".$value."'>".$key."</option>";	
  else
    for ($i=0; $i<count($data); $i++)	
  	   if (!$field)
	  	  $Options .= $data[$i] == $selected ? "<option value='".$data[$i]."' selected>".$data[$i]."</option>" : "<option value='".$data[$i]."'>".$data[$i]."</option>";
	   else
	    {
  		  $id = empty($data[$i]['id']) ? $data[$i][$field] : $data[$i]['id'];
		  $Options .= $id == $selected ? "<option value='".$id."' selected>".$data[$i][$field]."</option>" : "<option value='".$id."'>".$data[$i][$field]."</option>";
		}
  $Options = $encode ? utf8_encode($Options) : $Options;
  return "<select name='".$name."' ".$onchange." ".$style." ".$disabled." ".$title.">".$Options."</select>";
}

function href($name, $link, $class = false)
{
	$class = !$class ? '' : 'class = '.$class;
	$link .= _file_ext;
	return "<a href='".$link."' ".$class.">".$name."</a>";
}

function flush_out()
{
  @ob_flush();
  flush();
}

function header_start()
{
   global $Process;
   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en"><head><title>Admin Control Panel</title><meta http-equiv="Content-Type" content="text/html; charset='.$Process->options['encoding'].'" /><link href="../includes/templates//controlpanel.css" rel="stylesheet" type="text/css"></head><body >';
   flush_out();
}
