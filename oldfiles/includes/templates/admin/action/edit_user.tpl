<div style="text-align:center"><h2>Edit User</h2></div>
<table cellpadding="10" cellspacing="10">
<form action="{$scriptpath}" method="post" >
<input type="hidden" value="update_user" name="do" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
	<tr><td colspan="8"><strong>Edit Moderator</strong><br /><hr /></td></tr>
	<tr><class="setting_td"><td><strong>First Name</strong></td><td><input type="text" value="{$user.firstname}" name="firstname" size="60" /> {error_msg msg = $error_msg.firstname}</td></tr>
	<tr><class="setting_td"><td><strong>Last Name</strong></td><td><input type="text" value="{$user.lastname}" name="lastname" size="60" /> {error_msg msg = $error_msg.lastname}</td></tr>
	<tr><td><strong>Email Address</strong></td><td><input type="text" value="{$user.email}" name="email" size="60" /> {error_msg msg = $error_msg.email}</td></tr>
	<tr><td><strong>Access Level</strong></td><td>{$usergroupid} {if $user.god}<input type="hidden" name="usergroupid" value="{$user.usergroupid}" />{/if}</td></tr>
    <tr><td><strong>Is God</strong></td><td><input type="text" value="{if $user.god}Yes{else}No{/if}" disabled="disabled" /></td></tr>
    <tr><td></td><td><input type="submit" name="update" value=" Update " /></td></tr>    
</form>
</table>
