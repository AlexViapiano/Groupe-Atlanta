<div style="text-align:center"><h2>Index Page (Sitemap)</h2></div>
<div id="tabs-cms">
	<ul>
       {foreach  from=$languages item=lang name=langs}
			<li><a href="#tabs-cms-{$smarty.foreach.langs.index+1}">{$lang.title}</a></li>            
       {/foreach}
    </ul>
   {foreach  from=$languages item=lang name=langs}
   {assign var=link value="link_{$lang.id}"}
   {assign var=path value="path_{$lang.id}"}
   {assign var=this_body value="body_{$lang.id}"}
   {assign var=this_keywords value="meta_keywords_{$lang.id}"}
   {assign var=this_description value="meta_descriptions_{$lang.id}"}         
         <div id="tabs-cms-{$smarty.foreach.langs.index+1}">
         <table width="100%">
            <tr>
            	<td class="table_padding_small"><strong>Link Name</strong></td>
                {if $userinfo.god}
	            	<td class="table_padding_small" align="right"><strong>Content</strong></td>                
    	        	<td class="table_padding_small" align="right"><strong>Meta Keywords</strong></td>                
        	    	<td class="table_padding_small" align="right"><strong>Meta Description</strong></td>             
                {/if}   
            </tr>
           	{include file="admin/action/sitemap.tpl" sitemap=$sitemap link=$link path=$path lang=$lang.id start=1}
         </table>
         </div>
   {/foreach}
</div>  
