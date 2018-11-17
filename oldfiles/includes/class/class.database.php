<?php

define('DBARRAY_BOTH',  0);
define('DBARRAY_ASSOC', 1);
define('DBARRAY_NUM',   2);

class Database
{
	var $functions = array(
		'connect'            => 'mysql_connect',
		'pconnect'           => 'mysql_pconnect',
		'select_db'          => 'mysql_select_db',
		'query'              => 'mysql_query',
		'query_unbuffered'   => 'mysql_unbuffered_query',
		'fetch_row'          => 'mysql_fetch_row',
		'fetch_array'        => 'mysql_fetch_array',
		'fetch_field'        => 'mysql_fetch_field',
		'free_result'        => 'mysql_free_result',
		'fetch_assoc'		 => 'mysql_fetch_assoc',
		'data_seek'          => 'mysql_data_seek',
		'error'              => 'mysql_error',
		'errno'              => 'mysql_errno',
		'affected_rows'      => 'mysql_affected_rows',
		'sql_info'		     => 'msyql_info',		
		'num_rows'           => 'mysql_num_rows',
		'num_fields'         => 'mysql_num_fields',
		'field_name'         => 'mysql_field_name',
		'insert_id'          => 'mysql_insert_id',
		'escape_string'      => 'mysql_escape_string',
		'real_escape_string' => 'mysql_real_escape_string',
		'close'              => 'mysql_close',
		'client_encoding'    => 'mysql_client_encoding',
	);

	var $registry = null;
	var $fetchtypes = array(
		DBARRAY_NUM   => MYSQL_NUM,
		DBARRAY_ASSOC => MYSQL_ASSOC,
		DBARRAY_BOTH  => MYSQL_BOTH
	);

	var $appname = 'Website';
	var $appshortname = 'Website';
	var $database = null;
	var $connection_master = null;
	var $connection_slave = null;
	var $connection_recent = null;
	var $multiserver = false;
	var $shutdownqueries = array();
	var $sql = '';
	var $reporterror = true;
	var $error = '';
	var $errno = '';
	var $maxpacket = 0;
	var $locked = false;
	var $querycount = 0;
	var $submitted = false;
	
	function Database(&$registry)
	{
		if (is_object($registry))
			$this->registry =& $registry;
		else
			trigger_error("vB_Database::Registry object is not an object", E_USER_ERROR);
	}

	function connect($database, $w_servername, $w_port, $w_username, $w_password, $w_usepconnect = false, $r_servername = '', $r_port = 3306, $r_username = '', $r_password = '', $r_usepconnect = false, $configfile = '', $charset = '')
	{
		$this->database = $database;

		$w_port = $w_port ? $w_port : 3306;
		$r_port = $r_port ? $r_port : 3306;

		$this->connection_master = $this->db_connect($w_servername, $w_port, $w_username, $w_password, $w_usepconnect, $configfile, $charset);
		$this->multiserver = false;
		$this->connection_slave =& $this->connection_master;

		if ($this->connection_master)
			$this->select_db($this->database);
	}

	function perform($table, $data, $action = 'insert', $parameters = '') 
	{
    	reset($data);
		if ($action == 'delete')
		  $query = 'delete from '.$table.' where '.$parameters;
	    elseif ($action == 'insert') 
		{
	      $query = 'insert into ' . $table . ' (';
	      while (list($columns, ) = each($data)) 
		  {
	        $query .= $columns . ', ';
	      }
    	 $query = substr($query, 0, -2) . ') values (';
	     reset($data);
    	 while (list(, $value) = each($data)) 
		 {
	        switch ((string)$value) 
			{
	          case 'now()': $query .= 'now(), '; break;
          	  case 'null': $query .= 'null, '; break;
          	  default: $query .=  $this->sql_prepare($value).',' ; break;
	        }
	      }
    	  $query = substr($query, 0, -1) . ')';
  	    } 
		elseif ($action == 'update') 
		{
	      $query = 'update ' . $table . ' set ';
    	  while (list($columns, $value) = each($data)) 
		  { 
	        switch ((string)$value) 
			{
	          case 'now()': $query .= $columns . ' = now(), ';  break;
	          case 'null': $query .= $columns .= ' = null, '; break;
	          default: $query .= $columns . ' = ' .$this->sql_prepare($value).', '; break;
	        }
	      }
		  $parameters = empty($parameters) ? '' : ' where '.$parameters;
    	  $query = substr($query, 0, -2) . $parameters;
	     }	

		$this->sql =& $query;

		return $this->execute_query($buffered, $this->connection_master);
	 }
	 
	 function sql_info()
	 {
		return mysql_info($this->connection_master);
	 }
	 
	function db_connect($servername, $port, $username, $password, $usepconnect, $configfile = '', $charset = '')
	{
		if (function_exists('catch_db_error'))
			set_error_handler('catch_db_error');
		do
			$link = $this->functions[$usepconnect ? 'pconnect' : 'connect']("$servername:$port", $username, $password);
		while ($link == false AND $this->reporterror);

		restore_error_handler();
		if (!empty($charset))
		{
			if (function_exists('mysql_set_charset'))
				mysql_set_charset($charset);
			else
			{
				$this->sql = "SET NAMES $charset";
				$this->execute_query(true, $link);
			}
		}

		return $link;
	}

	function select_db($database = '')
	{
		if ($database != '')
			$this->database = $database;
		if ($check_write = @$this->select_db_wrapper($this->database, $this->connection_master))
		{
			$this->connection_recent =& $this->connection_master;
			return true;
		}
		else
		{
			$this->connection_recent =& $this->connection_master;
			$this->halt('Cannot use database ' . $this->database);
			return false;
		}
	}

	function select_db_wrapper($database = '', $link = null)
	{
		return $this->functions['select_db']($database, $link);
	}

	function force_sql_mode($mode)
	{
		$reset_errors = $this->reporterror;
		if ($reset_errors)
			$this->hide_errors();
		$this->query_write("SET @@sql_mode = '" . $this->escape_string($mode) . "'");
		if ($reset_errors)
			$this->show_errors();
	}

	function &execute_query($buffered = true, &$link)
	{
		$this->connection_recent =& $link;
		$this->querycount++;

		if ($queryresult = $this->functions[$buffered ? 'query' : 'query_unbuffered']($this->sql, $link))
		{
			$this->sql = '';
			return $queryresult;
		}
		else
		{
			$this->halt();
			$this->sql = '';
		}
	}

	function query_write($sql, $buffered = true)
	{
		$this->sql =& $sql;
		return $this->execute_query($buffered, $this->connection_master);
	}

	function query_read($sql, $buffered = true)
	{
		$this->sql =& $sql;
		return $this->execute_query($buffered, $this->connection_master);
	}

	function query_read_slave($sql, $buffered = true)
	{
		$this->sql =& $sql;
		return $this->execute_query($buffered, $this->connection_master);
	}

	function query($sql, $buffered = true)
	{
		$this->sql =& $sql;
		return $this->execute_query($buffered, $this->connection_master);
	}

	function &query_first($sql, $type = DBARRAY_ASSOC)
	{
		$this->sql =& $sql;
		$queryresult = $this->execute_query(true, $this->connection_master);
		$returnarray = $this->fetch_array($queryresult, $type);
		$this->free_result($queryresult);
		return $returnarray;
	}

	function found_rows()
	{
		$this->sql = "SELECT FOUND_ROWS()";
		$queryresult = $this->execute_query(true, $this->connection_recent);
		$returnarray = $this->fetch_array($queryresult, DBARRAY_NUM);
		$this->free_result($queryresult);

		return intval($returnarray[0]);
	}

	function &query_first_slave($sql, $type = DBARRAY_ASSOC)
	{
		$returnarray = $this->query_first($sql, $type);
		return $returnarray;
	}

	function &query_insert($table, $fields, &$values, $buffered = true)
	{
		return $this->insert_multiple("INSERT INTO $table $fields VALUES", $values, $buffered);
	}

	function &query_replace($table, $fields, &$values, $buffered = true)
	{
		return $this->insert_multiple("REPLACE INTO $table $fields VALUES", $values, $buffered);
	}
	
    function query_array($sql = "") 
	{ 
		$this->sql =& $sql;	
		if (is_array($sql)) {
			while (list (, $val) = each($sql)) 
			 {
				$this->one_query($val);
			 }
			return true;
		}
		return $this->one_query($sql);
	}

	 function one_query($sql = "") 
	{ 
		$data = array ();
		$count = 0;
		$result = $this->functions['query']($this->sql, $this->connection_master);	
		if (!is_bool($result)) 
		 { 
			while ($row = $this->functions['fetch_assoc']($result)) 
			{
				$data[$count ++] = $row;
			}
		 } 
		else 
		    {
			  	$data = $result;
			} 
		return $data;
	}	
	
	function insert_multiple($sql, &$values, $buffered)
	{
		if ($this->maxpacket == 0)
		{
			$vars = $this->query_write("SHOW VARIABLES LIKE 'max_allowed_packet'");
			$var = $this->fetch_row($vars);
			$this->maxpacket = $var[1];
			$this->free_result($vars);
		}

		$i = 0;
		$num_values = sizeof($values);
		$this->sql = $sql;

		while ($i < $num_values)
		{
			$sql_length = strlen($this->sql);
			$value_length = strlen("\r\n" . $values["$i"] . ",");

			if (($sql_length + $value_length) < $this->maxpacket)
			{
				$this->sql .= "\r\n" . $values["$i"] . ",";
				unset($values["$i"]);
				$i++;
			}
			else
			{
				$this->sql = (substr($this->sql, -1) == ',') ? substr($this->sql, 0, -1) : $this->sql;
				$this->execute_query($buffered, $this->connection_master);
				$this->sql = $sql;
			}
		}
		if ($this->sql != $sql)
		{
			$this->sql = (substr($this->sql, -1) == ',') ? substr($this->sql, 0, -1) : $this->sql;
			$this->execute_query($buffered, $this->connection_master);
		}

		if (sizeof($values) == 1)
			return $this->insert_id();
		else
			return true;
	}

	function shutdown_query($sql, $arraykey = -1)
	{
		if ($arraykey === -1)
		{
			$this->shutdownqueries[] = $sql;
			return true;
		}
		else
		{
			$this->shutdownqueries["$arraykey"] = $sql;
			return true;
		}
	}

	function num_rows($queryresult)
	{
		return @$this->functions['num_rows']($queryresult);
	}

	function num_fields($queryresult)
	{
		return @$this->functions['num_fields']($queryresult);
	}

	function field_name($queryresult, $index)
	{
		return @$this->functions['field_name']($queryresult, $index);
	}

	function insert_id()
	{
		return @$this->functions['insert_id']($this->connection_master);
	}

	function client_encoding()
	{
		return @$this->functions['client_encoding']($this->connection_master);
	}

	function close()
	{
		return @$this->functions['close']($this->connection_master);
	}

	function escape_string($string)
	{
		if ($this->functions['escape_string'] == $this->functions['real_escape_string'])
		{
			return $this->functions['escape_string']($string, $this->connection_master);
		}
		else
		{
			return $this->functions['escape_string']($string);
		}
	}

	function escape_string_like($string)
	{
		return str_replace(array('%', '_') , array('\%' , '\_') , $this->escape_string($string));
	}

	function sql_prepare($value)
	{
		if (is_string($value))
			return "'" . $this->escape_string($value) . "'";
		else if (is_numeric($value) AND $value + 0 == $value)
			return $value;
		else if (is_bool($value))
			return $value ? 1 : 0;
		else
			return "'" . $this->escape_string($value) . "'";
	}

	function fetch_array($queryresult, $type = DBARRAY_ASSOC)
	{
		return @$this->functions['fetch_array']($queryresult, $this->fetchtypes["$type"]);
	}

	function fetch_row($queryresult)
	{
		return @$this->functions['fetch_row']($queryresult);
	}

	function fetch_field($queryresult)
	{
		return @$this->functions['fetch_field']($queryresult);
	}

	function data_seek($queryresult, $index)
	{
		return @$this->functions['data_seek']($queryresult, $index);
	}

	function free_result($queryresult)
	{
		$this->sql = '';
		return @$this->functions['free_result']($queryresult);
	}

	function affected_rows()
	{
		$this->rows = $this->functions['affected_rows']($this->connection_recent);
		return $this->rows;
	}

	function lock_tables($tablelist=false)
	{
		if (!empty($tablelist) AND is_array($tablelist))
		{
			if (strtolower($this->registry->config['Database']['dbtype']) != 'mysqli' AND $this->registry->config['MasterServer']['usepconnect'])
				return;
			$sql = '';
			foreach($tablelist AS $name => $type)
				$sql .= (!empty($sql) ? ', ' : '') . TABLE_PREFIX . $name . " " . $type;
			$this->query_write("LOCK TABLES $sql");
			$this->locked = true;
		}
	}

	function unlock_tables()
	{
		if ($this->locked)
		{
			$this->query_write("UNLOCK TABLES");
		}
	}

	function error()
	{
		if ($this->connection_recent === null)
			$this->error = '';
		else
			$this->error = $this->functions['error']($this->connection_recent);
		return $this->error;
	}

	function errno()
	{
		if ($this->connection_recent === null)
			$this->errno = 0;
		else
			$this->errno = $this->functions['errno']($this->connection_recent);
		return $this->errno;
	}

	function show_errors()
	{
		$this->reporterror = true;
	}

	function hide_errors()
	{
		$this->reporterror = false;
	}

	function halt($errortext = '')
	{
		global $Process;

		if ($this->connection_recent)
		{
			$this->error = $this->error($this->connection_recent);
			$this->errno = $this->errno($this->connection_recent);
		}

		if ($this->reporterror)
		{
			if ($errortext == '')
			{
				$this->sql = "Invalid SQL:\r\n" . chop($this->sql) . ';';
				$errortext =& $this->sql;
			}

			if (!headers_sent())
			{
				if (SAPI_NAME == 'cgi' OR SAPI_NAME == 'cgi-fcgi')
					header('Status: 503 Service Unavailable');
				else
					header('HTTP/1.1 503 Service Unavailable');
			}

			$vboptions      =& $Process->options;
			$technicalemail =& $Process->config['Database']['technicalemail'];
			$bbuserinfo     =& $Process->userinfo;
			$requestdate    = date('l, F jS Y @ h:i:s A', TIMENOW);
			$date           = date('l, F jS Y @ h:i:s A');
			$scriptpath     = str_replace('&amp;', '&', $Process->scriptpath);
			$referer        = REFERRER;
			$ipaddress      = IPADDRESS;
			$classname      = get_class($this);

			if ($this->connection_recent)
			{
				$this->hide_errors();
				list($mysqlversion) = $this->query_first("SELECT VERSION() AS version", DBARRAY_NUM);
				$this->show_errors();
			}

			$display_db_error = (VB_AREA == 'Upgrade' OR VB_AREA == 'Install' OR $Process->userinfo['usergroupid'] == 6 OR ($Process->userinfo['permissions']['adminpermissions'] & $Process->bf_ugp_adminpermissions));

			if (!$display_db_error)
				$mysqlversion = '';
			eval('$message = "' . str_replace('"', '\"', file_get_contents('includes/database_error_message.html')) . '";');
			eval('$message = "' . str_replace('"', '\"', file_get_contents('includes/database_error_page.html')) . '";');
			$message .= str_repeat(' ', 512);
			die($message);
		}
		else if (!empty($errortext))
			$this->error = $errortext;
	}
}

class Database_MySQLi extends Database
{
	var $functions = array(
		'connect'            => 'mysqli_real_connect',
		'pconnect'           => 'mysqli_real_connect', // mysqli doesn't support persistent connections THANK YOU!
		'select_db'          => 'mysqli_select_db',
		'query'              => 'mysqli_query',
		'query_unbuffered'   => 'mysqli_unbuffered_query',
		'fetch_row'          => 'mysqli_fetch_row',
		'fetch_array'        => 'mysqli_fetch_array',
		'fetch_field'        => 'mysqli_fetch_field',
		'free_result'        => 'mysqli_free_result',
		'data_seek'          => 'mysqli_data_seek',
		'error'              => 'mysqli_error',
		'errno'              => 'mysqli_errno',
		'affected_rows'      => 'mysqli_affected_rows',
		'num_rows'           => 'mysqli_num_rows',
		'num_fields'         => 'mysqli_num_fields',
		'field_name'         => 'mysqli_field_tell',
		'insert_id'          => 'mysqli_insert_id',
		'escape_string'      => 'mysqli_real_escape_string',
		'real_escape_string' => 'mysqli_real_escape_string',
		'close'              => 'mysqli_close',
		'client_encoding'    => 'mysqli_client_encoding',
	);

	var $fetchtypes = array(
		DBARRAY_NUM   => MYSQLI_NUM,
		DBARRAY_ASSOC => MYSQLI_ASSOC,
		DBARRAY_BOTH  => MYSQLI_BOTH
	);

	function db_connect($servername, $port, $username, $password, $usepconnect, $configfile = '', $charset = '')
	{
		if (function_exists('catch_db_error'))
			set_error_handler('catch_db_error');
		$link = mysqli_init();
		if (!empty($configfile))
			mysqli_options($link, MYSQLI_READ_DEFAULT_FILE, $configfile);
		do
		{
			$connect = $this->functions['connect']($link, $servername, $username, $password, '', $port);
		}
		while ($connect == false AND $this->reporterror);

		restore_error_handler();

		if (!empty($charset))
		{
			if (function_exists('mysqli_set_charset'))
			{
				mysqli_set_charset($link, $charset);
			}
			else
			{
				$this->sql = "SET NAMES $charset";
				$this->execute_query(true, $link);
			}
		}

		return (!$connect) ? false : $link;
	}

	function &execute_query($buffered = true, &$link)
	{
		$this->connection_recent =& $link;
		$this->querycount++;

		if ($queryresult = mysqli_query($link, $this->sql, ($buffered ? MYSQLI_STORE_RESULT : MYSQLI_USE_RESULT)))
		{
			$this->sql = '';
			return $queryresult;
		}
		else
		{
			$this->halt();
			$this->sql = '';
		}
	}

	function select_db_wrapper($database = '', $link = null)
	{
		return $this->functions['select_db']($link, $database);
	}

	function escape_string($string)
	{
		return $this->functions['real_escape_string']($this->connection_master, $string);
	}

	function field_name($queryresult, $index)
	{
		$field = @$this->functions['fetch_field']($queryresult);
		return $field->name;
	}
}

?>