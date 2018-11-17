	{if $show.guest}
		<script type='text/javascript' src='includes/scripts/md5.js'></script>
 		<form action='login' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>
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
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
		<input type='hidden' name='do' value='login' />
		<input type='hidden' name='login_md5password' />
		<input type='hidden' name='login_md5password_utf' />
		</form>
                    <center><a href='register' class="text_1">{$phrase.register}</a> / <a href="lostpassword" class="text_1">{$phrase.lostpassword}?</a></center>
			{else}
					<p class="welcome">{$phrase.welcome} <strong>{$userinfo.username}</strong>,</p>
                    <p class="text_1" align="center">(<a href="account">{$phrase.account}</a> | <a href="logout">{$phrase.logout}</a>)</p>
			{/if}