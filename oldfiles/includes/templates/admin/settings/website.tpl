         <form method="post" action="{$scriptpath}">
         <table>
            	<tr><td colspan="2"><strong>Default Settings</strong><br /><hr /></td></tr>
                {foreach  from=$languages item=lang name=langs}
                    {assign website_name "website_name_{$lang.id}"}
	            	<tr><td width="250" class="setting_td"><strong>Website Name - {$lang.title}</strong></td><td>
                    	 <input type="text" name="{$website_name}" size="50" value="{$options.$website_name}" />
                    	{$error_msg.$website_name}</td></tr>
                {/foreach}
            	<tr><td class="setting_td"><strong>Email Contact</strong></td><td><input type="text" name="email_contact"size="50" value="{$options.email_contact}" /> {error_msg msg = $error_msg.email_contact}</td></tr>
            	<tr><td class="setting_td"><strong>CMS Timeout <small>(in minutes)</small></strong></td><td><input type="text" name="cookietimeout" size="5" value="{$options.cookietimeout/60}" /> {error_msg msg = $error_msg.cookietimeout}</td></tr>                
            	<tr><td class="setting_td"><strong>Password Reset Delay <small>(in hours)</small></strong></td><td><input type="text" name="change_password_timeout" size="5" value="{$options.change_password_timeout}" /> {error_msg msg = $error_msg.change_password_timeout}</td></tr>
                <tr><td height="20" class="setting_td"></td><td><input type="submit" value=" Update " /></td></tr>
            	<tr><td class="setting_td" colspan="2"><strong>Languages</strong><br /><hr /></td></tr>                
            	<tr><td class="setting_td"><strong>Default Language</strong></td><td>{$default_language}  {error_msg msg = $error_msg.default_language}</td></tr> 
                {foreach  from=$all_languages item=lang name=langs}
	            	<tr><td class="setting_td"><strong>{$lang.title}</strong></td><td><input type="checkbox" name="lang_enable_{$lang.id}" {if $lang.status} checked="checked"{/if} {if $lang.id == $options.default_language} disabled="disabled"
                    	title="You must set another language as default before unchecking the current one"{/if}/></td></tr>                 
                {/foreach}               
                <tr><td height="20" class="setting_td"></td><td><input type="submit" value=" Update " /></td></tr>                
         </table>
         <input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
         <input type='hidden' name='do' value='update_website' />         
         </form>