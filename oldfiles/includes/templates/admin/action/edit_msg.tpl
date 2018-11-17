<strong>Edit Message</strong><br /><hr /><br />
 <form action="{$scriptpath}" method="post" >
		<input type="hidden" value="save_msg" name="do" />
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
        <input type="hidden" name="id" value="{$msg.id}" />
<div id="tabs-cms">
	<ul>
       {foreach  from=$languages item=lang name=langs}
			<li><a href="#tabs-cms-{$smarty.foreach.langs.index+1}">{$lang.title}</a></li>            
       {/foreach}
    </ul>
   {foreach  from=$languages item=lang name=langs}
   {assign var=name value="name_{$lang.id}"}
   <div id='tabs-cms-{$smarty.foreach.langs.index+1}'>
     <table>
       <tr><td width="70"><strong>Type</strong></td><td><strong>{$msg.type}</strong></td></tr>
       <tr><td width="70"><strong>Phrase</strong></td><td><strong>{$msg.phrase}</strong></td></tr>       
       <tr><td><strong>Message</strong></td><td><input type="text" value="{$msg.$name}" name="{$name}" size="150" /></td></tr>
       <tr><td></td><td style="text-align:center"><input type="submit" value=" Save Changes " /></td></tr>
     </table>
   </div>
  {/foreach}
</div> 
</form>