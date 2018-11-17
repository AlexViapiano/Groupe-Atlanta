<div style="text-align:center"><h2>Add Moderator</h2></div>
<table cellpadding="10" cellspacing="10">
<form action="{$scriptpath}" method="post" >
<input type="hidden" value="add_user" name="do" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
	<tr><td colspan="8"><strong>Add Moderator</strong><br /><hr /></td></tr>
	<tr><td class="setting_td"><strong>First Name</strong></td><td><input type="text" value="{$smarty.post.firstname}" name="firstname" size="60" /> {error_msg msg = $error_msg.firstname}</td></tr>
	<tr><td class="setting_td"><strong>Last Name</strong></td><td><input type="text" value="{$smarty.post.lastname}" name="lastname" size="60" /> {error_msg msg = $error_msg.lastname}</td></tr>
	<tr><td class="setting_td"><strong>Email Address</strong></td><td><input type="text" value="{$smarty.post.email}" name="email" size="60" /> {error_msg msg = $error_msg.email}</td></tr>
	<tr><td class="setting_td"><strong>Access Level</strong></td><td>{$usergroupid}</td></tr>
    <tr><td></td><td><input type="submit" name="update" value=" Update " onclick="return confirm('You are about to add a new moderator, by clicking OK, an email will be sent to the user with instructions to setup his password');" /></td></tr>    
</form>
</table>
