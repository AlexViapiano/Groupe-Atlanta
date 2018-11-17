<br><br><br><br><br>
<table width="496" border="0" align="center" class="tborder" cellpadding="0" cellspacing="0">
  <tr>
    <td>
		<script type='text/javascript' src='includes/scripts/core/md5.js'></script>
 		<form action='{$scriptpath}' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>    
    <div class="tcat" style="padding:4px; text-align:center"><b>Log in</b></div>
		<!-- /header -->
 
		<!-- logo and version -->
		<table cellpadding="4" cellspacing="0" border="0" width="100%" class="navbody">
		<tr valign="top" style="background:#FFF">
			<td><img src="includes/templates/images/admin/logo_admin.png" alt="Divergence Marketing" title="Divergence Marketing &copy;2011" border="0" width="40" /></td>
			<td>
			  Content Managment System (CMS)
				&nbsp;
			</td>
		</tr>
		</table>
		<table width="100%"  class="logincontrols" align="center">
        <tr><td colspan="2" align="center"><div class=error>{$error_msg.login_email}{$error_msg.email}{$error_msg.cp_denied}{$error_msg.login_md5password}</div></td></tr>
		<tr>
			<td class='text'><div align="right">{$phrase.email}</div></td>
			<td>
            	<input type='text' name='login_email' size='40' value="{$smarty.post.login_email}" class="form" />
			</td>
			<td class='text'>&nbsp;</td>
		</tr>
		<tr>
		  <td class='text'><div align="right">{$phrase.password}</div></td>
		  <td><input type='password' name='login_password' id='navbar_password' size='40' class="form" /></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		<tr>
		  <td></td>
		  <td><a href="admin/lostpassword.php" title="Lost your password?">Lost your password?</a></td>
		  <td></td>                    
 	    </tr>        
		<tr>
		  <td colspan="3" height="20"></td>
 	    </tr>        
		<tr>
		  <td colspan="3" class='text' align="center">
          {if $error_msg.license}
           <div style="color:#F00"><strong>{$error_msg.license}</strong></div>
           {/if}
           I have read and accepted the 
          <a href="includes/license.php" target="_blank" title="Terms & agreements">License Agreement</a> 
<!--          <input type="checkbox" value="checked" name="license" />--></td>
		  </tr>
		<tr>        
			<td class='text' colspan="2" align="center"><input type='submit' value='{$phrase.login}' class="form" accesskey='s' /></td>
			<td>&nbsp;</td>
		</tr>
		</table>
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
		<input type='hidden' name='do' value='login' />
		<input type='hidden' name='logintype' value='cplogin' />        
		<input type='hidden' name='login_md5password' />
		<input type='hidden' name='login_md5password_utf' />
		</form>
    </td>
  </tr>
</table>