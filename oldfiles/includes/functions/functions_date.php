<?php

function days_in_month($date)
{
  return date("t", $date);
}

function date_interval($date, $loc=1)
{
  $date = is_numeric($date) ? $date : strtotime($date);
  $Temp = date("Y-m-d", $date);
  return $loc == 0 ? mktime(0,0,0,date("m", $date),date("d", $date),date("Y", $date)) : mktime(23,59,59,date("m", $date),date("d", $date),date("Y", $date));
}

function diff_days($date1, $date2=false)
{
   $date2 = !$date2 ? date("Y-m-d") : $date2;
   $date1 = convert_totime($date1);
   $date2 = convert_totime($date2);
   $diff = abs($date1 - $date2);
   return floor($diff / (60*60*24));
}

function convert_totime($date)
{
   $result = is_numeric($date) ? $date : strtotime($date);
   return $result;
}

function set_timezone($data, $fields)
{
  $fields = explode(',', $fields);
  for ($i=0; $i<count($data); $i++)
    for ($find=0; $find<count($fields); $find++)
	  $data[$i][$fields[$find]] = timezone($data[$i][$fields[$find]]);
  return $data;
}

function timezone($date)
{
  global $Process;

  $hour = 3600;
  if (checkDateFormat($date))
	  $date = strtotime($date); 
  $time_diff = $Process->userinfo['timezone'] - $Process->options['server_timezone'];
  $date += $time_diff * $hour;
  return $date;
}

function checkDateFormat($date)
{
  if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts))
  {
	if(checkdate($parts[2],$parts[3],$parts[1]))
	  return true;
	else
	 return false;
  }
  else
    return false;
}

function get_month($pos='')
{
   global $Process;
   return date("Y-m-d", strtotime(DATE.' '.$pos.' month'));
}

function month_link($pos='')
{
   $date = get_month($pos);
   return " href='".$_SERVER['PHP_SELF']."?date=".$date."' title='".ucfirst(strftime("%B %Y", strtotime($date)))."'";
}

?>