<div style="width: 200px; float: left; height: 90px">
      <img  align="left" style="padding-right: 5px; border: 0" src="includes/modules/captcha/securimage_show.php?sid={$md5_time}" alt="" >

        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			    <param name="allowScriptAccess" value="sameDomain" >
			    <param name="allowFullScreen" value="false" >
			    <param name="movie" value="includes/modules/captcha/securimage_play.swf?audio=includes/modules/captcha/securimage_play.php&amp;bgColor1=#777&amp;bgColor2=#fff&amp;iconColor=#000&amp;roundedCorner=5" >
			
			    <param name="bgcolor" value="#ffffff" >
			  </object>

        
        <!-- pass a session id to the query string of the script to prevent ie caching -->
        <a style="border-style: none" href="#" title="Refresh Image" onClick="document.getElementById('siimage').src = 'includes/modules/captcha/securimage_show.php?sid=' + Math.random(); return false"><img src="includes/modules/captcha/images/refresh.gif" alt="Reload Image" border="0" onClick="this.blur()" align="bottom" ></a>
</div>
<div style="clear: both"></div>
Code: 

<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
<input type="text" name="captcha" size="30" > * {if $error_msg.captcha} <p  style=" color:#F00">{$error_msg.captcha}</p>
{/if}