<div style="text-align:center"><h2>Order links for: {$parent_name}</h2></div>
<form action="{$scriptpath}" method="post">
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
<input type="hidden" value="order_links" name="do" />
<table>
<tr>
  <td class="table_padding">Order</td>
	{foreach from=$languages item=lang}  
	  <td class="table_padding">Link name - {$lang.title}</td>
    {/foreach}
    {if $parent_root}
   	  <td class="table_padding">Active in header</td>
   	  <td class="table_padding">Home page</td>      
    {/if}
</tr>
{foreach from=$links item=link name=info_links}
   <tr>
	  <td class="table_padding"><input type="text" name="link_{$link.id}" value="{$link.sort}" /></td>
	  {foreach from=$languages item=lang}
      {assign var=name value="link_{$lang.id}"}
	     <td class="table_padding">{$link.$name}</td>
      {/foreach}
     {if $parent_root}
    	  <td class="table_padding">{if $link.active_header}Yes{else}No{/if}</td>
    	  <td class="table_padding">{if $link.home}Yes{else}No{/if}</td>
     {/if}
   </tr>
{/foreach}
   <tr>
     <td align="center" style="text-align:center" colspan="{$max_cols}"><br /><input type="submit" name="save" value=" Update Changes " /></td>
   </tr>
</table>
</form>
