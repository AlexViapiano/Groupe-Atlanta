<?php


/**
* Class to handle shutdown
*
* @package	vBulletin
* @version	$Revision: 31187 $
* @author	Scott
* @date		$Date: 2009-06-11 07:30:06 -0500 (Thu, 11 Jun 2009) $
*/
class Shutdown
{
	var $shutdown = array();

	/**
	* Constructor. Empty.
	*/
	function vB_Shutdown()
	{
	}

	/**
	* Singleton emulation - use this function to instantiate the class
	*
	* @return	vB_Shutdown
	*/
	function &init()
	{
		static $instance;

		if (!$instance)
		{
			$instance = new Shutdown();
			// we register this but it might not be used
			if (phpversion() < '5.0.5')
			{
				register_shutdown_function(array(&$instance, '__destruct'));
			}
		}

		return $instance;
	}

	/**
	* Add function to be executed at shutdown
	*
	* @param	string	Name of function to be executed on shutdown
	*/
	function add($function)
	{
		$obj =& vB_Shutdown::init();
		if (function_exists($function) AND !in_array($function, $obj->shutdown))
		{
			$obj->shutdown[] = $function;
		}
	}

	// only called when an object is destroyed, so $this is appropriate
	function __destruct()
	{
		if (!empty($this->shutdown))
		{
			foreach ($this->shutdown AS $key => $funcname)
			{
				$funcname();
				unset($this->shutdown[$key]);
			}
		}
	}
}

// #############################################################################
// misc functions

// #############################################################################
/**
* Feeds database connection errors into the halt() method of the vB_Database class.
*
* @param	integer	Error number
* @param	string	PHP error text string
* @param	strig	File that contained the error
* @param	integer	Line in the file that contained the error
*/
function catch_db_error($errno, $errstr, $errfile, $errline)
{
	global $db;
	static $failures;

	if (strstr($errstr, 'Lost connection') AND $failures < 5)
	{
		$failures++;
		return;
	}

	if (is_object($db))
	{
		$db->halt("$errstr\r\n$errfile on line $errline");
	}
	else
	{
		vb_error_handler($errno, $errstr, $errfile, $errline);
	}
}


?>