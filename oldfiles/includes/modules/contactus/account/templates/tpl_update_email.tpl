<div class="account_title">{$phrase.update_login_information}</div><br />
{if $smarty.get.action == 'done'}
   Saved successfully!
{/if}
<table>
<tr><td>* {$phrase.email}: </td><td width="10"></td><td>
<form action="{$scriptpath}" method="post">
<input type="text" class="form" name="email" value="{$smarty.post.email}" dir="ltr" /> <span class="error">{$error_msg.email}</span></td></tr>
<tr><td>* {$phrase.confirm_email}: </td><td width="10"></td><td>
<input type="text" class="form" name="emailconfirm"  value="{$smarty.post.emailconfirm}" dir="ltr" /></td></tr>
</table>
<input name=do type="hidden" value="update_email" />
{$token}
<input type="submit" name="update" value="{$phrase.update_changes}" class="form" />
</form>