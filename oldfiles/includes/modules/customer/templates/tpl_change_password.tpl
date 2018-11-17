<script type='text/javascript' src='includes/scripts/md5.js'></script>
<script type="text/javascript" src='includes/scripts/password_check.js'></script>
<div class="account_title">{$phrase.change_your_password}</div><br />
{if $smarty.get.action == 'done'}
   Saved successfully!
{/if}
<table>
<tr>
<td>
<form action="{$scriptpath}" method="post">	
{$phrase.password_old}: <input type="password"  class="form" name="password_old"  maxlength="50" value="" /> <span class="error">{$error_msg.password_old}</span><br />
{$phrase.new_password}: <input type="password"  class="form" name="password"  maxlength="50" value="" /> <span class="error">{$error_msg.password}</span><br />
{$phrase.confirm_password}: <input type="password" class="form" name="passwordconfirm" maxlength="50" value="" /> <br />
<input name=do type="hidden" value="change_password" />
{$token}
<input type="submit" name="update" value="{$phrase.update_changes}" class="form" />
</form>
</td>
</tr>
</table>