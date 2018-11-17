<div style="text-align:center"><h2>Move Page: {$current_page.$link}</h2></div>
{if $current_page.home}
    <span class="panel_title">You cannot move the home page, to do so please set another page as the home page before trying to move this page</span>
{else}
{literal}
<script type="text/javascript">
	$(function(){
		{/literal}
			{include file="admin/dialog_script.tpl" id='page_pos'}
			{include file="admin/dialog_script.tpl" id='pages_affected'}					
			{include file="admin/dialog_script.tpl" id='source_page'}
			{include file="admin/dialog_script.tpl" id='destination_page'}
		{literal}
	});
</script>
{/literal}
<form action="{$scriptpath}" method="post" name="delete_page">
<input type="hidden" value="move_page" name="do" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
<table>
<tr>
  <td class="table_padding">{include file="admin/help_img.tpl" id='source_page'} Select page you want to move</td><td class="table_padding">{$source_page}</td>
</tr>
<tr>
  <td class="table_padding">{include file="admin/help_img.tpl" id='destination_page'} Select destination</td><td class="table_padding">{$destination_page}</td>
</tr>
<tr>
  <td class="table_padding">{include file="admin/help_img.tpl" id='pages_affected'} Pages affected</td><td class="table_padding">{$sub_pages_found}</td>
</tr>
{if $sub_pages_found}
<tr>
  <td class="table_padding">
	<table>
	<tr>
	  <td class="table_padding">List</td>
		{foreach from=$languages item=lang}  
		  <td class="table_padding"><strong>Link name - {$lang.title}</strong></td>
	    {/foreach}
	</tr>
	{foreach from=$sub_pages item=page name=info}
    <tr>
	  <td class="table_padding">{$smarty.foreach.info.index+1}</td>
	  {foreach from=$languages item=lang}
      {assign var=name value="link_{$lang.id}"}
	     <td class="table_padding">{$page.$name}</td>
      {/foreach}
     </tr>
	{/foreach}
	</table>
    </td>
</tr>    
{/if}
</table>

Are you sure you want to continue? (<a href="javascript:void(0)" title="Click Yes to delete this page and all sub pages related" onclick="if (confirm('Are you certain?')) document.delete_page.submit(); return false;">Yes</a> 
/ <a href="{$_BASE_URL}" title="Click No to cancel"> No</a>)
</form>
{include file="admin/dialog_box.tpl" title='Current page position' content = 'Your current page location.' id='page_pos'}
{include file="admin/dialog_box.tpl" title='Pages affected' content = 'Child pages that will be also moved in the process.' id='pages_affected'}
{include file="admin/dialog_box.tpl" title='Page to move' content = 'Select the page you would like to move, all child pages will also be moved.' id='source_page'}
{include file="admin/dialog_box.tpl" title='Parent Page' content = 'The destination page will be the new parent.' id='destination_page'}
{/if}