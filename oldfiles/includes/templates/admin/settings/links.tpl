       <strong>Add a new link</strong>
       <form action="{$scriptpath}" method="post" >
		<input type="hidden" value="add_link" name="do" />
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
  		<table>
          <tr><td width="100">Name</td><td><input type="text" name="name" size="50" />  {error_msg msg = $error_msg.name}</td></tr>
          <tr><td>Active</td><td><input type="checkbox" name="active" /></td></tr>
          <tr><td></td><td><input type="submit" value="Add" /></td></tr>
        </table><br />
		</form>
        {if empty($groups)}
                    No Links have been set!
                 {else}
         <table width="100%">
	            	<tr>
                    	<td class="setting_td"><strong>Id</strong></td>
                    	<td class="setting_td"><strong>Name</strong></td>
                    	<td class="setting_td"><strong>Active</strong></td>
                        <td class="setting_td">Action</td>
                     </tr>
                     <tr><td colspan="4"><hr style="border:1px solid black" /></td></tr>
                {foreach  from=$groups item=temp name=l}          
                   <form action="{$scriptpath}" method="post" >
						<input type="hidden" value="del_link" name="do" />
                        <input type="hidden" value="{$temp.id}" name="id" />
						<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />           
                     <tr style="background:{if $smarty.foreach.l.index % 2 == 0}#ececec{else}#cecece{/if}">
                    	<td style="border-right:1px solid #000; padding-left:5px" class="setting_td">{$temp.id}</td>
                    	<td style="border-right:1px solid #000; padding-left:5px" class="setting_td">{$temp.name}</td>
                    	<td style="border-right:1px solid #000; padding-left:5px" class="setting_td">{if $temp.active}Yes{else}No{/if}</td>
                        <td><input type="submit" name="edit_link" value="Edit"  style="font-size:10px;background:none"/> 
                        	<input type="submit" name="del" value="Del" onclick=" return confirm('Are you certain you want to delete this link? This action cannot be undone')"  style="font-size:10px;background:none"/></td>
                     </tr>
                   </form>
                {/foreach}
         </table>
                         {/if}
