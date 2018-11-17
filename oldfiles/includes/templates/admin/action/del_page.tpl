<form action="{$scriptpath}" method="post" name="delete_page">
<input type="hidden" value="del_page" name="do" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
<div style="text-align:center"><h2>Delete Page: {$current_page.$link}</h2></div>
{if $current_page.home}
  <span class="panel_title">You are about to delete the home page!</span><br />
  Please selected the page you would like to set as the new home page from the list: {$homepage_select}
  <br /><br />
{/if}
<br />
{if $pages_found}
Sub pages found: {$pages_found}
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
{else}
No sub pages found!
{/if}
<br /><br />
<span class="panel_title">{if $pages_found}The following pages will also be deleted and any additional pages related to these pages! THIS ACTION CANNOT BE UNDONE! {/if}</span> <br /><br />
Are you sure you want to continue? (<a href="javascript:void(0)" title="Click Yes to delete this page and all sub pages related" onclick="if (confirm('Are you certain?')) document.delete_page.submit(); return false;">Yes</a> 
/ <a href="{$_BASE_URL}" title="Click No to cancel"> No</a>)
</form>