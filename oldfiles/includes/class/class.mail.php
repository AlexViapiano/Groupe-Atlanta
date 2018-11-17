<?php

/**
* Standard Mail Sending Object
*
* This class sends email from vBulletin using the PHP mail() function
*
* @package 		vBulletin
* @version		$Revision: 29519 $
* @date 		$Date: 2009-02-11 06:36:08 -0600 (Wed, 11 Feb 2009) $
* @copyright 	http://www.vbulletin.com/license.html
*
*/
class SMail
{
	/**
	* Destination address
	*
	* @var	string
	*/
	var $toemail = '';

	/**
	* Subject
	*
	* @var	string
	*/
	var $subject = '';

	/**
	* Message
	*
	* @var	string
	*/
	var $message = '';

	/**
	* All headers to be sent with the message
	*
	* @var	string
	*/
	var $headers = '';

	/**
	* Sender email
	*
	* @var	string
	*/
	var $fromemail = '';

	/**
	* Line delimiter
	*
	* @var	string
	*/
	var $delimiter = "\r\n";

	/**
	* Registry object for any options we need
	*
	* @var	vB_Registry
	*/
	var $registry = null;

	/**
	* Switch to enable/disable debugging. When enabled, warnings are not suppressed
	*
	* @var	boolean
	*/
	var $debug = false;

	/**
	* Message to log if logging is enabled
	*
	* @var	string
	*/
	var $log = '';

	/**
	* Constructor
	*
	* @param	vB_Registry	vBulletin registry object
	*/
	
	var $website_name = '';
	
	function SMail(&$registry, $lang=false)
	{
		if (is_object($registry))
		{
			$this->registry =& $registry;
		}
		else
		{
			trigger_error('Registry object is not an object', E_USER_ERROR);
		}

		$sendmail_path = @ini_get('sendmail_path');
		if (!$sendmail_path OR $this->registry->options['use_smtp'] OR defined('FORCE_MAIL_CRLF'))
		{
			// no sendmail, so we're using SMTP or a server that lines CRLF to send mail // the use_smtp part is for the MailQueue extension
			$this->delimiter = "\r\n";
		}
		else
		{
			$this->delimiter = "\n";
		}
		$this->website_name = !$lang ? $registry->options['website_name'] :$registry->options['website_name_'.$lang];
	}

	/**
	* Starts the process of sending an email - preps it so it's fully ready to send.
	* Call send() to actually send it.
	*
	* @param	string	Destination email address
	* @param	string	Email message subject
	* @param	string	Email message body
	* @param	string	Optional name/email to use in 'From' header
	* @param	string	Additional headers
	* @param	string	Username of person sending the email
	*
	* @param	boolean	True on success, false on failure
	*/
	function start($toemail, $subject, $message, $from = '', $uheaders = '', $username = '')
	{
		$toemail = $this->fetch_first_line($toemail);

		if (empty($toemail))
		{
			return false;
		}

		$delimiter =& $this->delimiter;
		$Process =& $this->registry;

		$toemail = unhtmlspecialchars($toemail);
		$subject = $this->fetch_first_line($subject);
		$message = preg_replace("#(\r\n|\r|\n)#s", $delimiter, trim($message));

		global $stylevar;
		if ((strtolower($Process->userinfo['charset']) == 'iso-8859-1' OR $Process->userinfo['charset'] == '') AND preg_match('/&[a-z0-9#]+;/i', $message))
		{
			$message = utf8_encode($message);
			$subject = utf8_encode($subject);
			$username = utf8_encode($username);

			$encoding = 'UTF-8';
			$unicode_decode = true;
		}
		else
		{
			// we know nothing about the message's encoding in relation to UTF-8,
			// so we can't modify the message at all; just set the encoding
			$encoding = $stylevar['charset'];
			$unicode_decode = false;
		}

		// theses lines may need to call convert_int_to_utf8 directly
		$message = unhtmlspecialchars($message, $unicode_decode);
		$subject = $this->encode_email_header(unhtmlspecialchars($subject, $unicode_decode), $encoding, false, false);

		$from = $this->fetch_first_line($from);
		if (empty($from))
		{
			$mailfromname = $this->website_name;
			if ($unicode_decode == true)
				$mailfromname = utf8_encode($mailfromname);
			$mailfromname = $this->encode_email_header(unhtmlspecialchars($mailfromname, $unicode_decode), $encoding);
			$headers .= "From: $mailfromname <" . $Process->options['email_contact'] . '>' . $delimiter;
			$headers .= 'Auto-Submitted: auto-generated' . $delimiter;
		}
		else
		{
			if ($username)
				$mailfromname = "$username @ " . $this->website_name;
			else
				$mailfromname = $from;
			if ($unicode_decode == true)
				$mailfromname = utf8_encode($mailfromname);
			$mailfromname = $this->encode_email_header(unhtmlspecialchars($mailfromname, $unicode_decode), $encoding);
			$headers .= "From: $mailfromname <$from>" . $delimiter;
			$headers .= "Sender: " . $Process->Process['email_contact'] . $delimiter;
		}
		$fromemail = empty($Process->options['bounceemail']) ? $Process->options['email_contact'] : $Process->options['bounceemail'];
		$headers .= 'Return-Path: ' . $fromemail . $delimiter;
		if ($_SERVER['HTTP_HOST'] OR $_ENV['HTTP_HOST'])
			$http_host = iif($_SERVER['HTTP_HOST'], $_SERVER['HTTP_HOST'], $_ENV['HTTP_HOST']);
		else if ($_SERVER['SERVER_NAME'] OR $_ENV['SERVER_NAME'])
			$http_host = iif($_SERVER['SERVER_NAME'], $_SERVER['SERVER_NAME'], $_ENV['SERVER_NAME']);
		$http_host = trim($http_host);
		if (!$http_host)
			$http_host = substr(md5($message), 12, 18) . '.unknown.unknown';
		$msgid = '<' . gmdate('YmdHis') . '.' . substr(md5($message . microtime()), 0, 12) . '@' . $http_host . '>';
		$headers .= 'Message-ID: ' . $msgid . $delimiter;
		$headers .= preg_replace("#(\r\n|\r|\n)#s", $delimiter, $uheaders);
		unset($uheaders);

		$headers .= 'MIME-Version: 1.0' . $delimiter;
		$headers .= 'Content-Type: text/html' . iif($encoding, "; charset=\"$encoding\"") . $delimiter;
		$headers .= 'Content-Transfer-Encoding: 8bit' . $delimiter;
		$headers .= 'X-Priority: 3' . $delimiter;
		$headers .= 'X-Mailer: '.$this->website_name.' Mail via PHP' . $delimiter;
		// fairly specific fix for PHP 4 and Windows, see issue #21913
		if (phpversion() < '5' AND strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
			$headers .= 'Date: ' . date('r') . $delimiter;
		$this->toemail = $toemail;
		$this->subject = $subject;
		$this->message = $message;
		$this->headers = $headers;
		$this->fromemail = $fromemail;

		return true;
	}

	/**
	* Set all the necessary variables for sending a message.
	*
	* @param	string	Destination address
	* @param	string	Subject
	* @param	string	Message
	* @param	string	All headers to be sent with the message
	* @param	string	Sender email
	*/
	function quick_set($toemail, $subject, $message, $headers, $fromemail)
	{
		$this->toemail = $toemail;
		$this->subject = $subject;
		$this->message = $message;
		$this->headers = $headers;
		$this->fromemail = $fromemail;
	}

	/**
	* Actually send the message.
	*
	* @return	boolean	True on success, false on failure
	*/
	function send()
	{
		if (!$this->toemail)
		{
			return false;
		}

		@ini_set('sendmail_from', $this->fromemail);
		$result =  mail($this->toemail, $this->subject, $this->message, trim($this->headers), '-f ' . $this->fromemail);
		$this->log_email($result);
		return $result;
	}

	/**
	* Returns the first line of a string -- good to prevent errors when sending emails (above)
	*
	* @param	string	String to be trimmed
	*
	* @return	string
	*/
	function fetch_first_line($text)
	{
		$text = preg_replace("/(\r\n|\r|\n)/s", "\r\n", trim($text));
		$pos = strpos($text, "\r\n");
		if ($pos !== false)
		{
			return substr($text, 0, $pos);
		}
		return $text;
	}

	/**
	* Encodes a mail header to be RFC 2047 compliant. This allows for support
	* of non-ASCII character sets via the quoted-printable encoding.
	*
	* @param	string	The text to encode
	* @param	string	The character set of the text
	* @param	bool	Whether to force encoding into quoted-printable even if not necessary
	* @param	bool	Whether to quote the string; applies only if encoding is not done
	*
	* @return	string	The encoded header
	*/
	function encode_email_header($text, $charset = 'utf-8', $force_encode = false, $quoted_string = true)
	{
		$text = trim($text);

		if (!$charset)
		{
			// don't know how to encode, so we can't
			return $text;
		}

		if ($force_encode == true)
		{
			$qp_encode = true;
		}
		else
		{
			$qp_encode = false;

			for ($i = 0; $i < strlen($text); $i++)
			{
				if (ord($text{$i}) > 127)
				{
					// we have a non ascii character
					$qp_encode = true;
					break;
				}
			}
		}

		if ($qp_encode == true)
		{
			// see rfc 2047; not including _ as allowed here, as I'm encoding spaces with it
			$outtext = preg_replace('#([^a-zA-Z0-9!*+\-/ ])#e', "'=' . strtoupper(dechex(ord(str_replace('\\\"', '\"', '\\1'))))", $text);
			$outtext = str_replace(' ', '_', $outtext);
			$outtext = "=?$charset?q?$outtext?=";
			return $outtext;
		}
		else
		{
			if ($quoted_string)
			{
				$text = str_replace(array('"', '(', ')'), array('\"', '\(', '\)'), $text);
				return "\"$text\"";
			}
			else
			{
				return preg_replace('#(\r\n|\n|\r)+#', ' ', $text);
			}
		}
	}

	/**
	* Sets the debug member
	*
	* @param	boolean
	*/
	function set_debug($debug)
	{
		$this->debug = $debug;
	}

	/**
	* Logs email to file
	*
	*/
	function log_email($status = true)
	{
		if (!empty($this->registry->options['errorlogemail']) AND !is_demo_mode())
		{
			$errfile =& $this->registry->options['errorlogemail'];
			if ($this->registry->options['errorlogmaxsize'] != 0 AND $filesize = @filesize("$errfile.log") AND $filesize >= $this->registry->options['errorlogmaxsize'])
			{
				@copy("$errfile.log", $errfile . TIMENOW . '.log');
				@unlink("$errfile.log");
			}

			$timenow = date('r', TIMENOW);

			$is_admin = ($this->registry->userinfo['permissions']['adminpermissions'] & $this->registry->bf_ugp_adminpermissions['cancontrolpanel']);

			$fp = @fopen("$errfile.log", 'a+b');

			if ($fp)
			{
				if ($status === true)
				{
					$output = "SUCCESS\r\n";
				}
				else
				{
					$output = "FAILED";
					if ($status !== false)
					{
						$output .= ": $status";
					}
					$output .= "\r\n";
				}
				if ($this->delimiter == "\n")
				{
					$append = "$timenow\r\nTo: " . $this->toemail . "\r\nSubject: " . $this->subject . "\r\n" . $this->headers . "\r\n\r\n" . $this->message . "\r\n=====================================================\r\n\r\n";
					@fwrite($fp, $output . $append);
				}
				else
				{
					$append = preg_replace("#(\r\n|\r|\n)#s", "\r\n", "$timenow\r\nTo: " . $this->toemail . "\r\nSubject: " . $this->subject . "\r\n" . $this->headers . "\r\n\r\n" . $this->message . "\r\n=====================================================\r\n\r\n");

					@fwrite($fp, $output . $append);
				}
				fclose($fp);
			}
		}
	}
}

?>