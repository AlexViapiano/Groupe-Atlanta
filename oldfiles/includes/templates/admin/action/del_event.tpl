<form action="{$scriptpath}" method="post" name="delete_event">
<input type="hidden" value="del_event" name="do" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
<div style="text-align:center"><h2>Delete Event: {$event.$title}</h2></div>
<br /><br />
Are you sure you want to delete this event? (<a href="javascript:void(0)" title="Click Yes to delete this event" onclick="if (confirm('Are you certain?')) document.delete_event.submit(); return false;">Yes</a> 
/ <a href="{$_BASE_URL}" title="Click No to cancel"> No</a>)
</form>