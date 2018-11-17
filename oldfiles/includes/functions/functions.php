<?php

require('functions_html.php');
require('functions_date.php');
require('functions_other.php');
require('functions_database.php');
require('functions_directory.php');
require('functions_validation.php');
require('functions_password.php');
require('functions_login.php');
require('functions_log.php');
require('functions_calendar.php');

function fetch_online_users()
{
   $count = query_first("select count(*) as count from session");
   return $count['count'];
}


function fetch_recursive_pages($table, $parent_id = 0, &$final = array())
{
   global $languages, $languageid;
   $result = query_array("select * from ".$table." where parent_id = ".$parent_id." and module !='block' and visible = 1 order by link_".$languageid);
   foreach ($result as $data)
   {
      $final[] = $data;
	  foreach ($languages as $language)
		  $final[count($final)-1]['path_'.$language['id']] = fetch_url_link($data['id'], $language['id']);
	  fetch_recursive_pages($table, $data['id'], $final[count($final)-1]['children']);
   }
   return $final;
}

function fetch_sitemap($parent=0)
{
  return fetch_recursive_pages('page_links', $parent);
}

function fetch_url_link($id, $lang='en')
{
   $link = query_first("select parent_id, id, seo_url_".$lang." from page_links where id = ".intval($id));
   if ($link['parent_id'] > 0)
   	   $link['seo_url_'.$lang] = fetch_url_link($link['parent_id'], $lang).'/'.$link['seo_url_'.$lang];
   return $link['seo_url_'.$lang];
}

function format_word($word)
{
   return ucfirst(strtolower(str_replace('_', ' ', $word)));
}
function set_byid($arr, $id)
{
  $newarr = array();
  for ($i=0; $i<count($arr); $i++)
    $newarr[$arr[$i][$id]] = $arr[$i];
  return $newarr;
}

function fetch_languages()
{
   global $db;
   
   return $db->query_array("select * from ".TABLE_PREFIX."language where status = 1 order by title");
}

function fetch_category_list($table, $parent_id = 0, &$final = array(), $spacer='')
{
   global $languageid;
   $result = query_array("select name_".$languageid." as name, id from ".$table." where parent_id = ".$parent_id." order by sort");
   $spacer .= '&nbsp;&nbsp;';   
   foreach ($result as $data)
   {
      $final[] = $data;
	  $final[count($final)-1]['name'] = !empty($parent_id) ? $spacer.'- '.$final[count($final)-1]['name'] : '- '.$final[count($final)-1]['name'];

	  fetch_category_list($table, $data['id'], $final, $spacer);
   }
   $spacer = '';
   return $final;
}

function parse_values($text, $data=array())
{
 global $Process;
 $data = empty($data) ? $Process->GPC : $data;
  foreach ($data as $key => $value)
  {
	if (empty($value))
		$result = 'Unanswered!';
	else if ($value == 'on')
		$result = 'Yes';
	else 
		$result = $value;
	$text = str_replace('{$'.$key.'}', $result, $text);	  
  }
  return $text;  
}

function generate_select($table, $name, $selected, $parent_id=0, $all='')
{
  return form_select($name, fetch_category_list($table, $parent_id), 'name', $selected, false, $all);
}

function fetch_byid($table, $id, $_id=false)
{
  global $Process;
  $_id = $_id == false ? 'id' : $_id;
  return $Process->db->query_first_slave("select * from ".$table." where ".$_id." = '".$id."'");
}

function fetch_notify($msg = 'default')
{
  global $Process, $extra; 
  $msg = $extra['is_admin'] ? $Process->admin_notify[$msg] : $Process->notify[$msg];
  return $msg;
}

function fetch_error_msg($msg = 'default', $error='')
{
  global $Process; 
  $msg = defined('admin_module') ? $Process->admin_error_msg[$msg] : $Process->error_msg[$msg];
  return empty($error) ? $msg : "\$error_msg['$error'] = \"".$msg."\";";  
}

function fetch_phrase($msg)
{
  global $Process;
  return fetch_template($Process->phrase[$msg]);
}

function include_file($file)
{
  global $Process;
  if (file_exists($file))
  	  include($file);
}

function fetch_selected_link($fields = array())
{
  $home = basename($_SERVER['PHP_SELF'], '.php');
  foreach ($fields as $value)
  	$selected[$value] = $_GET['view'] == $value ? 'class="selected"' : '';
  $selected['home'] = !isset($_GET['view']) ? 'class="selected"' : '';
  return $selected; 
  
}

function multi_sort($x, $y)
{
   if ($x['event_date'] == $y['event_date'])  
   	   return 0; 
   else if ($x['event_date'] < $y['event_date'])  
   	   return 1; 
   else  
   	   return -1;
}
   
function fetch_field($data, $field)
{
  for ($i=0; $i<count($data); $i++)
  	$result[] = $data[$i][$field];
  return $result;
}

function explode_last($oper, $data)
{
  $remove = $data[strlen($data)-1] == '/' ? 2 : 1;
  $temp = explode($oper, $data);
  $last = count($temp) - $remove;
  return $temp[$last];
}

function echo_array($arr)
{
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}

function fetch_news_categories()
{
  global $Process;
  
  return $Process->db->query_array("select * from ".TABLE_PREFIX."category");
}

function add_to_link($link, $para)
{
  $operator = strpos($link, '?') === false ? '?' : '&';
  return $link.$operator.$para;
}
/*
function fetch_link($field, $value)
{ 
  return strpos($_SERVER['REQUEST_URI'], $field) !== false ? str_replace($field.'/'.$_GET[$field], $field.'/'.$value, $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI'].'/'.$field.'/'.$value;
}
*/

function fetch_page_link($page)
{
  global $Process, $extra;
  $url = $Process->scriptpath;
  $find = 'page='.$_GET['page'];
  $replace = 'page=%d';
  $link = strpos($url, $find) ? str_replace($find, $replace, $url) : add_to_link($url, $replace);
  $extra['page_link'] = $link;
  return sprintf($extra['page_link'], $page);
}

function setpage_links($total, $max_per_page, $max_col)
{
  global $extra;
  $cur_page = fetch_curr_page();
  $pages = $max_per_page < 1 ? 1 : ceil($total / $max_per_page);
  $extra['pages'] = $pages > 1 ? $pages : -1;
  $extra['cur_page'] = $cur_page;
  $extra['prev'] = $cur_page <= 1 ? '' : fetch_page_link($cur_page-1);
  $extra['next'] = $cur_page < $extra['pages'] ? fetch_page_link($cur_page+1) : '';
  $extra['max_col'] = $max_col;
  $extra['total_found'] = $total;
  $extra['showing_1'] = $cur_page == 1 ? 1 : ($max_per_page * ($cur_page - 1) + 1);
  $extra['showing_2'] = $cur_page < $pages ? $max_per_page + $extra['showing_1'] - 1 : $total;
}

function fetch_limit($limit)
{
  $start = ($limit * fetch_curr_page()) - $limit;
  return ' limit '.$start.', '.$limit.' ';
}

function fetch_curr_page()
{
  global $Process;
  $Process->input->clean_array_gpc('g', array('page' => TYPE_INT));
  return !empty($Process->GPC['page']) ? $Process->GPC['page'] : 1;
}

function fetch_table($table, $para='', $order='', $page=false)
{
  global $Process;
  $parameters = empty($para) ? '' : ' where '.$para;
  if ($page)
	  $limit = fetch_limit($page);
  $result = $Process->db->query_array("select * from ".TABLE_PREFIX.$table." ".$parameters." ".$order." ".$limit);
//  $total =  $Process->db->query_array("select * from ".TABLE_PREFIX.$table." ".$parameters." ".$order);
 // setpages($total, $page);
  return $result;
}

function fetch_category_images_folder()
{
	global $Process;
	$path = $Process->config['Misc']['template'].'/images/categories/';
	$files = scandir($path);
	return array_slice($files, 2);
}

function fetch_files($path, $recursive=null, $filter=null)
{
  require_once('includes/class/class.directory.php');
  $files = new directory_info();
  return $files->get_ext_based_filelist(false, $path, true);
}

function strip_html($text)
{
  return trim(strip_tags($text));
}

function fetch_translate_languages()
{
	$languages=array();
	$languages['Arabic'] = 'ar';
	$languages['Bulgarian'] = 'bg';
	$languages['Chinese'] = 'zh-CN';
	$languages['Croatian'] = 'hr';
	$languages['Czech'] = 'cs';
	$languages['Danish'] = 'da';
	$languages['Dutch'] = 'n1';
	$languages['English'] = 'en';
	$languages['Finnish'] = 'fi';
	$languages['French'] = 'fr';
	$languages['German'] = 'de';
	$languages['Greek'] = 'el';
	$languages['Hindi'] = 'hi';
	$languages['Italian'] = 'it';
	$languages['Japanese'] = 'ja';
	$languages['Korean'] = 'ko';
	$languages['Polish'] = 'pl';
	$languages['Portuguese'] = 'pt';
	$languages['Romanian'] = 'ro';
	$languages['Russian'] = 'ru';
	$languages['Spanish'] = 'es';
	$languages['Swedish'] = 'sv';	
	return $languages;
}

function input_changes_detected($Process)
{
  $keys = explode(',', $Process->current_vars);
  for ($i=0; $i<count($keys); $i++)
    if ($_POST[$keys[$i]] != $_POST['original_'.$keys[$i]])
		return true;
  return false;
}

function is_assoc_array($data)
{
   return $data == array_values($data);
}

function fetch_YesNo()
{
   return array('Yes' => 1, 'No' => 0);
}

function fetchpathonly($path)
{
	$pos = strpos($path, '?');
	return $pos === false ? $path : substr($path, 0, $pos);
}

function compare_path($path1, $path2)
{
	$path1 = fetchpathonly($path1);
	$path2 = fetchpathonly($path2);	
	return $path1 == $path2;
}

function redirect($url=false, $para='')
{
   global $Process;
 
   exec_shut_down();
   if (strpos($url, 'http') !== false)
      { 
   	  	 header('location: '.$url, true, 302);
		 die; 
	  }
   $url = $url == false && defined('REDIRECT') ? REDIRECT : _ROOT_URL.'/'.$url;   
   if (!empty($para))
   	  $para = '/'.$para; 
   $url = empty($url) ? '' : $url.$para;
   header('location: '.$url.$para, true, 302);
   die;
}

function require_login()
{
  global $Process;
  if ($Process->userinfo['userid'] <= 0)
      redirect('login');
}

function detect_browser()
{
   $browser = 'other';	
   $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
   if (strpos($useragent, 'opera') !== false)
	   $browser = 'opera';
   if (strpos($useragent, 'msie ') !== false AND !$is['opera'])
	   $browser = 'ie';
   if (strpos($useragent, 'mac') !== false)
	   $browser = 'mac';
   if (strpos($useragent, 'applewebkit') !== false)
	{
	   $browser = 'webkit';
       if (strpos($useragent, 'safari') !== false)
	   	   $browser = 'safari';
	}
   if (strpos($useragent, 'konqueror') !== false)
	   $browser = 'konqueror';
   if (strpos($useragent, 'gecko') !== false AND !$is['safari'] AND !$is['konqueror'])
	{
	   $browser = 'mozilla';
		if (preg_match('#gecko/(\d+)#', $useragent, $regs))
		   $browser = 'mozilla';
	}
   if (strpos($useragent, 'firefox') !== false OR strpos($useragent, 'firebird') !== false OR strpos($useragent, 'phoenix') !== false)
	{
	   preg_match('#(phoenix|firebird|firefox)( browser)?/([0-9\.]+)#', $useragent, $regs);
	   $browser = 'firebird';
	   if ($regs[1] == 'firefox')
		   $browser = 'firefox';
	}
   if (strpos($useragent, 'chimera') !== false OR strpos($useragent, 'camino') !== false)
	   $browser = 'camino';
   if (strpos($useragent, 'webtv') !== false)
	   $browser = 'webtv';
   if (preg_match('#mozilla/([1-4]{1})\.([0-9]{2}|[1-8]{1})#', $useragent, $regs))
	   $browser = 'netscape';
   return $browser;
}

function set_lang_settings($local)
{
	setlocale(LC_TIME, $local);
}

function lang_found($lang = 'en')
{
	$lang = query_first("select id from language where id = '".$lang."' and status = 1");
	return !empty($lang);
}

function multi_array_sort(&$array, $subkey="id", $sort_ascending=false) 
{
    if (count($array))
       $temp_array[key($array)] = array_shift($array);
    foreach($array as $key => $val)
	{
        $offset = 0;
        $found = false;
        foreach($temp_array as $tmp_key => $tmp_val)
        {
            if(!$found and strtolower($val[$subkey]) > strtolower($tmp_val[$subkey]))
            {
                $temp_array = array_merge(    (array)array_slice($temp_array,0,$offset),
                                            array($key => $val),
                                            array_slice($temp_array,$offset)
                                          );
                $found = true;
            }
            $offset++;
        }
        if(!$found) $temp_array = array_merge($temp_array, array($key => $val));
    }

    if ($sort_ascending) $array = array_reverse($temp_array);
    else $array = $temp_array;
}

function iif($field, $alternative)
{
   if (isset($_POST[$field]) and (!empty($_POST[$field]) || ($_POST[$field] == 0)))
   	   return $_POST[$field];
   return $alternative;
}



function can_change_username($username, $userid)
{
	global $Process;

	$user = $Process->db->query_first_slave("SELECT username FROM " . TABLE_PREFIX . "user WHERE username = '$username' and userid != $userid");
	return !$user ? true : false;
}

function array_merger($arr1, $arr2)
{
  if (is_array($arr1) && is_array($arr2))
	  return array_merge($arr1, $arr2);
  else if (is_array($arr1))
	  return $arr1;
  else if (is_array($arr2))
  	  return $arr2;
  else 
  	  return false;
}

function fetch_info($table, $field, $value, $lang=false)
{
  global $db, $Process;
  $field = !$lang ? $field : $field."_".$Process->userinfo['language_id'];
  $result = $db->query_first("select ".$field." from ".$table." where id = '".$value."'"); 
  return $result[$field];
}


function canviewcp($field)
{ 
   $user = fetch_userinfo($field);
   return $user['god'] || $user['permissions']['canviewcp'];
}

function found_email($email, &$user)
{
   global $db;
   $found = $db->query_first("select userid, email, username from " . TABLE_PREFIX . "user where email = '".$email."'");
   $is_allowed = (defined('admin_module') && canviewcp($found['userid'])) || (!defined('admin_module'));
   $user = $found;
   return is_array($found) && !empty($found) && $is_allowed;
}

function verify_security_token($request_token, $user_token)
{
	global $Process;

	// This is for backwards compatability before tokens had TIMENOW prefixed
	if (strpos($request_token, '-') === false)
	{
		return ($request_token === $user_token);
	}
	list($time, $token) = explode('-', $request_token);

	if ($token !== sha1($time . $user_token))
	{
		return false;
	}

	// A token is only valid for 3 hours
	if ($time <= TIMENOW - 10800)
	{
		$Process->GPC['securitytoken'] = 'timeout';
		return false;
	}

	return true;
}

function fetch_email_template($type, $lang=false, $alternate_msg=false)
{
  global $Process;
  $lang = $lang === false ? $Process->userinfo['language_id'] : $lang;  
  $word = array(
		'{$username}' => $Process->GPC['username'],
		'{$email}' => $Process->GPC['email'],
		'{$newpassword}' => $Process->GPC['newpassword'],	
		'{$lastname}' => $Process->GPC['lastname'],			
		'{$firstname}' => $Process->GPC['firstname'],			
		'{$phone}' => $Process->GPC['phone'],			
		'{$request}' => nl2br($Process->GPC['request']),					
		'{$lang}' => $lang,
		'{$website_slogan}' => $Process->options['website_slogan'],
		'{$website_link}' => $Process->options['website_link'],		
		'{$website_name}' => $Process->options['website_name']
	);
  $template = $Process->config['Misc']['email_template'];
  if (file_exists($template))
   {
	   $template = file_get_contents($template);
	   $body = $alternate_msg ? $type : file_get_contents($Process->config['Misc']['email_template_path'].'/'.$lang.'/'.$type.'.tpl');
	   $footer = file_get_contents($Process->config['Misc']['email_template_path'].'/'.$lang.'/footer.tpl');	   
	   $template = str_replace('{$body}', $body, $template);
	   $template = $Process->GPC['use_footer'] ?  str_replace('{$footer}', $footer, $template) : str_replace('{$footer}', '', $template);
	   $template = $lang == 'en' ? str_replace('{$regards}', 'Regards', $template) : str_replace('{$regards}', 'Salutation', $template);
	   foreach ($word as $key => $value)
	     $template = str_replace($key, $value, $template);
	   foreach ($_POST as $key => $value)
	     $template = str_replace('{$'.$key.'}', $value, $template);		 
   }
  return $template;
}

function parse_content($content, $lang=false)
{
	global $Process, $languageid; 
	$Process->GPC['website_name'] = $Process->options['website_name_'.$languageid];
	$Process->GPC['website_link'] = $Process->options['website_link'].ADD_DIR;
	$Process->GPC['email_contact'] = $Process->options['email_contact'];
    foreach ($Process->GPC as $key => $value)
      $content = str_replace('{$'.$key.'}', $value, $content);
	return $content;
}

function sendmail_type($toemail, $type)
{
   global $Process;
   sendmail($toemail, $Process->email_msg[$type]['subject'], $Process->email_msg[$type]['message']);
}

// #############################################################################
/**
* Starts the process of sending an email - either immediately or by adding it to the mail queue.
*
* @param	string	Destination email address
* @param	string	Email message subject
* @param	string	Email message body
* @param	boolean	If true, do not use the mail queue and send immediately
* @param	string	Optional name/email to use in 'From' header
* @param	string	Additional headers
* @param	string	Username of person sending the email
*/
function sendmail($toemail, $subject, $message, $use_template = true, $lang=false, $alternate_msg=false)
{ 
	global $Process;
	if (empty($toemail)) 
		return false; 
	include_once('includes/class/class.mail.php'); 
	$mail = new SMail($Process, $lang);
	$message = parse_content($message, $lang);
	if (!$mail->start($toemail, $subject, $message, $from, $uheaders, $username))
		return false;		
	return $mail->send();
}

function fetch_datasaved_msg($msg)
{
  global $Process;

  include('includes/lang/'.$Process->userinfo['language_id'].'/datasaved_msg.php'); 
  return "\$datasaved_msg[$msg] = \"".$datasaved_phrase[$msg]."\";";
}
/*
function fetch_error_msg($msg, $error)
{
  global $Process;

  include('includes/lang/'.$Process->userinfo['language_id'].'/error_msg.php'); 
  return "\$error_msg[$error] = \"".$error_phrase[$msg]."\";";		
}*/

function fetch_email_msg($msg)
{
  global $Process;
  return "\$message = \"".$Process->email_msg[$msg]['message']."\";"; 

}





// #############################################################################

/**

* Sets a cookie based on vBulletin environmental settings

*

* @param	string	Cookie name

* @param	mixed	Value to store in the cookie

* @param	boolean	If true, do not set an expiry date for the cookie

* @param	boolean	Allow secure cookies (SSL)

* @param	boolean	Set 'httponly' for cookies in supported browsers

*/

function set_cookie($name, $value = '', $permanent = true, $allowsecure = true, $httponly = false)

{

	global $Process;



	if ($permanent)

		$expire = TIMENOW + 60 * 60 * 24 * 365;

	else

		$expire = 0;



	$httponly = (($httponly AND (is_browser('ie') AND is_browser('mac'))) ? false : $httponly);

	$secure = ((REQ_PROTOCOL === 'https' AND $allowsecure) ? true : false);

	$name = COOKIE_PREFIX . $name;

	$filename = 'N/A';

	$linenum = 0;

	if (!headers_sent($filename, $linenum))

	{ // consider showing an error message if they're not sent using above variables?

		if ($value === '' OR $value === false)

		{

			// this will attempt to unset the cookie at each directory up the path.

			// ie, path to file = /test/vb3/. These will be unset: /, /test, /test/, /test/vb3, /test/vb3/

			// This should hopefully prevent cookie conflicts when the cookie path is changed.

			if ($_SERVER['PATH_INFO'] OR $_ENV['PATH_INFO'])

				$scriptpath = $_SERVER['PATH_INFO'] ? $_SERVER['PATH_INFO'] : $_ENV['PATH_INFO'];

			else if ($_SERVER['REDIRECT_URL'] OR $_ENV['REDIRECT_URL'])

				$scriptpath = $_SERVER['REDIRECT_URL'] ? $_SERVER['REDIRECT_URL'] : $_ENV['REDIRECT_URL'];

			else

				$scriptpath = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_ENV['PHP_SELF'];

			$scriptpath = preg_replace(

				array('#/[^/]+\.php$#i', '#/(' . preg_quote($Process->config['Misc']['admincpdir'], '#') . '|' . preg_quote($Process->config['Misc']['modcpdir'], '#') . ')(/|$)#i'), '', $scriptpath);

			$dirarray = explode('/', preg_replace('#/+$#', '', $scriptpath));

			$alldirs = '';

			$havepath = false;

			if (!defined('SKIP_AGGRESSIVE_LOGOUT'))

			{

				foreach ($dirarray AS $thisdir)

				{

					$alldirs .= "$thisdir";

					if ($alldirs == $Process->options['cookiepath'] OR "$alldirs/" == $Process->options['cookiepath'])

						$havepath = true;

					if (!empty($thisdir))

						exec_set_cookie($name, $value, $expire, $alldirs, $Process->options['cookiedomain'], $secure, $httponly);

					$alldirs .= "/";

					exec_set_cookie($name, $value, $expire, $alldirs, $Process->options['cookiedomain'], $secure, $httponly);

				}

			}

			if ($havepath == false)

				exec_set_cookie($name, $value, $expire, $Process->options['cookiepath'], $Process->options['cookiedomain'], $secure, $httponly);

		}

		else

			exec_set_cookie($name, $value, $expire, $Process->options['cookiepath'], $Process->options['cookiedomain'], $secure, $httponly);

	}

}



// #############################################################################

/**

* Calls PHP's setcookie() or sends raw headers if 'httponly' is required.

* Should really only be called through vbsetcookie()

*

* @param	string	Name

* @param	string	Value

* @param	int		Expire

* @param	string	Path

* @param	string	Domain

* @param	boolean	Secure

* @param	boolean	HTTP only - see http://msdn.microsoft.com/workshop/author/dhtml/httponly_cookies.asp

*

* @return	boolean	True on success

*/

function exec_set_cookie($name, $value, $expires, $path = '', $domain = '', $secure = false, $httponly = false)

{

	if ($httponly AND $value)

	{

		// cookie names and values may not contain any of the characters listed

		foreach (array(",", ";", " ", "\t", "\r", "\n", "\013", "\014") AS $bad_char)

		{

			if (strpos($name, $bad_char) !== false OR strpos($value, $bad_char) !== false)

				return false;

		}

		// name and value

		$cookie = "Set-Cookie: $name=" . urlencode($value);

		// expiry

		$cookie .= ($expires > 0 ? '; expires=' . gmdate('D, d-M-Y H:i:s', $expires) . ' GMT' : '');

		// path

		$cookie .= ($path ? "; path=$path" : '');

		// domain

		$cookie .= ($domain ? "; domain=$domain" : '');

		// secure

		$cookie .= ($secure ? '; secure' : '');

		// httponly

		$cookie .= ($httponly ? '; HttpOnly' : '');

		header($cookie, false);

		return true;

	}

	else

		return setcookie($name, $value, $expires, $path, $domain, $secure);

}





// #############################################################################

/**

* Browser detection system - returns whether or not the visiting browser is the one specified

*

* @param	string	Browser name (opera, ie, mozilla, firebord, firefox... etc. - see $is array)

* @param	float	Minimum acceptable version for true result (optional)

*

* @return	boolean

*/

function is_browser($browser, $version = 0)

{

	static $is;

	if (!is_array($is))

	{

		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);

		$is = array(

			'opera'     => 0,

			'ie'        => 0,

			'mozilla'   => 0,

			'firebird'  => 0,

			'firefox'   => 0,

			'camino'    => 0,

			'konqueror' => 0,

			'safari'    => 0,

			'webkit'    => 0,

			'webtv'     => 0,

			'netscape'  => 0,

			'mac'       => 0

		);



		// detect opera

			# Opera/7.11 (Windows NT 5.1; U) [en]

			# Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.0) Opera 7.02 Bork-edition [en]

			# Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 4.0) Opera 7.0 [en]

			# Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.0 [en]

			# Mozilla/4.0 (compatible; MSIE 5.0; Mac_PowerPC) Opera 5.0 [en]

		if (strpos($useragent, 'opera') !== false)

		{

			preg_match('#opera(/| )([0-9\.]+)#', $useragent, $regs);

			$is['opera'] = $regs[2];

		}



		// detect internet explorer

			# Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Q312461)

			# Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.0.3705)

			# Mozilla/4.0 (compatible; MSIE 5.22; Mac_PowerPC)

			# Mozilla/4.0 (compatible; MSIE 5.0; Mac_PowerPC; e504460WanadooNL)

		if (strpos($useragent, 'msie ') !== false AND !$is['opera'])

		{

			preg_match('#msie ([0-9\.]+)#', $useragent, $regs);

			$is['ie'] = $regs[1];

		}



		// detect macintosh

		if (strpos($useragent, 'mac') !== false)

		{

			$is['mac'] = 1;

		}



		// detect safari

			# Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-us) AppleWebKit/74 (KHTML, like Gecko) Safari/74

			# Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/51 (like Gecko) Safari/51

			# Mozilla/5.0 (Windows; U; Windows NT 6.0; en) AppleWebKit/522.11.3 (KHTML, like Gecko) Version/3.0 Safari/522.11.3

			# Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1C28 Safari/419.3

			# Mozilla/5.0 (iPod; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3A100a Safari/419.3

		if (strpos($useragent, 'applewebkit') !== false)

		{

			preg_match('#applewebkit/([0-9\.]+)#', $useragent, $regs);

			$is['webkit'] = $regs[1];



			if (strpos($useragent, 'safari') !== false)

			{

				preg_match('#safari/([0-9\.]+)#', $useragent, $regs);

				$is['safari'] = $regs[1];

			}

		}



		// detect konqueror

			# Mozilla/5.0 (compatible; Konqueror/3.1; Linux; X11; i686)

			# Mozilla/5.0 (compatible; Konqueror/3.1; Linux 2.4.19-32mdkenterprise; X11; i686; ar, en_US)

			# Mozilla/5.0 (compatible; Konqueror/2.1.1; X11)

		if (strpos($useragent, 'konqueror') !== false)

		{

			preg_match('#konqueror/([0-9\.-]+)#', $useragent, $regs);

			$is['konqueror'] = $regs[1];

		}



		// detect mozilla

			# Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.4b) Gecko/20030504 Mozilla

			# Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.2a) Gecko/20020910

			# Mozilla/5.0 (X11; U; Linux 2.4.3-20mdk i586; en-US; rv:0.9.1) Gecko/20010611

		if (strpos($useragent, 'gecko') !== false AND !$is['safari'] AND !$is['konqueror'])

		{

			// See bug #26926, this is for Gecko based products without a build

			$is['mozilla'] = 20090105;

			if (preg_match('#gecko/(\d+)#', $useragent, $regs))

			{

				$is['mozilla'] = $regs[1];

			}



			// detect firebird / firefox

				# Mozilla/5.0 (Windows; U; WinNT4.0; en-US; rv:1.3a) Gecko/20021207 Phoenix/0.5

				# Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.4b) Gecko/20030516 Mozilla Firebird/0.6

				# Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.4a) Gecko/20030423 Firebird Browser/0.6

				# Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.6) Gecko/20040206 Firefox/0.8

			if (strpos($useragent, 'firefox') !== false OR strpos($useragent, 'firebird') !== false OR strpos($useragent, 'phoenix') !== false)

			{

				preg_match('#(phoenix|firebird|firefox)( browser)?/([0-9\.]+)#', $useragent, $regs);

				$is['firebird'] = $regs[3];



				if ($regs[1] == 'firefox')

				{

					$is['firefox'] = $regs[3];

				}

			}



			// detect camino

				# Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-US; rv:1.0.1) Gecko/20021104 Chimera/0.6

			if (strpos($useragent, 'chimera') !== false OR strpos($useragent, 'camino') !== false)

			{

				preg_match('#(chimera|camino)/([0-9\.]+)#', $useragent, $regs);

				$is['camino'] = $regs[2];

			}

		}



		// detect web tv

		if (strpos($useragent, 'webtv') !== false)

		{

			preg_match('#webtv/([0-9\.]+)#', $useragent, $regs);

			$is['webtv'] = $regs[1];

		}



		// detect pre-gecko netscape

		if (preg_match('#mozilla/([1-4]{1})\.([0-9]{2}|[1-8]{1})#', $useragent, $regs))

		{

			$is['netscape'] = "$regs[1].$regs[2]";

		}

	}



	// sanitize the incoming browser name

	$browser = strtolower($browser);

	if (substr($browser, 0, 3) == 'is_')

	{

		$browser = substr($browser, 3);

	}



	// return the version number of the detected browser if it is the same as $browser

	if ($is["$browser"])

	{

		// $version was specified - only return version number if detected version is >= to specified $version

		if ($version)

		{

			if ($is["$browser"] >= $version)

			{

				return $is["$browser"];

			}

		}

		else

		{

			return $is["$browser"];

		}

	}



	// if we got this far, we are not the specified browser, or the version number is too low

	return 0;

}



// #############################################################################

/**

* Returns a string where HTML entities have been converted back to their original characters

*

* @param	string	String to be parsed

* @param	boolean	Convert unicode characters back from HTML entities?

*

* @return	string

*/

function unhtmlspecialchars($text, $doUniCode = false)

{

	if ($doUniCode)

		$text = preg_replace('/&#([0-9]+);/esiU', "convert_int_to_utf8('\\1')", $text);

	return str_replace(array('&lt;', '&gt;', '&quot;', '&amp;'), array('<', '>', '"', '&'), $text);

}



// #############################################################################

/**

* Unicode-safe version of htmlspecialchars()

*

* @param	string	Text to be made html-safe

*

* @return	string

*/

function htmlspecialchars_uni($text, $entities = true)

{

	return str_replace(array('<', '>', '"'), array('&lt;', '&gt;', '&quot;'), preg_replace('/&(?!' . ($entities ? '#[0-9]+|shy' : '(#[0-9]+|[a-z]+)') . ';)/si', '&amp;', $text));

}



// #############################################################################

/**

* Performs general clean-up after the system exits, such as running shutdown queries

*/


function exec_shut_down()

{

	global $Process;

    if (defined('EMBEDDED_SCRIPT'))
		return true;
	$Process->db->unlock_tables();
	$Process->db->query("delete from change_password where password_reset_key_date < ".TIMENOW);
	if (!$Process->db->submitted)
		$Process->db->query("update session set form_submitted = '' where userid = ".$Process->userinfo['userid']);
		
	if (is_object($Process->session))

	{

		if ($Process->session->vars['loggedin'] == 1 AND !$Process->session->created)

			$Process->session->set('loggedin', 2);

		$Process->session->save();

	}

	if (is_array($Process->db->shutdownqueries))

	{

		$Process->db->hide_errors();

		foreach($Process->db->shutdownqueries AS $name => $query)

			if (!empty($query) AND ($name !== 'pmpopup' OR !defined('NOPMPOPUP')))

					$Process->db->query_write($query);

		$Process->db->show_errors();

	}

//	exec_mail_queue();
	$Process->db->lock_tables();
	$Process->db->close();

	$Process->db->shutdownqueries = array();
}

function process_template($filename)
{
    global $Process, $show, $extra, $phrase;

    require_once('includes/class/class.template.php');
	require_once('includes/class/class.mobile.detect.php');
	
	$mobile = new Mobile_Detect();

    $Template = new smarty;
	if ($Process->config['misc']['enable_mobile']) 
		$Template->assign('is_mobile', $mobile->isMobile());		
	$Template->assign('path', $Template->template_dir[0]);
 	$Template->assign('path_img', $Template->template_dir[0].'/images');	
	$Template->assign('path_default_templates', $Template->template_dir[0]);
	$Template->assign('path_modules',  CWD.'/includes/modules');	
	$Template->assign('http_modules',  $Process->http['index'].ADD_DIR);		
	$Template->assign('redirect_path', REDIRECT);
	$Template->assign('firstload', empty($_SERVER['HTTP_REFERER']));
  	$Template->assign('userinfo', $Process->userinfo);
   	$Template->assign('is_logged', is_logged());
	$Template->assign('options', $Process->options);
	$Template->assign('scriptpath', $Process->scriptpath);	
	$Template->assign('server', $_SERVER);
	$Template->assign('session', $Process->session->vars);
	$Template->assign('error_msg', $Process->input->error_msg); 
	$Template->assign('phrase', $Process->phrase);
	$Template->assign('self', $_SERVER['PHP_SELF']);
	$Template->assign('file', $filename);
	$Template->assign('show', $show); 
	$Template->assign($extra); 	
	if (isset($extra['is_mobile']) && $extra['is_mobile'] === true && $Process->config['misc']['enable_mobile'])
		define('_IS_MOBILE', '_mobile');
	return $Template;
}

function fetch_template($filename, $lang=false)
{
	global $Process, $phrase;
	if ($lang!==false)
	{
	  $words = $Process->db->query_array("select phrase, name_".$lang." as name from phrases where type = 'phrase'");
	  $Process->phrase = $Process->resort_phrases($words);	  
	} 
    $Template = process_template($filename);	
	
	return $Template->fetch($filename.'.tpl') ;	
}

function Display($filename='', $use_theme = true)
{ 
    exec_shut_down();
	$Template = process_template($filename);
	if (defined('admin_module'))
		!empty($filename) ? $Template->display('admin/mainpage.tpl') : $Template->display('admin.tpl');
	else
	   echo_template($Template);// : $Template->display($filename.'.tpl');
	exit;
}

function echo_template($Template)
{
	$mobile = defined('_IS_MOBILE') ? '_mobile' : '';
	$Template->display('theme'.$mobile.'.tpl');
}



// #############################################################################

/**

* Replaces any non-printing ASCII characters with the specified string.

* This also supports removing Unicode characters automatically when

* the entered value is >255 or starts with a 'u'.

*

* @param	string	Text to be processed

* @param	string	String with which to replace non-printing characters

*

* @return	string

*/

function strip_blank_ascii($text, $replace)

{

	global $Process, $stylevar;

	static $blanks = null;



	if ($blanks === null AND trim($Process->options['blankasciistrip']) != '')

	{

		$blanks = array();



		$charset_unicode = (strtolower($stylevar['charset']) == 'utf-8');



		$raw_blanks = preg_split('#\s+#', $Process->options['blankasciistrip'], -1, PREG_SPLIT_NO_EMPTY);

		foreach ($raw_blanks AS $code_point)

		{

			if ($code_point[0] == 'u')

			{

				// this is a unicode character to remove

				$code_point = intval(substr($code_point, 1));

				$force_unicode = true;

			}

			else

			{

				$code_point = intval($code_point);

				$force_unicode = false;

			}



			if ($code_point > 255 OR $force_unicode OR $charset_unicode)

			{

				// outside ASCII range or forced Unicode, so the chr function wouldn't work anyway

				$blanks[] = '&#' . $code_point . ';';

				$blanks[] = convert_int_to_utf8($code_point);

			}

			else

			{

				$blanks[] = chr($code_point);

			}

		}

	}



	if ($blanks)

	{

		$text = str_replace($blanks, $replace, $text);

	}



	return $text;

}

function retrieve_name($name)
{
  return ucfirst(str_replace(array('-', '_'), ' ', $name));
}

function fetch_permissions($user)
{
	global $Process;

	$permissions = $Process->db->query_first_slave("SELECT * FROM " . TABLE_PREFIX . "usergroup WHERE ".$user['usergroupid']." = id");
	return $permissions;
}

function fetch_users($filter='', $orderby='')
{ 
	global $Process;	
	$filter = !empty($filter) ? " and (".$filter.")" : '';
	$orderby = !empty($orderby) ? ' order by '.$orderby : '';	
    return $Process->db->query_array(
	"SELECT 
		u.*, ugrp.name as name_usergroup, ugrp.usertitle as usertitle, sx.name_en as name_sex, lang.id as lang_code, lang.title as lang_title, lang.charset as lang_charset, stat.name_en as name_status, count.name_en as name_country, timez.name_en as name_timezone, FROM_UNIXTIME(u.date_join, '%W, %M %e, %Y @ %h:%i %p') as date_join, FROM_UNIXTIME(u.dob, '%M %Y') as dob
	 FROM 
	 	".TABLE_PREFIX ."user u, 
		".TABLE_PREFIX ."usergroup ugrp, 
		".TABLE_PREFIX ."sex sx,
		".TABLE_PREFIX ."status stat,
		".TABLE_PREFIX ."countries count,
		".TABLE_PREFIX ."timezone timez,
		".TABLE_PREFIX ."language lang
	 WHERE
	 	u.usergroupid = ugrp.id and 
		u.sex = sx.id and
		u.status = stat.id and
		u.country = count.id and
		u.timezone = timez.id and
		u.language_id = lang.id ".$filter." ".$orderby);	
}

/*
* @param	integer	(ref) User ID
* @param	integer	Bitfield Option (see description)
*
* @return	array	The information for the requested user
*/
function fetch_userinfo(&$userid, $option = 0, $languageid = 0)
{

	global $Process, $language_id;
	$email = $userid;
	$userid = intval($userid);
	$user = $Process->db->query_first_slave("	SELECT * FROM " . TABLE_PREFIX . "user WHERE user.userid = ".$userid." or email = '".$email."'");
	if (!$user)
		return false;
	$user['language_id'] = (!empty($user['language_id'])) ? $user['language_id'] : $language_id;
	// make a username variable that is safe to pass through URL links
	$user['urlusername'] = urlencode(unhtmlspecialchars($user['username']));
	$user['securitytoken_raw'] = sha1($user['userid'] . sha1($user['salt']) . sha1(COOKIE_SALT));
	$user['securitytoken'] = TIMENOW . '-' . sha1(TIMENOW . $user['securitytoken_raw']);
	$user['logouthash'] =& $user['securitytoken'];
	$user['permissions'] = fetch_permissions($user);
	$usercache["$userid"] = $user;
	return $usercache["$userid"];

}



// #############################################################################

/**

* Formats a UNIX timestamp into a human-readable string according to vBulletin prefs

*

* Note: Ifvbdate() is called with a date format other than than one in $vbulletin->options[],

* set $locale to false unless you dynamically set the date() and strftime() formats in the vbdate() call.

*

* @param	string	Date format string (same syntax as PHP's date() function)

* @param	integer	Unix time stamp

* @param	boolean	If true, attempt to show strings like "Yesterday, 12pm" instead of full date string

* @param	boolean	If true, and user has a language locale, use strftime() to generate language specific dates

* @param	boolean	If true, don't adjust time to user's adjusted time .. (think gmdate instead of date!)

* @param	boolean	If true, uses gmstrftime() and gmdate() instead of strftime() and date()

* @param array    If set, use specified info instead of $vbulletin->userinfo

*

* @return	string	Formatted date string

*/

function vbdate($format, $timestamp = TIMENOW, $doyestoday = false, $locale = true, $adjust = true, $gmdate = false, $userinfo = '')

{

	global $vbulletin, $vbphrase;

	$uselocale = false;



	if (is_array($userinfo) AND !empty($userinfo))

	{

		if ($userinfo['lang_locale'])

		{

			$uselocale = true;

			$currentlocale = setlocale(LC_TIME, 0);

			setlocale(LC_TIME, $userinfo['lang_locale']);

			if (substr($userinfo['lang_locale'], 0, 5) != 'tr_TR')

			{

				setlocale(LC_CTYPE, $userinfo['lang_locale']);

			}

		}

		if ($userinfo['dstonoff'])

		{

			// DST is on, add an hour

			$userinfo['timezoneoffset']++;

			if (substr($userinfo['timezoneoffset'], 0, 1) != '-')

			{

				// recorrect so that it has a + sign, if necessary

				$userinfo['timezoneoffset'] = '+' . $userinfo['timezoneoffset'];

			}

		}

		$hourdiff = (date('Z', TIMENOW) / 3600 - $userinfo['timezoneoffset']) * 3600;

	}

	else

	{

		$hourdiff = $vbulletin->options['hourdiff'];

		if ($vbulletin->userinfo['lang_locale'])

		{

			$uselocale = true;

		}

	}



	if ($uselocale AND $locale)

	{

		if ($gmdate)

		{

			$datefunc = 'gmstrftime';

		}

		else

		{

			$datefunc = 'strftime';

		}

	}

	else

	{

		if ($gmdate)

		{

			$datefunc = 'gmdate';

		}

		else

		{

			$datefunc = 'date';

		}

	}

	if (!$adjust)

	{

		$hourdiff = 0;

	}

	$timestamp_adjusted = max(0, $timestamp - $hourdiff);



	if ($format == $vbulletin->options['dateformat'] AND $doyestoday AND $vbulletin->options['yestoday'])

	{

		if ($vbulletin->options['yestoday'] == 1)

		{

			if (!defined('TODAYDATE'))

			{

				define ('TODAYDATE', vbdate('n-j-Y', TIMENOW, false, false));

				define ('YESTDATE', vbdate('n-j-Y', TIMENOW - 86400, false, false));

				define ('TOMDATE', vbdate('n-j-Y', TIMENOW + 86400, false, false));

			}



			$datetest = @date('n-j-Y', $timestamp - $hourdiff);



			if ($datetest == TODAYDATE)

			{

				$returndate = $vbphrase['today'];

			}

			else if ($datetest == YESTDATE)

			{

				$returndate = $vbphrase['yesterday'];

			}

			else

			{

				$returndate = $datefunc($format, $timestamp_adjusted);

			}

		}

		else

		{

			$timediff = TIMENOW - $timestamp;



			if ($timediff >= 0)

			{

				if ($timediff < 120)

				{

					$returndate = $vbphrase['1_minute_ago'];

				}

				else if ($timediff < 3600)

				{

					$returndate = construct_phrase($vbphrase['x_minutes_ago'], intval($timediff / 60));

				}

				else if ($timediff < 7200)

				{

					$returndate = $vbphrase['1_hour_ago'];

				}

				else if ($timediff < 86400)

				{

					$returndate = construct_phrase($vbphrase['x_hours_ago'], intval($timediff / 3600));

				}

				else if ($timediff < 172800)

				{

					$returndate = $vbphrase['1_day_ago'];

				}

				else if ($timediff < 604800)

				{

					$returndate = construct_phrase($vbphrase['x_days_ago'], intval($timediff / 86400));

				}

				else if ($timediff < 1209600)

				{

					$returndate = $vbphrase['1_week_ago'];

				}

				else if ($timediff < 3024000)

				{

					$returndate = construct_phrase($vbphrase['x_weeks_ago'], intval($timediff / 604900));

				}

				else

				{

					$returndate = $datefunc($format, $timestamp_adjusted);

				}

			}

			else

			{

				$returndate = $datefunc($format, $timestamp_adjusted);

			}

		}

	}

	else

	{

		$returndate = $datefunc($format, $timestamp_adjusted);

	}



	if (!empty($userinfo['lang_locale']))

	{

		setlocale(LC_TIME, $currentlocale);

		if (substr($currentlocale, 0, 5) != 'tr_TR')

		{

			setlocale(LC_CTYPE, $currentlocale);

		}

	}

	return $returndate;

}



?>