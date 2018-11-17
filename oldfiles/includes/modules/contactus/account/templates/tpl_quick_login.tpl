
 
				<table cellpadding="0" cellspacing="0" border="0" align="center" class="content_wrapper_table">
					<tr><td class="content_wrapper_td">
 
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
    &nbsp;Error: {$phrase.login_failed} {$error_msg.login_md5password} {$error_msg.login_email} 
    {if $error_msg.email}{$error_msg.email};{/if}
    {if $error_msg.firstname} Firstname: {$error_msg.firstname}; {/if}
    {if $error_msg.lastname} Lastname: {$error_msg.lastname};{/if}</td>
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
          <tr>
            <td width="50%" >
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
        <form action='{$scriptpath}' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>
		<input type='hidden' name='s' value='{$session.vars.sessionhash}' />
		{$token}
		<input type='hidden' name='do' value='quick_signup' />
				<table border="0" width="100%" height="100%" cellspacing="5" cellpadding="0" style="height:240px;">
                  <tr>
                    <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                  </tr>
                  <tr>
                    <td><table border="0" cellspacing="4" cellpadding="2" width="100%">
               <tr><td width="49%" class="main"><b>First Name:</b></td>
              <td width="51%" class="main"><input type="text"  name="firstname" value="{$smarty.post.firstname}">&nbsp;<span class="inputRequirement">*</span></td>              </tr>
              <tr><td class="main"><b>Last Name:</b></td>
              <td class="main"><input type="text" name="lastname" value="{$smarty.post.lastname}">&nbsp;<span class="inputRequirement">*</span></td>              </tr>
              <tr><td class="main"><b>E-Mail Address:</b></td>
              <td class="main"><input type="text" name="email" value="{$smarty.post.email}">&nbsp;<span class="inputRequirement">*</span></td>              </tr>
              <tr><td class="main"><b>Confirm E-Mail Address:</b></td>
              <td class="main"><input type="text" name="emailconfirm" value="{$smarty.post.email_confirm}">&nbsp;<span class="inputRequirement">*</span></td>              </tr>
            </table>
                    </td>
                  </tr>
               
                  <tr>
                   <td align="right" class="smallText"><input type="submit" value="{$phrase.continue}" alt="{$phrase.continue}" title="{$phrase.continue}"></td>
                  
                  </tr>
                </table></form>
				
</td></tr>
	</table>
			</td>
			<td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="1" height="1"></td>
            <td width="50%" height="100%">
				
 <script type='text/javascript' src='includes/scripts/md5.js'></script>
<form action='{$scriptpath}' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>
		<input type='hidden' name='s' value='{$session.vars.sessionhash}' />
		{$token}
		<input type='hidden' name='do' value='login' />
		<input type='hidden' name='login_md5password' />
		<input type='hidden' name='login_md5password_utf' />
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
				<table border="0" width="100%" height="100%" cellspacing="5" cellpadding="0" style="height:240px;">
                  <tr><td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                  <tr> <td class="main" colspan="2">I am a returning customer.</td></tr>
                  <tr><td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                  <tr><td class="main"><b>{$phrase.email}:</b></td></tr>
                  <tr><td class="main width3_100"><input type="text" name="login_email" value="{$smarty.post.login_email}"></td></tr>
                  <tr><td class="main"><b>{$phrase.password}:</b></td></tr>

                    <td class="main width3_100"><input type="password" name="login_password" maxlength="40"></td></tr>
                  <tr><td colspan="2"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                  <tr><td class="smallText"><a href="lostpassword">{$phrase.password_forgotten}</a></td></tr>
                  <tr><td height="100%"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td></tr>
                  <tr><td>
                  	<table border="0" width="100%" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="10"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
                        <td align="right"><input type="submit" value="{$phrase.login}" alt="{$phrase.login}" title="{$phrase.login}"></td>
                        <td width="10"><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
                      </tr>
                    </table>
                  </td></tr>
                </table>
				
</td></tr>
	</table></form>
			</td>
          </tr>
        </table>
	
</td></tr>
  </table>      		
</td></tr>
  				</table>
	