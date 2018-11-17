<?php
/**
* Smarty plugin
* 
* @package Smarty
* @subpackage PluginsFilter
*/

/**
* Smarty htmlspecialchars variablefilter plugin
* 
* @param string $source input string
* @param object $ &$smarty Smarty object
* @return string filtered output
*/
function smarty_function_captcha($params, &$smarty)
{
	if (empty($params['imgid']))
		$params['imgid'] = 'imgid';
	if (empty($params['name']))
		$params['name'] = 'captcha';
	if (!empty($params['style']))
		$params['style'] = 'style='.$params['style'];
	if (!empty($params['class']))
		$params['class'] = 'class='.$params['class'];
		
		
	return '<div>
      <img id="'.$params['imgid'].'" align="left" style="padding-right: 5px; border: 0" src="includes/modules/captcha/securimage_show.php?sid='.md5(time()).'" />

        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			    <param name="allowScriptAccess" value="sameDomain" />
			    <param name="allowFullScreen" value="false" />
			    <param name="movie" value="includes/modules/captcha/securimage_play.swf?audio=includes/modules/captcha/securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
			    <param name="quality" value="high" />
			
			    <param name="bgcolor" value="#ffffff" />
			    <embed src="securimage_play.swf?audio=includes/modules/captcha/securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			  </object>

        
        <a tabindex="-1" style="border-style: none" href="#" title="'.$params['refresh_phrase'].'" onClick="document.getElementById(\''.$params['imgid'].'\').src = \'includes/modules/captcha/securimage_show.php?sid=\' + Math.random(); return false"><img src="includes/modules/captcha/images/refresh.gif" alt="Reload Image" border="0" onClick="this.blur()" align="bottom" /></a>
</div>
<div style="clear: both"></div>
Code: <input type="text" name="'.$params['name'].'" '.$params['class'].' '.$params['style'].'" />&nbsp;<span class="error_msg">'.$params['error_msg'].'</span>';
} 

?>