<table width="350" border="0">
  <tr>
    <td background="{$path_img}/tit_2.jpg" width="478" height="26" style="background-repeat:no-repeat;"><div  class="table_align"><div class="main_title">{$phrase.login_menu}</div></div></td>
  </tr>
  <tr>
    <td>
		
		<script type='text/javascript' src='includes/scripts/md5.js'></script>
 		<form action='{$smarty.server.REQUEST_URI}' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>
		<table cellpadding='0' border='0' width="100%">
		<tr>
			<td class='text'>{$phrase.email}</td>
			<td>
            	<input type='text' name='login_email' size='16' accesskey='u' value="{$smarty.post.login_email}" class="form"  /><div class=error>{$error_msg.login_email}{$error_msg.email}</div>
			</td>
			<td class='text'><input type='checkbox' name='cookieuser' value='1' class=form id='cb_cookieuser_navbar' accesskey='c' />{$phrase.remember_me}</td>
		</tr>
		<tr>
			<td class='text'>{$phrase.password}</td>
			<td><input type='password' name='login_password' id='navbar_password' size='16' class="form" /><div class=error>{$error_msg.login_md5password}</div></td>
			<td><input type='submit' value='{$phrase.login}' class="form" accesskey='s' /></td>
		</tr>
		</table>
		<input type='hidden' name='s' value='{$session.vars.sessionhash}' />
		{$token}
		<input type='hidden' name='do' value='login' />
		<input type='hidden' name='login_md5password' />
		<input type='hidden' name='login_md5password_utf' />
		</form>
        <br />
     {if $login_failed}
     	<div class="text">{$phrase.login_failed}</div>
     {/if}    

    </td>
  </tr>
</table>