<?php

   define('SALT_LENGTH', 3);

function process_change_password($userid)
{
  global $Process;

  $Process->input->clean_array_gpc('p', array(
		'password'             	=> TYPE_STR,
		'passwordconfirm'      	=> TYPE_STR
	), array('passwordconfirm'));

  $Process->input->required(array(
		'password' 	        	=> TYPE_PASSWORD,
		'passwordconfirm'      	=> TYPE_PASSWORD));

  if (!count($Process->input->error_msg))
	{
       $Process->GPC['password'] = verify_password($Process->GPC['password'], $salt);
	   save_input(array('table' 		=> 'user', 
				  	    'action' 		=> 'update',
				  		'para'			=> 'userid='.$userid),
				  array('salt'			=> $salt));
	   query("delete from change_password where userid = ".$userid);
	   sendmail_type($email, 'account_password_change');
	   redirect(_BASE_URL.'lostpassword.php?password_change');	   
	}
}
   
function fetch_new_password($password, &$salt)
{
  $salt = fetch_user_salt();
  return hash_password($password, $salt);
}


function valid_password($password, $userid)
{
  $user = fetch_userinfo($userid);
  return md5($password.$user['salt']) == $user['password'];
}
 	// #############################################################################
/**
* Generates a random password that is much stronger than what we currently use.
*
* @param	integer	Length of desired password
*/
function fetch_random_password($length = 8)
{
	$password_characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
	$total_password_characters = strlen($password_characters) - 1;

	$digit = vbrand(0, $length - 1);

	$newpassword = '';
	for ($i = 0; $i < $length; $i++)
	{
		if ($i == $digit)
		{
			$newpassword .= chr(vbrand(48, 57));
			continue;
		}

		$newpassword .= $password_characters{vbrand(0, $total_password_characters)};
	}
	return $newpassword;
}

	// #############################################################################
	// password related

	/**
	* Converts a PLAIN TEXT (or valid md5 hash) password into a hashed password
	*
	* @param	string	The plain text password to be converted
	*
	* @return	boolean
	*/
	function verify_password($password, &$salt)
	{
	    $salt = fetch_user_salt();
		return  hash_password($password, $salt);
	}
	
		/**
	* Takes a plain text or singly-md5'd password and returns the hashed version for storage in the database
	*
	* @param	string	Plain text or singly-md5'd password
	*
	* @return	string	Hashed password
	*/
	function hash_password($password, $salt)
	{
	  if (!verify_md5($password))
		  $password = md5($password);
		// hash the md5'd password with the salt
		return md5($password . $salt);
	}
	
	/**
	* Verifies that a string is an MD5 string
	*
	* @param	string	The MD5 string
	*
	* @return	boolean
	*/
	function verify_md5(&$md5)
	{
		return (preg_match('#^[a-f0-9]{32}$#', $md5) ? true : false);
	}	

	/**
	* Generates a new user salt string
	*
	* @param	integer	(Optional) the length of the salt string to generate
	*
	* @return	string
	*/
	function fetch_user_salt($length = SALT_LENGTH)
	{
		$salt = '';

		for ($i = 0; $i < $length; $i++)
		{
			$salt .= chr(rand(33, 126));
		}

		return $salt;
	}

// #############################################################################
/**
* vBulletin's own random number generator
*
* @param	integer	Minimum desired value
* @param	integer	Maximum desired value
* @param	mixed	Seed for the number generator (if not specified, a new seed will be generated)
*/
function vbrand($min = 0, $max = 0, $seed = -1)
{
	mt_srand(crc32(microtime()));

	if ($max AND $max <= mt_getrandmax())
	{
		$number = mt_rand($min, $max);
	}
	else
	{
		$number = mt_rand();
	}
	// reseed so any calls outside this function don't get the second number
	mt_srand();

	return $number;
}

?>