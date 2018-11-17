<br><br><br><br><br>
<table width="496" border="0" align="center" class="tborder" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <div class="tcat" style="padding:4px; text-align:center"><b>
    {if $change_password} Reset Your Password {else}Lost Your Password?{/if}</b></div>
		<!-- /header -->
 
		<!-- logo and version -->
<table cellpadding="4" cellspacing="0" border="0" width="100%" class="navbody">
		<tr valign="top" style="background:#FFF">
			<td><img src="includes/templates/images/admin/logo_admin.png" alt="Divergence Marketing" title="Divergence Marketing &copy;2011" border="0" width="200" /></td>
			<td>
			  Content Managment System (CMS)
				&nbsp;
			</td>
		</tr>
		</table>
		<table width="100%"  class="logincontrols" align="center">
        <tr><td><div class=error>{$error_msg.badlogin_failed}</div></td></tr>
		<tr>
			<td class='text'>	
    {if $action == 'success'}
	  {$phrase.new_password_sent}<br /><br />
    {elseif $password_change}
      {$phrase.password_change_success}<br /><br />
    {elseif $reset_password_error}
    	{$phrase.reset_password_error}<br /><br />
	{elseif $change_password}
	 {$phrase.email}: <strong>{$reset_user.email}</strong><br />
 	<form name=forgotpassword action="{$scriptpath}" method="post">
    <table>
   	<tr><td>{$phrase.new_password}:</td><td><input type="password" class="form" name="password" > <span style=" color:#F00">{$error_msg.password}</span></td></tr>
   	<tr><td>{$phrase.confirm_password}:</td><td><input type="password" class="form" name="passwordconfirm"></td></tr>
   	<tr><td colspan="2"><input type="submit" class="form" value="{$phrase.update_changes}" /></td></tr>
    </table>
   		<input type="hidden" name="securitytoken" value="{$userinfo.securitytoken}" />
   		<input type=hidden name=do value=change_password />
   	</form>
    
    {else}
	 {$phrase.enter_email_address}<br />
 	<form name=forgotpassword action="{$scriptpath}" method="post">
   		<input type="text" class="form" name="email" value="{$smarty.post.email}"> <span style=" color:#F00">{$error_msg.email}</span><br />
   		<input type="submit" class="form" value="{$phrase.reset_password}" />
   		<input type="hidden" name="s" value="{$session.sessionhash}" />
   		<input type="hidden" name="securitytoken" value="{$userinfo.securitytoken}" />
   		<input type="hidden" name="password_md5" />
   		<input type="hidden" name="passwordconfirm_md5" />
   		<input type=hidden name=do value=lostpassword />
   	</form>
 	{/if}
			</td>
		</tr>
		</table>
    </td>
  </tr>
</table>