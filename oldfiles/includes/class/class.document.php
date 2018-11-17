<?php

class _document
{

  var $seperator = ' &raquo; ';
  var $breadcrum = '';
  var $index = '';
  var $module = '';
  var $type = '';
  
  function _document()
  {
	 global $Process;
	 $this->phrase = $Process->phrase;
	 $this->link = $Process->http.ADD_DIR;
  }
  
  function set_module($module)
  {
 	 $this->module = $module;
  }
  
  function home($phrase)
  {
	 global $pages;
	 $this->breadcrum = $this->set_link('home');
	 $this->link .= empty($this->module) ? '/'.MakeURLSafeString($phrase) : '/'.$this->module;	 
	 $this->breadcrum .= $this->seperator.$this->set_link($phrase);
  }
  
  function title($pagetitle)
  {
	 $this->link .= '/'.MakeURLSafeString($pagetitle);
	 $this->breadcrum .= $this->seperator.$this->set_link($pagetitle);
  }
  
  function set_link($phrase)
  {
	 return '<a href="'.$this->link.'">'.$this->get_phrase($phrase).'</a> ';
  }
  
  function parse()
  {
	 global $extra;echo_array($this->breadcrum);
	 $extra['breadcrum'] = $this->breadcrum;
  }
  
  function get_phrase($phrase)
  {
	 return !empty($this->phrase[$phrase]) ? $this->phrase[$phrase] : format_word($phrase);
  }
}