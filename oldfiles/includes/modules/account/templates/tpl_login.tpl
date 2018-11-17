<script type='text/javascript' src='includes/scripts/md5.js'></script>
<form action='{$scriptpath}' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>
		<input type='hidden' name='s' value='{$session.vars.sessionhash}' />
		{$token}
		<input type='hidden' name='do' value='login' />
		<input type='hidden' name='login_md5password' />
		<input type='hidden' name='login_md5password_utf' />
 
				
 
<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">
	<tr><td class="cont_heading_td">
				Welcome, Please Sign In			
</td></tr>
</table>								
  
  <table cellpadding="0" cellspacing="0" border="0" class="content_wrapper1_table">
		<tr>
		  <td class="content_wrapper1_td"> 
 {if $login_failed || $error_msg.login_md5password || $error_msg.login_email || $error_msg.email }
    <table cellpadding="0" cellspacing="0" border="0">
   
	  <tr>
        <td>
        <table border="0" width="72%" cellspacing="0" cellpadding="0">
  <tr class="messageStackError">
    <td class="messageStackError">
    <img src="{$path_img}/error.gif" border="0" alt="Error" title=" Error " width="10" height="10">
    &nbsp;Error: {$phrase.login_failed} {$error_msg.login_md5password} {$error_msg.login_email} {$error_msg.email}</td>
  </tr>
</table> 
</td>
      </tr>
   
	</table>{/if}
 
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>	
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="main indent_2" width="50%"><b>New Customer</b></td>
			<td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
            <td class="main indent_2" width="50%"><b>Returning Customer</b></td>
          </tr>
          <tr valign="top">
            <td width="50%" height="100%">
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
				<table border="0" width="100%" height="100%" cellspacing="5" cellpadding="0">
                  <tr>
                    <td class="main" style="height:100%;">I am a new customer.<br><br>By creating an account at Clothes Store you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made.</td>
                  </tr>
                  <tr>
                    <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="10"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
                        <td align="right" class="smallText"><a href="register"><br />
                          <br />
                          <br />
                          <br />
                          <br />
                          <br />
                          {$phrase.continue}</a></td>
                        <td width="10"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
                      </tr>
                    </table>
					
					</td>
                  </tr>
                </table>
				
</td></tr>
	</table>
			</td>
			<td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="1" height="1"></td>
            <td width="50%">
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_" width="100%">
		<tr><td class="infoBox__">
				<table border="0" cellspacing="5" cellpadding="0" width="100%">
                  <tr> <td class="main" colspan="2">I am a returning customer.</td></tr>
                  <tr><td class="main"><b>{$phrase.email}:</b></td></tr>
                  <tr><td class="main width3_100"><input type="text" name="login_email" value="{$smarty.post.login_email}"></td></tr>
                  <tr><td class="main"><b>{$phrase.password}:</b></td></tr>

                    <td class="main width3_100"><input type="password" name="login_password" maxlength="40"></td></tr>
                  <tr><td class="smallText"><a href="lostpassword">{$phrase.password_forgotten}</a></td></tr>
                  <tr><td height="100%"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                  <tr><td>
                  	<table border="0" width="100%" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="10"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
                        <td align="right"><input type="submit" value="{$phrase.sign_in}" alt="{$phrase.sign_in}" title="{$phrase.sign_in}"></td>
                        <td width="10"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
                      </tr>
                    </table>
                  </td></tr>
                </table>
				
</td></tr>
	</table>
			</td>
          </tr>
        </table>
	
</td></tr>
  </table>      		

	</form>