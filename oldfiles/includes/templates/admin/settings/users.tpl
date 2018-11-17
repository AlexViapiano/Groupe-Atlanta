         <table cellpadding="10" cellspacing="10" width="100%">
            	<tr><td colspan="8"><strong>Moderators</strong> - <small><a href="{$current_link}?action=add_user" title="Click to add a new moderator">(Add moderator)</a></small><br /><br /></td></tr>
                <tr class="setting_td">
                	<td width="20"><strong>Id</strong></td>
                    <td><strong>First name</strong></td>
                    <td><strong>Last name</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Is God</strong></td>
                    <td><strong>Last Activity</strong></td>
                    <td><strong>Last Visit</strong></td>
                    <td colspan="3"></td>
                </tr>
                <tr><td colspan="8"><hr style="border:1px solid black" /></td></tr>                
                {foreach from=$users item=user name=mod}
                <form action="{$scriptpath}" method="post" >
				<input type="hidden" value="user" name="do" />
				<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
                <input type="hidden" name="userid" value="{$user.userid}" />
                <tr class="setting_td" style="background:{if $smarty.foreach.mod.index % 2 == 0}#ececec{else}#cecece{/if}">
                	<td style="border-right:1px solid #000; padding-left:5px" >{$user.userid}</td>
                    <td style="border-right:1px solid #000; padding-left:5px" >{$user.firstname}</td>
                    <td style="border-right:1px solid #000; padding-left:5px" >{$user.lastname}</td>
                    <td style="border-right:1px solid #000; padding-left:5px" >{$user.email}</td>
                    <td style="border-right:1px solid #000; padding-left:5px" >{if $user.god}Yes{else}No{/if}</td>
                    <td style="border-right:1px solid #000; padding-left:5px" >{$user.lastactivity|date_format:"%e/%b/%Y %H:%M:%p"}</td>
                    <td style="border-right:1px solid #000; padding-left:5px" >{$user.lastvisit|date_format:"%e/%b/%Y %H:%M:%p"}</td>
                    <td ><input type="submit" value=" Reset Password " name="reset_password" 
                    		onclick="return confirm('You are about reset the login password of {$user.firstname|upper} {$user.lastname|upper}, an email with instructions will be sent to {$user.email}.
                             Are you sure you want to continue?')"  style="font-size:10px;background:none"/> 
                    	<input type="submit" value=" Edit " name="edit_user" style="font-size:10px;background:none" /> 
                        <input type="submit" value=" Del " name="del_user" {if $user.god} disabled="disabled" title="You cannot delete a GOD user" {else}  
                        		onclick=" return confirm('Are you certain you want to delete the user {$user.firstname|upper} {$user.lastname|upper}? This action cannot be undone')"{/if}  style="font-size:10px;background:none"/>
                    </td>
                </tr>
                </form>
                {/foreach}
         </table>