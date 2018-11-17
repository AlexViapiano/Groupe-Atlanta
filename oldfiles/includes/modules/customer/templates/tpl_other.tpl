<div class="account_title">{$phrase.modify_your_address_information}</div><br />
{if $smarty.get.action == 'done'}
   Saved successfully!
{/if}
<table><tr><td>
<form action="{$scriptpath}" method="post" >	
{$phrase.newsletter}: <input class="form" type="checkbox" name="newsletter" {$newsletter} onclick="alert('{$phrase.are_you_sure_uncheck_newsletter}')"/><br />
{$phrase.timezone}: {$timezone}<br /><br />
<input name=do type="hidden" value="other" />
{$token}
<input type="submit" name="update" value="{$phrase.update_changes}" class="form" />
</td></tr></table>
