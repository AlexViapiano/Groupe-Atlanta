<?php

class dental_form
{
	var $title = '';
	var $lang = 'en';
	var $inputname = 'field';
	var $fieldindex = 0;
	var $cols = 100;
	var $rows = 10;
	var $name;
	var $input = array();
	var $info = array();
	var $titles = array();
	
	function __construct($do = false, $class = false)
	{
		global $languageid;
		$this->do = $do;
		$this->lang = $languageid;
		if ($this->class)
			$this->class = 'class="'.$this->class.'"';
	}
	
	function require_fields($msg)
	{
	  $this->mandetory = '<small style="color:#ff0000">* '.$msg[$this->lang].'</small>';
	}
	
	function name($name)
	{
	  $this->name = $name[$this->lang];
	}
	
	function title($title)
	{
	  $this->titles[] = $title[$this->lang];
	}
	
    function fetch_form()
	{
		global $Process; 
		$this->errors = 0;
		if ($_POST['do'] == $this->do)
		   {
				$Process->input->clean_array_gpc('p', $this->clean);
				$Process->input->required($this->require);
				foreach ($Process->input->error_msg as $key => $value)
				{
					for ($i=1; $i<count($this->input); $i++)
					{ 
				   	  if (strpos($this->input[$i], '"'.$key.'"') == true || strpos($this->input[$i], "'".$key."'") == true)
					  {  
					  	  $this->input[$i] .= ' <span  style="color:#ff0000">'.$value.'</span>';
						  $this->errors++;
					  }
					}
				}
			 $this->processed = $this->errors == 0;
		   }
	}
	
	function set_required($require = false)
	{
		$this->fieldindex++;		
		$this->req_sign = $require ? '* ' : '';
		if ($require)
		    {
				$this->clean[$this->inputname.$this->fieldindex] = TYPE_STR;
				$this->require[$this->inputname.$this->fieldindex] = $require;
			}
	}
	
	function text($info = array(), $required = false, $selected = false, $size = 50)
	{
		$this->set_required($required);		
		$this->set_title($info);
		$this->input('text', $selected, false, $size);
	}
		
	function radio($info = array(), $data = array(), $required = false, $selected = false)
	{
		$this->set_required($required);		
		$this->set_title($info);
		$this->input('radio', $selected, $data);
	}
	
	function checkbox($info = array(), $data = array(), $required = false, $selected = false)
	{
		$this->set_required($required);		
		$this->set_title($info);
		$this->input('checkbox', $selected, $data);
	}
	
	function select($info = array(), $data = array(), $required = false, $selected = false)
	{
		$this->set_required($required);		
		$this->set_title($info);
		$this->input('select', $selected, $data);		
	}
	
	function textarea($info = array())
	{
		$this->set_required($required);		
		$this->set_title($info);
		$this->input('textarea', $selected, false, $size);		
	}
	
	function input($type, $value = false, $data = array(), $size = false)
	{
		$name = $this->inputname.$this->fieldindex;
		if ($type == 'select')
		{
			$options = $data[$this->lang];
			$this->input[$this->fieldindex] = form_select($name, $options, false, $_POST[$name], false, $this->lang == 'en' ? 'Select' : 'Choisir');
		}
		else if ($type == 'checkbox')
		{
			$options = $data[$this->lang];
			for ($i=0; $i<count($options); $i++)			
				$this->input[$this->fieldindex] .= $this->generate_field($type, $name.$i, $options[$i]).' '.$options[$i].'<br />';
		}		
		else if ($type == 'radio')
		{
			$options = $data[$this->lang];
			for ($i=0; $i<count($options); $i++)			
				$this->input[$this->fieldindex] .= '<td>'.$this->generate_field($type, $name, $options[$i]).'</td>';
		}
		else
			$this->input[$this->fieldindex] = $this->generate_field($type, $name, $value, $size);
	}
	
	function set_title($info = array())
	{
		if (empty($info))
			$info = '';
		if (count($info) > 1)
			$this->info[$this->fieldindex] = $this->req_sign.$info[$this->lang];
		else
			$this->info[$this->fieldindex] = $this->req_sign.$info;
	}
	
	function generate_field($type, $name, $value, $size = false)
	{
		$value = (isset($_POST[$name]) && !empty($_POST[$name])) ? $_POST[$name] : $value;
		if (($type == 'checkbox' || $type == 'radio') && ($value == $_POST[$name]))
			$checked = 'checked="checked"';
		if ($size)
			$size = 'size="'.$size.'"';
        if ($type == 'textarea')
			return '<textarea name="'.$name.'" '.$class.' cols="'.$this->cols.'" rows="'.$this->rows.'">'.$value.'</textarea>';
		else			
			return '<input type="'.$type.'" name="'.$name.'" '.$checked.' value = "'.$value.'" '.$this->class.' '.$checked.' '.$size.'>';		
	}
}