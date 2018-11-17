<link rel="stylesheet" type="text/css" href="includes/templates/admin/css/admin_tools.css" media="all" />
<script src="includes/templates/admin/js/tabs.js" type="text/javascript"></script> 
<script src="includes/templates/admin/js/jscolor/jscolor.js" type="text/javascript"></script> 
{literal}  
		<script type="text/javascript">
			$(function(){
				// Tabs
				$('#tabs-cms').tabs();
				$('#tabs-msg').tabs();
	
				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});
				
			});
			$(document).ready(function() {
				$("#time").countdown({
				date: {/literal}'{$logout_time}'{literal},
				onChange: function( event, timer ){},
				onComplete: function( event ){
				$(window.location).attr('href', 'admin/logout.php');
				leadingZero: true});
			});			
		</script>
<script type="text/javascript" src="includes/scripts/core/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="includes/scripts/core/ckeditor/ckfinder/ckfinder.js"></script>
{/literal}

<div style="width:100%; background:#fff; z-index:90000; position:relative;overflow:hidden">
<div id="slide-panel"><!--SLIDE PANEL STARTS-->
    <div style="float:left; width:72px; padding-top:3px">
   <a href="http://www.divergencemarketing.com" title="Divergence Marketing" target="_new"> <img src="includes/templates/images/admin/logo_cp.png" /></a>
    </div> 
	<div style="width:870px;	border-right-width: 2px; 	border-left-width: 2px; 	border-right-style: solid;
	border-left-style: solid; 	border-right-color: #626262; border-left-color: #626262; background-color: #949494; border-bottom-width: 2px; 
	border-bottom-style: solid;	border-bottom-color: #626262; opacity: .8; float:right;-moz-border-bottom-left-radius: 6px;
    -webkit-border-bottom-left-radius: 6px;-moz-border-bottom-right-radius: 6px;
    -webkit-border-bottom-right-radius: 6px; ">
    <div style="float:right; padding-right:15px; height:30px; text-align:left; padding-top:10px">
       <span style="color:#fff"><img src="includes/templates/images/admin/user.png" />
       Welcome <span style="font-weight:bold">{$userinfo.firstname|capitalize} {$userinfo.lastname|capitalize}</span>
        <br />
		<small style="color:#ddd">Last login: {$userinfo.lastvisit|date_format}</small></span><br />
        <div style="padding-top:15px">
        	
			<a href="{$current_link}?action=intro"><img src="includes/templates/images/admin/help.png" title="Help" width="25" align="left" style="padding-right:10px"/></a>
            {if $userinfo.god}
				<a href="{$current_link}?action=template"><img src="includes/templates/images/admin/template.png" title="Template Managment" width="25" align="left" style="padding-right:10px" /></a>            
				<a href="{$current_link}?action=settings"><img src="includes/templates/images/admin/settings.png" title="Settings" width="25" align="left" style="padding-right:10px"  /></a>
            {/if}
            <a href="admin/logout.php"><img src="includes/templates/images/admin/logout.gif" title="Logout" width="25" align="left"/></a>
        </div>
    </div>
    <div style="width:700px;">
		<table width="100%"> <tr>
           <td>
            <div style="padding:5px; color:#fff">{$TIMENOW|date_format:"<strong>%A</strong>, %B %e, %Y"}</div>
            <div style="padding-left:5px; padding-top:10px; color:#fff">
            	<strong>Total Pages:</strong> {$total_pages}<br />
				<strong>Online Visitors:</strong> {$online_visitors}<br />
				<strong>Default Language:</strong> {$default_lang.title}                
			</div>
        </td>
		<td width="10"></td>	
        <td style="border-right:groove; "></td>
        <td width="10"></td>
        <td>
        <div class="slide"><span class="btn-slide">Tools</span></div>
            <div style="padding-left:5px; padding-top:10px">
            	<a href="{$current_link}?action=undo" class="button {if $smarty.get.action == 'undo'}active{/if}">Undo Action</a>  
                <a href="{$current_link}?action=maintenance" class="button {if $smarty.get.action == 'maintenance'}active{/if}">{if $maintenance.enable}Open{else}Close{/if} Site</a>  
                {if $userinfo.god}
	                <a href="structure" class="button" target="new">Site Map</a>
                {/if}
               	<a href="{$current_link}?action=404" class="button {if $smarty.get.action == '404'}active{/if}">404 Page</a>  
			</div>
        </td>
        		<td width="10"></td>	
        <td style="border-right:groove; "></td>
        <td width="10"></td>        
     <td>
            <div class="slide"><span class="btn-slide">Page Managment</span></div>
            <div style="padding-left:5px; padding-top:10px">
			<a href="{$current_link}?page_add" class="button {if isset($smarty.get.page_add)}active{/if}">Add Page</a>
			<a href="{$current_link}?page={$current_page.id}" class="button {if $smarty.get.page && $smarty.get.action != 'move'}active{/if}">Edit Page</a>
			<a href="{$current_link}?action=move&page={$current_page.id}" class="button {if $smarty.get.action == 'move'}active{/if}">Move Page</a>
			<a href="{$current_link}?action=del&parent={$current_page.id}" class="button {if $smarty.get.action == 'del'}active{/if}">Del Page</a>
			<a href="{$current_link}?action=index" class="button {if $smarty.get.action == 'index'}active{/if}">Index Page</a>   
            </div>                   
		</td>
        		<td width="10"></td>	
        <td style="border-right:groove; "></td>
        <td width="10"></td>
        </tr></table>
        </div>
	 </div>
</div><!--SLIDE PANEL ENDS--> 
<p id="time" class="time"></p> 
</div>