{literal}
<style type="text/css">
td.setting_td
{
	height:15px;
	padding:5px;
}
</style>
{/literal}
<div style="text-align:center"><h2>Site Settings</h2></div>
<div id="tabs-cms">
	<ul>
			<li><a href="#tabs-cms-1">Links</a></li>            
			<li><a href="#tabs-cms-2">Blocks</a></li>                        
    </ul>
         <div id="tabs-cms-1">
			{include file="admin/settings/links.tpl"}
         </div>
         <div id="tabs-cms-2">
			{include file="admin/settings/captcha.tpl"}
         </div>         
</div>  
