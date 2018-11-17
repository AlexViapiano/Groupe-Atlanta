<strong>Edit Event</strong><br /><hr /><br />
 <form action="{$scriptpath}" method="post" >
		<input type="hidden" value="update_event" name="do" />
		<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
        <input type="hidden" name="id" value="{$event.id}" />
<strong>Event Date</strong> {html_select_date prefix='date' time=$time start_year='-1' end_year='+3'}<br /><br />
<div id="tabs-cms">
	<ul>
       {foreach  from=$languages item=lang name=langs}
			<li><a href="#tabs-cms-{$smarty.foreach.langs.index+1}">{$lang.title}</a></li>            
       {/foreach}
    </ul>
   {foreach  from=$languages item=lang name=langs}
   {assign var=title value="title_{$lang.id}"}
   {assign var=desc value="desc_{$lang.id}"}   
   <div id='tabs-cms-{$smarty.foreach.langs.index+1}'>
     <table>
       <tr><td width="70"><strong>Title</strong></td><td><input type="text" name="{$title}" value="{$event.$title}" size="120" /></td></tr>       
       <tr><td><strong>Description</strong></td><td>{include file="admin/page_content.tpl" content = $event.$desc page_size = 200 id = $desc}</td></tr>
       <tr><td></td><td style="text-align:center"><input type="submit" value=" Save Changes " /></td></tr>
     </table>
   </div>
  {/foreach}
</div> 
</form>