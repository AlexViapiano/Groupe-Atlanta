<?php

function get_normalizeChars()
{
  $final = array();
  $normalizeChars = query_array("select * from conversion");
  for ($i=0; $i<count($normalizeChars); $i++)
      {
		  $re = array(utf8_encode($normalizeChars[$i]['from']) => $normalizeChars[$i]['to']);
		  $final = array_merge($final, $re);
	  }
  return $final;
}

function MakeURLSafeString($string)
{  
  global $normalizeChars, $languageid;
  $and = $languageid == 'en' ? 'and' : 'et';
 /* echo $string;
  echo_array($normalizeChars);*/
  $string = strtr($string, $normalizeChars);
  $string = str_replace('&', '-'.$and.'-', $string);
  $string = trim(preg_replace('/[^\w\d_ -]/si', '', $string));//remove all illegal chars
  $string = strtolower($string); // Makes everything lowercase (just looks tidier).   
  $string = preg_replace('/[^a-z0-9]+/', '-', $string); // Replaces all non-alphanumeric characters with a hyphen.   
  $string = preg_replace('/[-]{2,}/', '-', $string); // Replaces one or more occurrences of a hyphen, with a single one.   
  $string = trim($string, '-'); // This ensures that our string doesn't start or end with a hyphen.   */
  return $string;   
}  


?>