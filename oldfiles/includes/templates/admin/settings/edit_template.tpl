<table cellpadding="10" cellspacing="10" width="100%">
    <tr class="setting_td">
       	<td><strong>Type</strong></td>
        {foreach from=$languages item=lang}
          <td><strong>{$lang.title}</strong></td>
        {/foreach}
        <td></td>
    </tr>
     	<tr><td colspan="4"><hr style="border:1px solid black" /></td></tr>
    {foreach from=$arr_list item=msg name=mod}
        <form action="{$scriptpath}" method="post" >
		<input type="hidden" value="edit_{$action}" name="do" />
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
        <input type="hidden" name="id" value="{$msg.id}" />
        <tr class="setting_td" style="background:{if $smarty.foreach.mod.index % 2 == 0}#ececec{else}#cecece{/if};">
          	<td style="border-right:1px solid #000; padding-left:5px">{$msg.$type}</td>
            {foreach from=$languages item=lang}
               {assign subject "{$name}_{$lang.id}"}
	            <td style="border-right:1px solid #000; padding-left:5px"><strong>{$msg.$subject}</strong></td>
            {/foreach}
            <td><input type="submit" value=" Edit " name="edit" style="font-size:10px;background:none" /></td>
        </tr>
        <tr height="5px">
          <td style="border-right:1px solid #000; padding-left:5px"></td>
          <td style="border-right:1px solid #000; padding-left:5px"></td>
          <td style="border-right:1px solid #000; padding-left:5px"></td>                    
          <td></td>
		</tr>
        </form>
     {/foreach}
</table>