<div class="account_title">{$phrase.modify_your_address_information}</div><br />
{if $smarty.get.action == 'done'}
   Saved successfully!
{/if}
<table><tr><td>
<form action="{$scriptpath}" method="post" >	
{$phrase.address}: <input type="text" class="form" name="address" value="{$address}"/><br />
{$phrase.city}: <input type="text" class="form" name="city" value="{$city}" /><br />
{$phrase.state}: <input type="text" class="form" name="state" value="{$state}" /><br />
{$phrase.country}: {$country}<br />
{$phrase.zipcode}: <input type="text" class="form" name="zipcode" value="{$zipcode}" /><br />
{$phrase.phone}: <input type="text" class="form" name="phone" value="{$phone}" /><br />
{$phrase.fax}: <input type="text" class="form" name="fax" value="{$fax}" /><br />
<input name=do type="hidden" value="address" />
{$token}
<input type="submit" name="update" value="{$phrase.update_changes}" class="form" />
</form>
</td></tr></table>
