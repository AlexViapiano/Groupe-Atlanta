<?php

function fetch_captcha($page)
{ 
   global $extra;
   $page = is_array($page) ? current($page) : $page;
   $extra['md5_time'] = md5(time());
   $settings = fetch_settings('captcha');
   
   if ($settings['captcha_'.$page.'_page'])
    {
	   $extra['captcha'] = fetch_template(MODULE_PATH.'captcha/templates/captcha');
	   return true;
	}
   else
	   return false;
}

?>