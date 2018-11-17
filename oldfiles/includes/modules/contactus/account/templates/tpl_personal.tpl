<div class="account_title">{$phrase.modify_your_personal_information}</div><br />
{if $smarty.get.action == 'done'}
   Saved successfully!
{/if}
<script type="text/javascript" src="includes/scripts/calendardateinput.js"></script> 
<table>
<tr><td>
<form action="{$scriptpath}" method="post" >	
{$phrase.firstname}: <input type="text" class="form" name="firstname" value="{$firstname}" /> <span class="error">{$error_msg.firstname}</span><br />
{$phrase.lastname}:  <input type="text"  class="form" name="lastname" value="{$lastname}" / <span class="error">{$error_msg.lastname}</span><br />
{$phrase.sex}: {$sex}<br />
{$phrase.status}: {$status}
<table width="350" border="0" cellpadding="0" cellpadding="0">
<tr>
	<td width="70" class="text">{$phrase.dob}:</td>
	<td align="left"><script>DateInput("dob", true, "YYYY-MM-DD", "{$dob}")</script></td>
</tr>
</table>
<input name=do type="hidden" value="personal" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
{$token}
<input type="submit" name="update" value="{$phrase.update_changes}" class="form"/>
</form>
</td></tr></table>