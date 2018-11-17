<?php /*
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', '/usr/local/apache/logs/error_log');*/
error_reporting(0);

if (!defined('THIS_SCRIPT'))
{
	echo 'THIS_SCRIPT must be defined to continue';
	exit;
}

if (isset($_REQUEST['GLOBALS']) OR isset($_FILES['GLOBALS']))
{
	echo 'Request tainting attempted.';
	exit;
}

if (!isset($_SERVER['DOCUMENT_ROOT'])) { 
	if (isset($_SERVER['SCRIPT_FILENAME'])) {
		$_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr($_SERVER['SCRIPT_FILENAME'], 0, 0 - strlen($_SERVER['PHP_SELF'])));
	}
}

if (!isset($_SERVER['DOCUMENT_ROOT'])) {
	if (isset($_SERVER['PATH_TRANSLATED'])) {
		$_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr(str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']), 0, 0 - strlen($_SERVER['PHP_SELF'])));
	}
}

if (!isset($_SERVER['REQUEST_URI'])) { 
	$_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1); 
	
	if (isset($_SERVER['QUERY_STRING'])) { 
		$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING']; 
	} 
}

date_default_timezone_set('Canada/Eastern');

define('COOKIE_SALT', '#)@');
@ini_set('pcre.backtrack_limit', -1);
define('TIMENOW', time());
if (!defined('CWD'))
	define('CWD', (($getcwd = getcwd()) ? str_replace('\\', '/', $getcwd) : '.'));

require_once('class/class.pages.php');
require_once('class/class.database.php');
require_once('class/class.registry.php');
require_once('class/class.session.php');
require_once('class/class.document.php');
require_once('functions/functions.php');

$pages = new _pages;

$Process = new Registry();
$Process->fetch_config();

switch (strtolower($Process->config['Database']['dbtype']))
{
	case 'mysql':
	case '':
			$db = new Database($Process);
		break;

	case 'mysqli':
			$db = new Database_MySQLi($Process);
		break;

	default:
		die('Fatal error: Database class not found');
}

$db->connect(
	$Process->config['Database']['dbname'],
	$Process->config['MasterServer']['servername'],
	$Process->config['MasterServer']['port'],
	$Process->config['MasterServer']['username'],
	$Process->config['MasterServer']['password'],
	$Process->config['MasterServer']['usepconnect'],
	$Process->config['SlaveServer']['servername'],
	$Process->config['SlaveServer']['port'],
	$Process->config['SlaveServer']['username'],
	$Process->config['SlaveServer']['password'],
	$Process->config['SlaveServer']['usepconnect']
);

$Process->db =& $db;
$Process->url =& $Process->input->fetch_url();

$Process->input->clean_array_gpc('c', array(
	COOKIE_PREFIX . 'userid'       => TYPE_UINT,
	COOKIE_PREFIX . 'password'     => TYPE_STR,
	COOKIE_PREFIX . 'lastvisit'    => TYPE_UINT,
	COOKIE_PREFIX . 'lastactivity' => TYPE_UINT,
	COOKIE_PREFIX . 'sessionhash'  => TYPE_NOHTML,
	COOKIE_PREFIX . 'language_id'   => TYPE_STR,
)); 

$Process->input->clean_array_gpc('r', array(
	's'       => TYPE_NOHTML,
	'styleid' => TYPE_INT,
	'lang'  => TYPE_STR,
));

if (lang_found($Process->GPC['lang']))
	$languageid = $Process->GPC['lang'];
else 
{
  if (lang_found($Process->GPC[COOKIE_PREFIX . 'language_id']))
	    $languageid = $Process->GPC[COOKIE_PREFIX . 'language_id'];
  else
	  $languageid = $Process->config['default_language'];
}

$set_language = query_first("select * from language where id = '".$languageid."'");
setlocale (LC_TIME, $set_language['id'].'_'.strtoupper($set_language['id']).'.'.$Process->config['encoding'], $set_language['langset']); 
$extra['encoding'] = $Process->config['encoding'];

if (defined('admin_module'))
	$languageid = 'en';

$Process->fetch_settings($languageid);
set_cookie('language_id', $languageid);
/*
echo $languageid;
echo_array($Process->GPC);*/
if ($Process->options['cookietimeout'] < 60)
	$Process->options['cookietimeout'] = 60;
		
$http = REQ_PROTOCOL.'://';

$Process->http = $http.$Process->options['website_link'];
$Process->options['website_link'] = $Process->http;
define('_ROOT_URL', $Process->http.ADD_DIR);
$extra['_ROOT_URL'] = _ROOT_URL.'/';

$styleid = 0;
$show['search_engine'] = ($Process->superglobal_size['_COOKIE'] == 0 AND preg_match("#(google|msnbot|yahoo! slurp)#si", $_SERVER['HTTP_USER_AGENT']));
$sessionhash = (!empty($Process->GPC['s']) ? $Process->GPC['s'] : $Process->GPC[COOKIE_PREFIX . 'sessionhash']); // override cookie
$Process->session = new Session($Process, $sessionhash, $Process->GPC[COOKIE_PREFIX . 'userid'], $Process->GPC[COOKIE_PREFIX . 'password'], $styleid, $languageid);
$languageid = $Process->session->vars['language_id'];
$Process->session->set_session_visibility($show['search_engine'] OR $Process->superglobal_size['_COOKIE'] > 0);
$Process->userinfo =& $Process->session->fetch_userinfo();
$Process->session->do_lastvisit_update($Process->GPC[COOKIE_PREFIX . 'lastvisit'], $Process->GPC[COOKIE_PREFIX . 'lastactivity']);
//echo $Process->session->vars['language_id'].' '.$languageid.' -  sadas';
/*
if ($Process->userinfo['permissions']['canviewcp'])
	$languageid = 'en';*/
	
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
{
	if ($Process->userinfo['userid'] > 0 AND defined('CSRF_PROTECTION') AND CSRF_PROTECTION === true)
	{
		$Process->input->clean_array_gpc('p', array('securitytoken' => TYPE_STR,));
		if (!in_array($_POST['do'], $Process->csrf_skip_list))
			if (!verify_security_token($Process->GPC['securitytoken'], $Process->userinfo['securitytoken_raw']))
				switch ($Process->GPC['securitytoken'])
				{
					case '':
						define('CSRF_ERROR', 'missing');
						break;
					case 'guest':
						define('CSRF_ERROR', 'guest');
						break;
					case 'timeout':
						define('CSRF_ERROR', 'timeout');
						break;
					default:
						define('CSRF_ERROR', 'invalid');
				}
	}
	else if (!defined('CSRF_PROTECTION') AND !defined('SKIP_REFERRER_CHECK'))
	{
		if ($_SERVER['HTTP_HOST'] OR $_ENV['HTTP_HOST'])
			$http_host = ($_SERVER['HTTP_HOST'] ? $_SERVER['HTTP_HOST'] : $_ENV['HTTP_HOST']);
		else if ($_SERVER['SERVER_NAME'] OR $_ENV['SERVER_NAME'])
			$http_host = ($_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : $_ENV['SERVER_NAME']);
		if ($http_host AND $_SERVER['HTTP_REFERER'])
		{
			$http_host = preg_replace('#:80$#', '', trim($http_host));
			$referrer_parts = @parse_url($_SERVER['HTTP_REFERER']);
			$ref_port = intval($referrer_parts['port']);
			$ref_host = $referrer_parts['host'] . ((!empty($ref_port) AND $ref_port != '80') ? ":$ref_port" : '');
			$allowed = preg_split('#\s+#', $Process->options['allowedreferrers'], -1, PREG_SPLIT_NO_EMPTY);
			$allowed[] = preg_replace('#^www\.#i', '', $http_host);
			$allowed[] = '.paypal.com';
			$pass_ref_check = false;
			foreach ($allowed AS $host)
			{
				if (preg_match('#' . preg_quote($host, '#') . '$#siU', $ref_host))
				{
					$pass_ref_check = true;
					break;
				}
			}
			unset($allowed);
			if ($pass_ref_check == false)
				die('In order to accept POST request originating from this domain, the admin must add this domain to the whitelist.');
		}
	}
}

define('SAPI_NAME', php_sapi_name());

if ($Process->userinfo['userid'] > 0 AND isset($_SERVER['HTTP_X_MOZ']) AND strpos($_SERVER['HTTP_X_MOZ'], 'prefetch') !== false)
{
	if (SAPI_NAME == 'cgi' OR SAPI_NAME == 'cgi-fcgi')
		header('Status: 403 Forbidden');
	else
		header('HTTP/1.1 403 Forbidden');
	die('Prefetching is not allowed due to the various privacy issues that arise.');
}

$old_explorer = (is_browser('ie') AND !is_browser('ie', 6));

/*
if ($Process->userinfo['lastvisit'])
	$Process->userinfo['lastvisitdate'] = vbdate($Process->options['dateformat'] . ' ' . $Process->options['timeformat'], $Process->userinfo['lastvisit']);
else
	$Process->userinfo['lastvisitdate'] = -1;
*/
if (defined('CSRF_ERROR'))
{
	switch (CSRF_ERROR)
	{
		case 'missing':
			die('missing token');
			break;

		case 'guest':
			die('guest token');
			break;

		case 'timeout':
			die('timeout token');
			break;

		case 'invalid':
		default:
			die('invalid token');
	}
	exit;
}
/*
$loggedout = false;
if (THIS_SCRIPT == 'login' AND $_REQUEST['do'] == 'logout' AND $Process->userinfo['userid'] != 0)
{
	$Process->input->clean_gpc('r', 'logouthash', TYPE_STR);
	if (verify_security_token($Process->GPC['logouthash'], $Process->userinfo['securitytoken_raw']))
		$loggedout = true;
}

*/
if ($Process->session->vars['form_submitted'])
   {
	  $extra['popup'] = array('msg'	=> $Process->session->vars['form_submitted']);
	  $extra['form_submitted'] = $Process->session->vars['form_submitted'];
   }

define('_DEFAULT_LANG', $Process->config['default_language']);
$extra['online_visitors'] = fetch_online_users();
$extra['default_lang'] = query_first("select * from language where id = '".$Process->options['default_language']."'");
$extra['language'] = $set_language;
$normalizeChars = get_normalizeChars();
$extra['add_dir'] = ADD_DIR;
$languages = fetch_languages();
$extra['multilingual'] = count($languages) > 1;
$extra['http'] = $http;
$extra['languages'] = $languages;
$extra['languages_found'] = count($languages);
$extra['token'] = "<input type='hidden' name='securitytoken' value='".$Process->userinfo['securitytoken']."' />";
$extra['getcwd'] = CWD;
$extra['this_script'] = THIS_SCRIPT;
$extra['header'] = 'header_'.$languageid;
$extra['name'] = 'name_'.$languageid;
$extra['desc'] = 'desc_'.$languageid;
$extra['title'] = 'title_'.$languageid;
$extra['path'] = 'path_'.$languageid;
$extra['page_title'] = 'page_title_'.$languageid;
$extra['meta_keywords'] = 'meta_keywords_'.$languageid;
$extra['meta_descriptions'] = 'meta_descriptions_'.$languageid;
$extra['intro'] = 'intro_'.$languageid;
$extra['body'] = 'body_'.$languageid;
$extra['seo_url'] = 'seo_url_'.$languageid;
$extra['link'] = 'link_'.$languageid;
$extra['date_today'] =  date("Y/m/d");
$extra['current_language'] = $languageid;
$extra['disconnect'] = $Process->config['disconnect'];
$extra['timeout_min'] = $Process->config['timeout_min'];
$extra['language_select'] = form_select('lang', $languages, 'title', isset($_GET['lang']) ? $_GET['lang'] : $languageid, 'select', false, 'this.form.submit()');
$change_lang = $languageid == 'fr' ? 'en' : 'fr';
$change_lang_name = $languageid == 'fr' ? 'English' : 'Fran&ccedil;ais';
$extra['change_lang_name'] = $change_lang_name;
$page_url = isset($_GET['lang']) ? str_replace('?lang='.$_GET['lang'], '', $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI'];
$extra['lang_change_link'] = $change_lang;
$Process->scriptpath = $Process->http.$Process->scriptpath;
$extra['is_admin'] = $Process->userinfo['permissions']['canviewcp'];
if ($extra['is_admin'])
    require('includes/functions/functions_cms.php');
define('MODULE_PATH', CWD.'/includes/modules/'); 

$Process->maintenance = fetch_settings('maintenance');
?>