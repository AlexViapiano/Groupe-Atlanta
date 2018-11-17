<strong>Edit Email Message</strong><br /><hr /><br />
 <form action="{$scriptpath}" method="post" >
		<input type="hidden" value="save_email_msg" name="do" />
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
        <input type="hidden" name="id" value="{$email_msg.id}" />
<div id="tabs-cms">
	<ul>
       {foreach  from=$languages item=lang name=langs}
			<li><a href="#tabs-cms-{$smarty.foreach.langs.index+1}">{$lang.title}</a></li>            
       {/foreach}
    </ul>
   {foreach  from=$languages item=lang name=langs}
   {assign var=subject value="subject_{$lang.id}"}
   {assign var=message value="message_{$lang.id}"}   
   <div id='tabs-cms-{$smarty.foreach.langs.index+1}'>
     <table>
       <tr><td width="70"><strong>Subject</strong></td><td><input type="text" name="{$subject}" value="{$email_msg.$subject}" size="120" /></td></tr>
       <tr><td><strong>Message</strong></td><td>{include file="admin/page_content.tpl" content = $email_msg.$message page_size = 400 id = $message}</td></tr>
       <tr><td></td><td style="text-align:center"><input type="submit" value=" Save Changes " /></td></tr>
     </table>
   </div>
  {/foreach}
</div> 
</form>