<?php

class DataManager
{

   var $table = '';
   var $operator = '';
   var $db = null;
   var $parameters = '';
   var $is_serialized = false;
   var $data = array();
    
   function DataManager($table, $operator = 'insert', $para = '')
   {
      global $db;
      $this->table = $table;
	  $this->operator = $operator;
	  $this->db = $db;
	  $this->set_parameters($para);
   }
   
   function set($key, $value)
   {
     $this->data[$key] = $value;
   }

   function build($data)
   { 
	global $Process; 
	if (empty($data))
		return;
	if ($this->is_serialized)
	   {
		  $temp = $this->is_serialized === true ? $Process->options : fetch_settings($this->is_serialized);
		  $keys = explode(',', $Process->current_vars);
		  for ($i=0; $i<count($keys); $i++)
		  {
	         $temp[$keys[$i]] = $Process->GPC[$keys[$i]];
		     $this->data['data'] = serialize($temp);
		  }
	   }
	else if (is_array($data))
	    $this->data = $data;
	else
	  {
		$keys = explode(',', $data);
		for ($i=0; $i<count($keys); $i++)
		  $this->data[$keys[$i]] = $Process->GPC[$keys[$i]];
      } 
   }

   function set_parameters($para)
   {
     $this->parameters = $para;
   }

   function save()
   {
	  $this->db->perform($this->table, $this->data, $this->operator, $this->parameters);
   }
	
}


?>