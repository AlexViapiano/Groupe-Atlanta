{if $undo_data.msg}
	<div style="text-align:center"><h2>Undo - {$undo_data.action}</h2></div><br />
	<form action="{$scriptpath}" method="post" name="undo_record" >
	<input type="hidden" value="undo" name="do" />
	<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
	<span style="font-size:16px"><strong>ATTENTION:</strong> {$undo_data.msg}</span><br /><br />
	<strong>Current URL:</strong> {$undo_data.url}<br />
	<strong>Last Modified By:</strong> {$undo_data.user}<br />
	<strong>Last Modified On:</strong> {$undo_data.date|date_format}
	<br /><br />
		Are you sure you want to continue? (<a href="javascript:void(0)" onclick="if (confirm('Are you certain?')) document.undo_record.submit(); return false;">Yes</a> 
		/ <a href="{$_BASE_URL}" title="Click No to cancel"> No</a>)
	</form>
{else}
	<div style="text-align:center"><h2>Undo - Not Possible</h2></div><br />
    Undo is not possible either because you just undid an action or no recent action has been recorded. Please note only actions on pages can be undone!
{/if}
