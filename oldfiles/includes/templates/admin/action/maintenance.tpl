<div style="text-align:center"><h2>Website Maintenance</h2></div>
<form action="{$scriptpath}" method="post" >
<input type="hidden" value="maintenance" name="do" />
<input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
	<h2><strong>Website Maintenance Message</strong></h2>
<hr />
<div id="tabs-cms">
		<ul>
            {foreach $languages as $lang}
			<li><a href="#tabs-cms-{($lang@index)+1}">{$lang.title}</a></li>
            {/foreach}
		</ul>  
        {foreach $languages as $lang}  
        {assign body "body_{$lang.id}"}         
        <div id="tabs-cms-{$lang@index+1}">
           	{include file="admin/page_content.tpl" content = $maintenance.$body page_size = 200 id = $body}
        </div>
        {/foreach}
</div> <br />
Activate message and close website for visitors: <input type="checkbox" name="enable" {if $maintenance.enable || $smarty.post.enable == 'on'} checked="checked"{/if} /><br /><br />
<input type="submit" {if $maintenance.enable}value=" Open Website for Public View "{else}value=" Close Website for Public View "{/if} />
</form>
{if $popup_notify}
  {include file="admin/popup_notify.tpl"}
{/if}