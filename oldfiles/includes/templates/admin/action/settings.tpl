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
			<li><a href="#tabs-cms-1">Website</a></li>            
			<li><a href="#tabs-cms-2">Captcha</a></li>                        
			<li><a href="#tabs-cms-3">Moderators</a></li>
			<li><a href="#tabs-cms-4">Log</a></li>
			<li><a href="#tabs-cms-5">Email Messages</a></li>            
			<li><a href="#tabs-cms-6">Phrases</a></li>
			<li><a href="#tabs-cms-7">Error Notifcations</a></li>            
    </ul>
         <div id="tabs-cms-1">
			{include file="admin/settings/website.tpl"}
         </div>
         <div id="tabs-cms-2">
			{include file="admin/settings/captcha.tpl"}
         </div>         
         <div id="tabs-cms-3">
			{include file="admin/settings/users.tpl"}
         </div> 
         <div id="tabs-cms-4">
			{include file="admin/settings/log.tpl"}         
		 </div>
         <div id="tabs-cms-5">
			{include file="admin/settings/edit_template.tpl" action="email_message" add_message="add a email message" arr_list=$email_msg type="type" name="subject"}
         </div>
         <div id="tabs-cms-6">
			{include file="admin/settings/edit_template.tpl" action="phrases" add_message="add a phrase" arr_list=$phrases name="name" type="phrase"}
         </div> 
         <div id="tabs-cms-7">
			{include file="admin/settings/edit_template.tpl" action="error_msg" add_message="add an error message" arr_list=$error_msgs name="name" type="phrase"}      
		 </div>            
</div>  
