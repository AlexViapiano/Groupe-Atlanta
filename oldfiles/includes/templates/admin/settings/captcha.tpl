         <form method="post" action="{$scriptpath}">
         <table>
            	<tr><td colspan="2"><strong>Dimensions</strong><br /><hr /></td></tr>
            	<tr><td width="250" class="setting_td"><strong>Width</strong></td><td><input type="text" name="{$website_name}" size="5" value="{$options.$website_name}" />{error_msg msg = $error_msg.$website_name}</td></tr>
            	<tr><td class="setting_td"><strong>Height</strong></td><td><input type="text" name="{$website_name}" size="5" value="{$options.$website_name}" />{error_msg msg = $error_msg.$website_name}</td></tr>                
            	<tr><td colspan="2"><strong>Colors</strong><br /><hr /></td></tr>
            	<tr><td class="setting_td"><strong>Background color</strong></td><td><input type="text" name="{$website_name}" size="10" class="color" />{error_msg msg = $error_msg.$website_name}</td></tr>
            	<tr><td class="setting_td"><strong>Text color</strong></td><td><input type="text" name="{$website_name}" size="10" class="color" />{error_msg msg = $error_msg.$website_name}</td></tr>
                <tr><td class="setting_td"><strong>Line color</strong></td><td><input type="text" name="{$website_name}" size="10" class="color" />{error_msg msg = $error_msg.$website_name}</td></tr>  
                <tr><td colspan="2"><strong>Visual</strong><br /><hr /></td></tr>
            	<tr><td class="setting_td"><strong>Perturbation (between 0 and 1)</strong></td><td><input type="text" name="{$website_name}" size="5" value="{$options.$website_name}" />{error_msg msg = $error_msg.$website_name}</td></tr>
            	<tr><td class="setting_td"><strong>Transparency (in %)</strong></td><td><input type="text" name="{$website_name}" size="5" value="{$options.$website_name}" />{error_msg msg = $error_msg.$website_name}</td></tr>
                <tr><td class="setting_td"><strong>Number of lines</strong></td><td><input type="text" name="{$website_name}" size="5" value="{$options.$website_name}" />{error_msg msg = $error_msg.$website_name}</td></tr>               
                <tr><td height="20" class="setting_td"></td><td><input type="submit" value=" Update " /></td></tr>                
         </table>
         <input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
         <input type='hidden' name='do' value='update_website' />         
         </form>