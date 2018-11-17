{if $is_logged}
<table border="0" width="180">
<tr><td colspan="2" bgcolor="#ba997b" height="20" class="main_title">{$phrase.account_menu}</td></tr>
<tr>
    <td width="20"></td>
	<td align="left">
    	<li>	<a href="account/update_email" >{$phrase.login_information}</a></li>
        <li>	<a href="account/change_password" >{$phrase.change_password_information}</a></li>
        <li>    <a href="account/personal" >{$phrase.personal_information}</a></li>
        <li>    <a href="account/address" >{$phrase.address_information}</a></li>
        <li>    <a href="account/other" >{$phrase.other_information}</a></li>
     </td>
</tr>
</table>
{/if}