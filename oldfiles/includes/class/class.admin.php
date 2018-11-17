<?php

class admin_tpl
{
  
  var $window = '';
  var $row = 1;
  var $action;
  var $textarea_script = false;
  var $langmode = false;
  var $langvalues = array();
  var $languages = array();
  var $clean_gpc = array();
  var $clean_gpc_exclude = array();
  var $exceptions = array();
  var $input = array();
  var $required = array();
  var $title = array();
  var $use_script = true;

  function admin_tpl()
  {
	 $this->window .= '<script type="text/javascript" src="../includes/scripts/calendardateinput.js"></script> ';	  
  }
  
  function openwindow($title = '')
  { 
	  $this->window .= '<table cellpadding="4" cellspacing="0" border="0" align="center" width="90%" style="border-collapse:separate" class="tborder" id="sform_table">
	  					<tr><td class="tcat" align="center" colspan="2"><b>'.$title.'</b></td></tr>';
  }
  
  function openform($action='', $on_submit = '', $method='post')
  {
	 global $Process;
	 $action = empty($action) ? $Process->scriptpath : $action;
	 $on_submit = empty($on_submit) ? 'onsubmit()' : $on_submit;
	 $this->add_buttons = '';
	 $this->clean_gpc = array();
     $this->clean_gpc_exclude = array();
     $this->exceptions = array();
	 $enctype = $this->enctype ? 'enctype="multipart/form-data"' : '';
	 $this->window .= '<form action ="'.$action.'" method="'.$method.'" '.$enctype.'>';
	 $this->window .= $this->hidden('securitytoken', $Process->userinfo['securitytoken']);
  }
  
  function title($title)
  {
	  $this->window .= '<tr valign="top"><td class="optiontitle" colspan="2"><div>'.$title.'</div></td></tr>';
  }
  
  function closeform()
  {
	  $this->window .= '</form>';
  }
  
  function setdo($value = null)
  {
	  $this->hidden('do', $value);
	  $this->action = $value;
  }
  
  function form_posted()
  { 
    return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
  }
  
  function set_titlename($title, $name)
  { 
	 if ($this->langmode)
	  {
	    for ($i=0; $i<count($this->languages); $i++)
		  $this->title[$name.'_'.$this->languages[$i]['id']] = $title.' - '.$this->languages[$i]['title'];	  	
	  }
	 $this->title[$name] = $title;
  }
  
  function hidden($name, $value=false)
  {
	  $value = $value ? $value : $name;
	  $this->window .= $this->inputfield($name, $value, 'hidden');
  }
  
  function closewindow($name='', $value='', $type = 'submit')
  {
  	  $button = empty($name) ? '&nbsp;' : $this->button($name, $value, $type);
	  $this->window .= '<tr><td class="tfoot" colspan="2" align="center">'.$button.' '.$this->add_buttons.'</td></tr></table>';
  }

  function input($gpc_type, $title='', $name='', $value='', $action='')
  {
	  $value = empty($value) && $_POST[$name] ? $_POST[$name] : $value;
	  $this->set_titlename($title, $name);
	  if ($this->langmode)
	  	  $this->add_lang_row($gpc_type, $title, $this->textfield($name.'_$lang', '$value', $action));
	  else
	    {
		  $this->add_row($title, $this->textfield($name, $value, $action));
		  $this->clean_gpc[$name] = $gpc_type;
		}
  }
  
  function button_add($name)
  {
	$this->button_add = $this->button($name);
  }
  
  function input_file($title, $name, $value=false)
  {
	 $this->add_row($title, $this->inputfield($name, $value, 'file'));
     $this->set_titlename($title, $name);	 
     $this->clean_gpc[$name] = TYPE_STR;	 
  }
    
  function set_actions($actions, $data, $r=1, $update_id='id')
  {
	 foreach ($actions as $key => $msg)
	 {
		 $this->window .= '<td class="alt'.$r.'" align="center">';		 
		 $this->openform();		 
		 $this->setdo($key);
		 $this->hidden($update_id, $data[$update_id]);
		 $this->window .= $this->button($key, retrieve_name($key), 'button', addslashes(parse_values($msg, $data)));
		 $this->closeform();		 		 
		 $this->window .= '</td>';			 
	 }
  }
  
  function no_record()
  {
     $this->window .= '<td colspan="2" align="center">No Record found!</td>';
  }
  
  function format_value($field, $value)
  {
	 if (strpos($field, 'date') !== false)
		 	return date('M j, Y', $value);
  	  return $value;
  }
   
  function query_array($data=array(), $header=array(), $actions=array(), $update_id = 'id')
  {
	 $r=1; 
	 if (empty($data))
	 	return $this->no_record();
	 $this->window .='<tr><td colspan="2"><table width="100%">'; 
	 $this->window .= '<tr>';
	 foreach ($header as $field => $value)
	 	$this->window .= '<td><strong>'.$value.'</strong></td>';
     if (!empty($actions))
	   {
		  $add_col = count(array_keys($actions));
		  $this->window .= '<td align="center" colspan="'.$add_col.'"><strong>Actions</strong></td>';
	   }
	 $this->window .= '</tr>';
	 for ($i=0; $i<count($data); $i++)
	 {
		$this->window .= '<tr>';
		foreach ($header as $field => $value)
	 		$this->window .= '<td class="alt'.$r.'">'.$this->format_value($field, $data[$i][$field]).'</td>';
		if ($add_col)
			$this->set_actions($actions, $data[$i], $r, $update_id);
		$this->window .= '</tr>';
		$r++;
		$r = $r == 2 ? 2 : 1;
	 }
	 $this->window .= '</table></td></tr>';
  }
  
  function submitted($posted = false)
  {
	 $detected = $posted ? $_POST['do'] == $posted : $this->action == $_POST['do'];
	 $is_submitted = $detected || ($_POST[$posted] && $posted == $posted) || (isset($_POST['do']) && !$posted);
	 if ($posted && $is_submitted)
	 	 $this->action = $posted;
	 return $is_submitted;
  }
  
  function fetch_select($gpc_type, $table, $title=false, $name=false, $selected=false, $parent_id=0, $all='')
  {
	 $name = !$name ? $table : $name;
	 $new_select = generate_select($table, $name, $selected, $parent_id, $all);
	 $this->select($gpc_type, $title, $name, $new_select);
  }
  
  function select($gpc_type, $title='', $name, $select='')
  {
	  $this->set_titlename($title, $name);
	  $this->add_row($title, $select);
	  $this->clean_gpc[$name] = $gpc_type;	  
  }
  
  function button($name='', $value='', $type='submit', $onclick='')
  {
	 $value = empty($value) ? $name : $value;
	 return $this->inputfield($name, $value, $type, '', $onclick);
  }

  function checkbox($gpc_type, $title='', $name='', $checked=0)
  {
     $this->set_titlename($title, $name);
	 $this->add_row($title, $this->inputfield($name, 'on', 'checkbox', $checked));
     $this->clean_gpc[$name] = $gpc_type;	 
  }
  
  function set_translate()
  {
  }
  
  function add_custom($title, $value)
  {
	 $this->add_row($title, $value);
  }
  
  function set_required_lang()
  {
	foreach ($this->required as $key => $value)
	{
	   if (strpos($key, '$lang'))
	     {
		 	for ($i=0; $i<count($this->languages); $i++)
			{
			   $newkey = str_replace('$lang', $this->languages[$i]['id'], $key);
			   $this->required[$newkey] = $value;
			}
			unset($this->required[$key]);
		 }
	}
  }
  
  function fetch_name($value)
  {
     $newval = strpos($value, 'name="');
	 $newval = substr($value, $newval+6);
	 return substr($newval, 0, strpos($newval, '"'));
  }
  
  function generate_lang()
  { 
	for ($i=0; $i<count($this->languages); $i++)
	{
		$this->title('Language - '.$this->languages[$i]['title']);
		foreach ($this->langtemp as $title => $field)
		{
		  $result = str_replace('$lang', $this->languages[$i]['id'], $field);
		  $name = $this->fetch_name($result);
		  $result = str_replace('$value', iif($name, $this->langvalues[$name]), $result);
		  $this->add_row($title, $result);
		  $this->clean_gpc[$name] = $this->langtitle[$title.'_gpc'];
		}
	}
  }
  
  function set_window($custom)
  {
	$this->window .= $custom;
  }
  
  function script($script)
  {
    $path = '../includes/scripts/';
	switch ($script)
	{
	   case 'color':
	   	 $script_path = $path.'jscolor/jscolor.js';
		 break;
	}
	$this->window .= '<script type="text/javascript" src="'.$script_path.'"></script>';
  }
  
  function input_color($gpc_type, $title, $name, $value)
  {
     $this->add_row($title, $this->color($name, $value));
 	 $this->clean_gpc[$name] = $gpc_type;	 	 
  }
  
  function openlang($values=array())
  {
	 global $languages;
	 $this->langmode = true;
	 $this->langvalues = $values;
	 $this->languages = $languages;
  }
  
  function closelang()
  {
	 $this->langmode = false;
	 $this->generate_lang();
  }
  
  function set_textarea_script()
  {
    if (!$this->textarea_script && $this->use_script)
	  {
		 $this->textarea_script = true;
		 $this->window .= '<script type="text/javascript" src="../includes/scripts/ckeditor/ckeditor.js"></script>
		 <script type="text/javascript" src="../includes/scripts/ckeditor/ckfinder/ckfinder.js"></script>';
		 //admin_script('advanced');
	  }
  }
  
  function textarea($gpc_type, $title='', $name='', $value='', $rows=0, $cols=0)
  {
	 $this->set_textarea_script();	  
	 $this->set_titlename($title, $name);
	 if ($this->langmode)
	     $this->add_lang_row($gpc_type, $title, $this->textareafield($name.'_$lang', '$value', $rows, $cols));
	 else
	   {
	     $this->add_row($title, $this->textareafield($name, $value, $rows, $cols));
	 	 $this->clean_gpc[$name] = $gpc_type;	 
	   }
  }
  
  function template($gpc_type, $title, $name, $template='')
  {
    $_POST[$name.'_en'] = fetch_template($template, 'en');
    $_POST[$name.'_fr'] = fetch_template($template, 'fr');	
	$this->textarea($gpc_type, $title, $name); 	  
  }
  
  function add_page_header($info, $block=false)
  {
	 if (!$block)
	  {
		  $this->required = array(
			  'page_title_$lang' 	=> TYPE_TITLE);  
				  
		  if ($info['active_header'])
	  		  $this->required['link_$lang'] = TYPE_TITLE;
	 
/*		 $this->title('Meta Tags');  
		 $this->input(TYPE_STR, 'Keywords', 'meta_keywords', $info['meta_keywords']);           
		 $this->input(TYPE_STR, 'Description', 'meta_descriptions', $info['meta_descriptions']);  */
		 if ($info['parent_id'] == 0)
		    {           
			 $this->title('Header Links');  
		     $this->select(TYPE_STR, 'Activate in header', 'active_header', form_select('active_header', fetch_YesNo(), false, $info['active_header']));  
		     $this->select(TYPE_STR, 'Activate in footer', 'active_footer', form_select('active_footer', fetch_YesNo(), false, $info['active_footer']));  			 	 
		     $this->select(TYPE_STR, 'Set as home page', 'home', form_select('home', fetch_YesNo(), false, $info['home']));  	 		 
			}
	  } 
	 $this->hidden('module_set', $info['selected_module']);       	 
	 $this->hidden('selected_module', $info['selected_module']);   
 	 $this->hidden('parent_id', $info['id']);   
  }
  
  function redirect($force=false)
  {
	 if ($force)
	 	 set_form_submitted(false, true);
	 if (!$this->error_msg)
	 	redirect('home.php');
  }
  
  function calendar($name, $title='', $default='', $gpc_type=TYPE_STR)
  {
	  $this->set_titlename($title, $name);
	  if (empty($default) && $_POST[$name])
	  	  $default = ', "'.$_POST[$name].'"';
	  else if ($default)
		  $default = ', "'.$default.'"';
  	  $this->clean_gpc[$name] = $gpc_type;		  
	  $this->add_row($title, '<script>DateInput("'.$name.'", true, "YY-MM-DD" '.$default.')</script>');
  }
  
  function add_lang_row($gpc_type, $title, $field)
  {
	  $this->langtemp[$title] = $field;
	  $this->langtitle[$title.'_gpc']  = $gpc_type;
  }
  
  function add_row($title='', $value='')
  {
	 global $Process;
	 $this->window .= empty($title) ? '<tr valign="top"><td class="alt'.$this->row.'" colspan=2 align=center>'.$value.'</td></tr>' : 
	 				'<tr valign="top"><td class="alt'.$this->row.'">'.$title.'</td><td class="alt'.$this->row.'">'.$value.' '.$this->button_add.'</td></tr>';
	 $this->window .= "\n\n";
	 $this->inc_row(); 
	 $this->button_add = false;
  }

  function inc_row()
  {
    $this->row++;
	$this->row = $this->row == 2 ? 2 : 1;
  }
  
  function popup_msg($errors)
  { 
    $this->error_msg .= '<div align="left">';
	if (is_array($errors))
	    foreach ($errors as $title => $error)
			$this->error_msg .= '<strong>- '.$this->title[$title].':</strong> '.$error.'<br>';
	else
		$this->error_msg = $errors;
    $this->error_msg .= '</div>';
  }
  
  function clean_gpc($clean_gpc, $clean_gpc_exclude)
  {
	global $Process; 
	$Process->input->clean_array_gpc('p', $clean_gpc, $clean_gpc_exclude);
  }
  
  function process_form($db=array(), $addons=array(), $msg='')
  {
	global $Process; 
	$msg = empty($msg) && isset($this->action) ? $this->action : $msg;
	$this->set_required_lang();
	$this->clean_gpc($this->clean_gpc, $this->clean_gpc_exclude);
	if (!$Process->input->error_msg)
		$Process->input->required($this->required, $this->input, $this->exceptions);
	if (!$Process->input->error_msg && (!empty($db) || $this->serialize))
		$this->insert_id = save_input($db, $addons, $msg, $this->serialize);  
	else if (!empty($Process->input->error_msg))
		$this->popup_msg($Process->input->error_msg);
	$this->success = !$this->error_msg && query_affected_rows();
  }
  
  function sendmail($msg, $email='')
  {
	 global $Process;
	 $email = empty($email) ? $Process->GPC['email'] : $email;
	 eval(fetch_email_msg($msg));
	 sendmail($email, $subject, $message);	
  }

  function BR()
  {
	  $this->window .= '<br>';
  }
  
  function parse()
  {
	  global $extra;
	  $extra['page'] = $this->window;
  }
  
  function textareafield($name='', $value='', $rows=0, $cols=0)
  { 
	$rows = $rows ? 'rows="'.$rows.'"' : '';
	$cols = $cols ? 'cols="'.$cols.'"' : '';	
	$temp = '<textarea name="'.strtolower($name).'" '.$rows.' '.$cols.' id="'.strtolower($name).'" >'.str_replace('src="includes/', 'src="../includes/', $value).'</textarea>';	
	if (strpos(strtolower($name), 'body') !== false)
			$temp .= '<script type="text/javascript">	
						var editor = CKEDITOR.replace( \''.strtolower($name).'\',
						{
							extraPlugins : \'autogrow\',
							autoGrow_maxHeight : 400,
							removePlugins : \'resize\'
						});
						CKFinder.setupCKEditor( editor, \''.ADD_DIR.'/includes/scripts/ckeditor/ckfinder/\' ) ;
					  </script>';
	return $temp;
  }
  
  function textfield($name='', $value='')
  {
	return $this->inputfield(strtolower($name), $value, 'textfield');
  }
  
  function inputfield($name='', $value='', $type='submit', $checked='', $onclick='')
  {
	 $class = in_array($type, array('submit', 'button')) ? 'class="button"' : '';
	 $checked = $checked || (empty($checked) && $_POST[$name]) ? 'checked="checked"' : ''; 
	 $onclick = $onclick ? 'onclick="if (confirm(\''.$onclick.'\')) this.form.submit();"' : '';
	 $value = $value ? 'value="'.$value.'"' : '';
	 return '<input type="'.$type.'" name="'.strtolower(str_replace(' ', '_', $name)).'" '.$value.' '.$class.' '.$checked.' '.$onclick.' size=150>';
  }

  function color($name, $value)
  {
	  return '<input name="'.$name.'" class="color" value="'.$value.'">';
  }
}

?>