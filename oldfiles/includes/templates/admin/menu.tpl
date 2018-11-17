
<body  class="navbody">
  	<script type="text/javascript" src="../includes/scripts/menu.js"></script>
    
    <div style="width:160px; padding: 4px">
	<div align="center"><img src="http://www.divergencemarketing.com/includes/templates/images/logo.png" alt="Divergence Marketing" title="Divergence Marketing &copy;2011" border="0" width="150" /><br>
<br><a href="home.php" target="body">CMS Menu</a></div><div align="center">
			<a href="#" onClick="expand_all_groups(1, '../{$path_img}'); return false;" target="_self">Expand All</a>
			|
			<a href="#" onClick="expand_all_groups(0, '../{$path_img}'); return false;" target="_self">Collapse All</a>
	</div>
    <div style="margin-bottom:12px"></div>
            
	{foreach from=$menu key=module item=links name=info}
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="navtitle" onDblClick="toggle_group('menu_{$smarty.foreach.info.index+1}'); return false;">
		  <tr>
		    <td><strong>{$module}</strong></td>
            <td align="right"> 
            	<a  href="#" onClick="toggle_group('menu_{$smarty.foreach.info.index+1}', '../{$path_img}'); return false;">
            	<img src="../{$path_img}/admin/cp_collapse.gif" title="Expand Group" id="button_menu_{$smarty.foreach.info.index+1}" border="0" />
                </a>
            </td>
		  </tr>
    	</table>          
         <div id="group_menu_{$smarty.foreach.info.index+1}" class="navgroup" style="display:none">
			{section name=option loop=$links}
        		<div class="navlink-normal" onMouseOver="this.className='navlink-hover';" onMouseOut="this.className='navlink-normal'">
                	<a href="{$links[option].file}" target="body">{$links[option].name}</a>
                </div>
            {/section}        
         </div>
    {/foreach}
	 <div style="margin-bottom:12px"></div>    
   </div>
</body>