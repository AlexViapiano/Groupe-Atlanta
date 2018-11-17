<?php

class Session
{
	var $vars = array();
	var $db_fields = array(
		'sessionhash'   => TYPE_STR,
		'userid'        => TYPE_INT,
		'host'          => TYPE_STR,
		'idhash'        => TYPE_STR,
		'lastactivity'  => TYPE_INT,
		'language_id'    => TYPE_STR,
		'loggedin'      => TYPE_INT,
		'bypass'        => TYPE_INT
	);

	var $changes = array();
	var $created = false;
	var $registry = null;
	var $userinfo = null;
	var $visible = true;

	function Session(&$registry, $sessionhash = '', $userid = 0, $password = '', $styleid = 0, $languageid = 'en')
	{ 
		global $extra;
		$userid = intval($userid);
		$styleid = intval($styleid);
		$this->registry =& $registry;
		$db =& $this->registry->db;
		$gotsession = false;

		if (!defined('SESSION_IDHASH'))
			define('SESSION_IDHASH', md5($_SERVER['HTTP_USER_AGENT'] . $this->fetch_substr_ip($registry->alt_ip))); // this should *never* change during a session
		if ($sessionhash AND !defined('SKIP_SESSIONCREATE'))
		{
			if ($session = $db->query_first_slave("
				SELECT *
				FROM " . TABLE_PREFIX . "session
				WHERE sessionhash = '" . $db->escape_string($sessionhash) . "'
					AND lastactivity > " . (TIMENOW - $registry->options['cookietimeout']) . "
					AND idhash = '" . $this->registry->db->escape_string(SESSION_IDHASH) . "'
			") AND $this->fetch_substr_ip($session['host']) == $this->fetch_substr_ip(SESSION_HOST))
			{
				$gotsession = true;
				$this->vars =& $session;
				$this->created = false;
				if ($session['userid'] != 0)
				{ 
					$useroptions = (defined('IN_CONTROL_PANEL') ? 16 : 0) + (defined('AVATAR_ON_NAVBAR') ? 2 : 0);
					$userinfo = fetch_userinfo($session['userid'], $useroptions, (!empty($languageid) ? $languageid : $session['language_id']));
					$this->userinfo =& $userinfo;
				}
			}
		}
		if (($gotsession == false OR empty($session['userid'])) AND $userid AND $password AND !defined('SKIP_SESSIONCREATE'))
		{
			$useroptions = (defined('IN_CONTROL_PANEL') ? FETCH_USERINFO_ADMIN : 0) + (defined('AVATAR_ON_NAVBAR') ? FETCH_USERINFO_AVATAR : 0);
			$userinfo = fetch_userinfo($userid, $useroptions, $languageid);
			if (md5($userinfo['password'] . COOKIE_SALT) == $password)
			{
				$gotsession = true;
				if (!empty($session['sessionhash']))
				{
					$db->shutdown_query("
						DELETE FROM " . TABLE_PREFIX . "session
						WHERE sessionhash = '" . $this->registry->db->escape_string($session['sessionhash']). "'
					");
				}
				$this->vars = $this->fetch_session($userinfo['userid']);
				$this->created = true;
				$this->userinfo =& $userinfo;
			}
		}
		if ($gotsession == false AND $userid == 0 AND !defined('SKIP_SESSIONCREATE'))
		{
			if ($session = $db->query_first_slave("
				SELECT *
				FROM " . TABLE_PREFIX . "session
				WHERE userid = 0
					AND host = '" . $this->registry->db->escape_string(SESSION_HOST) . "'
					AND idhash = '" . $this->registry->db->escape_string(SESSION_IDHASH) . "'
				LIMIT 1
			"))
			{
				$gotsession = true;
				$this->vars =& $session;
				$this->created = false;
			}
		}
		if ($gotsession == false)
		{ 
			$gotsession = true;
			$this->vars = $this->fetch_session(0);
			$this->created = true;
		}
        define('REDIRECT', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
		$this->vars['dbsessionhash'] = $this->vars['sessionhash'];
		$this->set('styleid', $styleid);
		$this->set('language_id', $languageid);
		if ($this->created == false)
		{
			$this->set('useragent', USER_AGENT);
			$this->set('lastactivity', TIMENOW);
			if (!defined('LOCATION_BYPASS'))
				$this->set('location', WOLPATH);
			$this->set('bypass', SESSION_BYPASS);
		} 
		$this->vars['visitors'] = $db->query_first_slave("SELECT count(*) as online FROM " . TABLE_PREFIX . "session WHERE userid = 0");
		$this->vars['registered'] = $db->query_first_slave("SELECT count(*) as online FROM " . TABLE_PREFIX . "session WHERE userid != 0");
		$this->vars['total_registered'] = $db->query_first_slave("SELECT count(*) as online FROM " . TABLE_PREFIX . "user");
		if (count($this->vars['registered']['online'] > 0))
		  {
			 $users = array();
			 $Temp = $db->query_array("select u.username from user u, session s where s.userid != 0 and u.userid = s.userid");
			 $this->vars['members_online'] = count($Temp) > 0;
			 for ($i=0; $i<count($Temp); $i++)
				 $users[] = $Temp[$i]['username'];
			 $this->vars['members_names_online'] = implode(", ", $users);
		  }
	}

	function save()
	{
		$cleaned = $this->build_query_array();
		$cleaned['sessionhash'] = "'" . $this->registry->db->escape_string($this->vars['dbsessionhash']) . "'";
		if ($this->created == true)
		{ 
			$this->registry->db->query_write("
				INSERT IGNORE INTO " . TABLE_PREFIX . "session
					(" . implode(', ', array_keys($cleaned)) . ")
				VALUES
					(" . implode(', ', $cleaned) . ")
			");
		}
		else
		{
			unset($this->changes['sessionhash']); // the sessionhash is not updateable
			$update = array();
			foreach ($cleaned AS $key => $value)
			{
				if (!empty($this->changes["$key"]))
					$update[] = "$key = $value";
			}

			if (sizeof($update) > 0)
			{
				$this->registry->db->query_write("
					UPDATE " . TABLE_PREFIX . "session
					SET " . implode(', ', $update) . "
					WHERE sessionhash = $cleaned[sessionhash]
				");
			}
		}
		$this->changes = array();
	}

	function build_query_array()
	{
		$return = array();
		foreach ($this->db_fields AS $fieldname => $cleantype)
		{
			switch ($cleantype)
			{
				case TYPE_INT:
					$cleaned = intval($this->vars["$fieldname"]);
					break;
				case TYPE_STR:
				default:
					$cleaned = "'" . $this->registry->db->escape_string($this->vars["$fieldname"]) . "'";
			}
			$return["$fieldname"] = $cleaned;
		}
		return $return;
	}

	function set($key, $value, $force=false)
	{
		if (!isset($this->vars["$key"]) OR $this->vars["$key"] != $value OR $force)
		{
			$this->vars["$key"] = $value;
			$this->changes["$key"] = true;
		}
	}

	function set_session_visibility($invisible)
	{
		$this->visible = !$invisible;
		if ($invisible)
		{
			$this->vars['sessionhash'] = '';
			$this->vars['sessionurl'] = '';
			$this->vars['sessionurl_q'] = '';
			$this->vars['sessionurl_js'] = '';
		}
		else
		{
			$this->vars['sessionurl'] = 's=' . $this->vars['dbsessionhash'] . '&amp;';
			$this->vars['sessionurl_q'] = '?s=' . $this->vars['dbsessionhash'];
			$this->vars['sessionurl_js'] = 's=' . $this->vars['dbsessionhash'] . '&';
		}
	}

	function fetch_sessionhash()
	{
		return md5(uniqid(microtime(), true));
	}


	function fetch_substr_ip($ip, $length = null)
	{
		if ($length === null OR $length > 3)
		{
			$length = isset($this->registry->options['ipcheck']) ? $this->registry->options['ipcheck'] : 10;
		}
		return implode('.', array_slice(explode('.', $ip), 0, 4 - $length));
	}

	function fetch_session($userid = 0)
	{
		$sessionhash = $this->fetch_sessionhash();
		set_cookie('sessionhash', $sessionhash, false, false, true);
		return array(
			'sessionhash'   => $sessionhash,
			'dbsessionhash' => $sessionhash,
			'userid'        => intval($userid),
			'host'          => SESSION_HOST,
			'idhash'        => SESSION_IDHASH,
			'lastactivity'  => TIMENOW,
			'location'      => defined('LOCATION_BYPASS') ? '' : WOLPATH,
			'styleid'       => 0,
			'language_id'    => 'fr',
			'loggedin'      => intval($userid) ? 1 : 0,
			'inforum'       => 0,
			'inthread'      => 0,
			'incalendar'    => 0,
			'badlocation'   => 0,
			'profileupdate' => 0,
			'useragent'     => USER_AGENT,
			'bypass'        => SESSION_BYPASS
		);
	}

	function &fetch_userinfo()
	{
		if ($this->userinfo)
			return $this->userinfo;
		else if ($this->vars['userid'] AND !defined('SKIP_USERINFO'))
		{
			$this->userinfo = fetch_userinfo($this->vars['userid'], $useroptions, $this->vars['language_id']);
			return $this->userinfo;
		}
		else
		{
			$this->userinfo = array(
				'userid'         => 0,
				'usergroupid'    => 1,
				'username'       => (!empty($_REQUEST['username']) ? htmlspecialchars_uni($_REQUEST['username']) : ''),
				'password'       => '',
				'email'          => '',
				'styleid'        => $this->vars['styleid'],
				'language_id'     => $this->vars['language_id'],
				'lastactivity'   => $this->vars['lastactivity'],
				'daysprune'      => 0,
				'timezoneoffset' => isset($this->registry->options['timeoffset']) ? $this->registry->options['timeoffset'] : 0, 
				'timezone'		 => isset($this->registry->options['default_timezone']) ? $this->registry->options['default_timezone'] : -5, 
				'dstonoff'       => isset($this->registry->options['dstonoff']) ? $this->registry->options['dstonoff'] : 0,
				'showsignatures' => 1,
				'showavatars'    => 1,
				'showimages'     => 1,
				'showusercss'    => 1,
				'dstauto'        => 0,
				'maxposts'       => -1,
				'group_id'		 => 0,
				'startofweek'    => 1,
				'threadedmode'   => isset($this->registry->options['threadedmode']) ? $this->registry->options['threadedmode'] : 0,
				'securitytoken'  => 'guest',
				'securitytoken_raw'  => 'guest'
			);

			$this->userinfo['permissions'] = fetch_permissions($this->userinfo);
			return $this->userinfo;
		}
	}

	function do_lastvisit_update($lastvisit = 0, $lastactivity = 0)
	{
		if ($this->vars['userid'] == 0)
		{
			if ($lastvisit)
			{
				$this->userinfo['lastvisit'] = intval($lastvisit);
				$this->userinfo['lastactivity'] = ($lastvisit ? intval($lastvisit) : TIMENOW);
				if (TIMENOW - $this->userinfo['lastactivity'] > $this->registry->options['cookietimeout'])
				{
					$this->userinfo['lastvisit'] = $this->userinfo['lastactivity'];
					set_cookie('lastvisit', $this->userinfo['lastactivity']);
				}
			}
			else
			{
				$this->userinfo['lastactivity'] = TIMENOW;
				$this->userinfo['lastvisit'] = TIMENOW;
				set_cookie('lastvisit', TIMENOW);
			}
			set_cookie('lastactivity', $lastactivity);
		}
		else
		{
			if (!SESSION_BYPASS)
			{
				if (TIMENOW - $this->userinfo['lastactivity'] > $this->registry->options['cookietimeout'])
				{
					$this->registry->db->shutdown_query("
						UPDATE " . TABLE_PREFIX . "user
						SET
							lastvisit = lastactivity,
							lastactivity = " . TIMENOW . "
						WHERE userid = " . $this->userinfo['userid'] . "
					", 'lastvisit');
				}
				else
				{
					$this->registry->db->shutdown_query("
						UPDATE " . TABLE_PREFIX . "user
						SET lastactivity = " . TIMENOW . "
						WHERE userid = " . $this->userinfo['userid'] . "
					", 'lastvisit');
				}
			}
		}
		$this->registry->db->shutdown_query("delete from " . TABLE_PREFIX . "session where lastactivity < ".(TIMENOW - $this->registry->options['cookietimeout']));								
	}


}



?>