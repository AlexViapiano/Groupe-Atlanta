<?php

function save_input($db_query = array(), $set_data = array(), $msg='default', $is_serialized=false)
{
  global $Process, $languages; 
  require_once('includes/class/class.datamanager.php');
  $para = $db_query['action'] == 'update' && !empty($db_query['para']) ? $db_query['para'] : 'id='.$Process->GPC['id'];
  $action = empty($db_query['action']) ? 'insert' : $db_query['action'];
  if ($is_serialized)
  {
	  $db_query['table'] = 'settings';
	  $action = 'update';
	  $para = $is_serialized === true ? "title='settings'" : "title='".$is_serialized."'";
  } 
  $data = new DataManager($db_query['table'], $action, $para);  
  $data->is_serialized = $is_serialized;
  $data->build($Process->current_vars);
  foreach ($set_data as $key => $value)
  { 
    if ($key == 'seo_url')
	  for ($i=0; $i<count($languages); $i++)
	    $data->set($key.'_'.$languages[$i]['id'], MakeURLSafeString($Process->GPC[$value.'_'.$languages[$i]['id']]));
	else	
	    $data->set($key, $value); 
  }
  $data->save();
  $insert_id = query_insert_id();
  $Process->GPC['insert_id'] = $insert_id;
  set_form_submitted($msg);
  return $insert_id;
}

function set_form_submitted($msg = false, $force=false)
{
  global $Process;
  $msg = fetch_notify($msg);
  $msg = empty($msg) ? fetch_notify('default') : $msg;
  $temp = $msg;
  $Process->GPC['affected_rows'] = query_affected_rows();  
  $msg = $Process->GPC['affected_rows'] ? $msg : fetch_notify('no_changes_detected'); 
  log_it();  
  if ($force)
  	  $msg = $temp;
  $Process->db->query("update session set form_submitted = '".addslashes($msg)."' where userid = ".$Process->userinfo['userid']);  
  $Process->db->submitted = true;  
}

function fetch_settings($title='settings')
{
  $settings = query_first("select * from settings where title='".$title."'");
  return $settings['unserialize'] ? unserialize($settings['data']) : $settings['data'];
}

function query($sql)
{
  global $Process;
  return $Process->db->query($sql);
}

function query_first($sql)
{
  global $Process;
  return $Process->db->query_first_slave($sql);
}

function query_array($sql)
{
  global $Process;
  return $Process->db->query_array($sql);
}

function query_process($table, $data=array(), $action='insert', $para='')
{
  global $Process;
  return $Process->db->perform($table, $data, $action, $para);
}

function query_affected_rows()
{
  global $Process;
  return $Process->db->affected_rows();
}

function query_insert_id()
{
  global $Process;
  return $Process->db->insert_id();
}


?>
