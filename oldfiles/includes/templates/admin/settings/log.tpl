         <table width="100%">
            	<tr><td colspan="4"><strong>Pages Log</strong><br /><hr /></td></tr>
	            	<tr>
                    	<td class="setting_td"><strong>Date</strong></td>
                    	<td class="setting_td"><strong>Action</strong></td>
                    	<td class="setting_td"><strong>Message</strong></td>
                    	<td class="setting_td"><strong>User</strong></td>
                     </tr>
                     <tr><td colspan="4"><hr style="border:1px solid black" /></td></tr>
                {foreach  from=$logs item=log name=l}                     
                     <tr style="background:{if $smarty.foreach.l.index % 2 == 0}#ececec{else}#cecece{/if}">
                    	<td style="border-right:1px solid #000; padding-left:5px" class="setting_td">{$log.date|date_format:"%e/%b/%Y %H:%M"}</td>
                    	<td style="border-right:1px solid #000; padding-left:5px" class="setting_td">{$log.type}</td>
                    	<td style="border-right:1px solid #000; padding-left:5px" class="setting_td">{$log.msg}</td>
                    	<td class="setting_td">{$log.user}</td>
                     </tr>
                {/foreach}
         </table>
