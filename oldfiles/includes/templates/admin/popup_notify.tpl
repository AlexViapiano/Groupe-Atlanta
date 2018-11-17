<script type="text/javascript">
{literal}
	$(function(){
		{/literal}
			{include file="admin/dialog_script.tpl" id='popup_notify' autoopen = true}
		{literal}
	});
</script>
{/literal}

{capture assign=errors}
  {foreach from=$popup_notify item=error}
  	<strong>- {$error.title}</strong><br>{$error.body}<br><br>
  {/foreach}
{/capture}

{include file="admin/dialog_box.tpl" title='WARNING: Errors found!' content=$errors id='popup_notify'}