       <strong>Edit link</strong>
       <form action="{$scriptpath}" method="post" >
		<input type="hidden" value="edit_link" name="do" />
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
  		<table>
          <tr><td width="100">Name</td><td><input type="text" name="name" size="50" value="{$group.name}" />  {error_msg msg = $error_msg.name}</td></tr>
          <tr><td>Active</td><td><input type="checkbox" name="active" {if $group.active} checked="checked"{/if} /></td></tr>
          <tr><td></td><td><input type="submit" value="Update" /></td></tr>
        </table><br />
		</form>
