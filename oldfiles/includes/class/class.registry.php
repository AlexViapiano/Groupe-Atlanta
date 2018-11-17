<?php

class Registry
{

	var $input;
	var $db;
	var $ibase;
	var $userinfo;
	var $session;
	var $options = array();
	var $csrf_skip_list = array();
	var $config;
	var $GPC = array();
	var $GPC_exists = array();
	var $superglobal_size = array();
	var $ipaddress;
	var $alt_ip;
	var $scriptpath;
	var $wolpath;
	var $script;
	var $url;
    var $noheader;
	var $shutdown;
	var $current_vars = '';	

	function Registry()
	{
	    require_once('class.clean_input.php');
		require_once('class.shutdown.php');
			
		$this->noheader = defined('NOHEADER') ? true : false;
		$this->input = new Input_Cleaner($this);
		$this->shutdown = Shutdown::init();
		$this->csrf_skip_list = (defined('CSRF_SKIP_LIST') ? explode(',', CSRF_SKIP_LIST) : array());
	}

	function fetch_config()
	{
		$config = array();
		include(CWD . '/includes/config.php');

		if (sizeof($config) == 0)
		{
			if (file_exists(CWD. '/includes/config.php'))
				die('<br /><br /><strong>Configuration</strong>: includes/config.php exists, but is not in the 3.6+ format. Please convert your config file via the new config.php.new.');
			else
				die('<br /><br /><strong>Configuration</strong>: includes/config.php does not exist. Please fill out the data in config.php.new and rename it to config.php');
		}

		$this->config =& $config;
		if (isset($this->config["$_SERVER[HTTP_HOST]"]))
			$this->config['MasterServer'] = $this->config["$_SERVER[HTTP_HOST]"];
		define('TABLE_PREFIX', trim($this->config['Database']['tableprefix']));
		define('COOKIE_PREFIX', (empty($this->config['Misc']['cookieprefix']) ? 'bb' : $this->config['Misc']['cookieprefix']));
	}
	
	function resort_phrases($phrases=array())
	{ 
	  $new_phrases = array();	
	  for ($i=0; $i<count($phrases); $i++)
		  $new_phrases[$phrases[$i]['phrase']] = $phrases[$i]['name']; 
	  return $new_phrases;
	}
	
	function load_phrases($lang)
	{
	   $phrases_type = array('phrase', 'error_msg', 'notify');
	   foreach ($phrases_type as $phrase)
		 {
			$words = $this->db->query_array("select phrase, name_".$lang." as name from phrases where type = '".$phrase."'");
			$this->$phrase = $this->resort_phrases($words);	   
		 }
//	   if (defined('admin_module'))
	      {
	   	     $phrases_admin_type = array('admin_error_msg', 'admin_notify');
			 foreach ($phrases_admin_type as $phrase)
			 { 
				$words = $this->db->query_array("select phrase, name_".$lang." as name from phrases where type = '".$phrase."'");
				$this->$phrase = $this->resort_phrases($words);
			 }
		  }
	}
	
	function resort_bykey($data, $key)
	{
	  $new_data = array();	
	  for ($i=0; $i<count($data); $i++)
		  $new_data[$data[$i][$key]] = $data[$i]; 
	  return $new_data;
		
	}

	function load_email_templates($lang)
	{
		$emails = $this->db->query_array("select type, subject_".$lang." as subject, message_".$lang." as message from email_templates");
		$this->email_msg = $this->resort_bykey($emails, 'type');	   
	}
	
    function fetch_settings(&$languageid)
	{ 
		$dataitems = $this->db->query_read("SELECT * FROM " . TABLE_PREFIX . "settings where title='settings'");
		while ($dataitem = $this->db->fetch_array($dataitems))
		  if ($dataitem['unserialize'])
		  	 $this->options = $dataitem['unserialize'] ? unserialize($dataitem['data']) : $dataitem['data'];
	    $languageid = empty($languageid) ? $this->options['default_language'] : $languageid;	
		$this->load_email_templates($languageid);
		$this->load_phrases($languageid);
		set_lang_settings($languageid);
		$this->options['cookiepath'] = "/";
		$this->options['cookiedomain'] = "";
		$this->options['website_link'] = $this->config['website_link'];	
		$this->options['encoding'] = $this->config['misc']['encoding'];		
	}
	
	function array_define($array)
	{
		foreach ($array AS $title => $data)
		{
			if (is_array($data))
			{
				Registry::array_define($data);
			}
			else
			{
				define(strtoupper($title), $data);
			}
		}
	}
}


?>