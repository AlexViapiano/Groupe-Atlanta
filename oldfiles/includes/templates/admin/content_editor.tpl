  {capture assign=page_content}
  	{if $page_editor and $id == $pageid and $type == 'page'}
           {assign var='found' value=true}
   		   <input type="hidden" name="do" value="save_page" />
           <div id="tabs-cms">
				<h2>Edit Page: <strong>{$current_page.$link}</strong></h2>
				<ul>
					<li><a href="#tabs-cms-1">Edit Page</a></li>
					<li><a href="#tabs-cms-2">Meta Tags</a></li>
					<li><a href="#tabs-cms-3">Page Options</a></li>
                    {if $multilingual}
					<li><a href="#tabs-cms-4" onclick="if (confirm('Any unsaved information will be lost! Continue?')) window.location.href='{$lang_link}?lang={$lang_change_link}&page={$id}'; return false;" 
                    		title="Make sure you have saved your changes before changing to a different language!">
                    		{if $current_language == 'en'}
			                    Version Fran&ccedil;aise
            				{else}
				                English Version
				            {/if} 
                           </a>
                    </li>
                    {/if}       
				</ul>             
                <div id="tabs-cms-1">
                	{include file="admin/page_content.tpl" content = $content page_size = $height|default:800 id = "body_{$current_language}"}
                </div>
				<div id="tabs-cms-2">
                	{include file="admin/page_meta.tpl" data = $current_page lang = $current_language}
				</div>
				<div id="tabs-cms-3">     
                	{include file="admin/page_options.tpl" data = $current_page}
                </div>
               {if $multilingual}
				<div id="tabs-cms-4">     
                	Go to the Edit Page and save your changes before going to another language.
                </div>                
                {/if}
		</div>            
  	{elseif $page_add and $smarty.get.page == 'add' and $type == 'page'}
           {assign var='found' value=true} 
  			<input type="hidden" name="do" value="add_page" />
            <div id="tabs-cms">
            <h2> Add New Page</h2>
				<ul>
    	        {foreach  from=$languages item=lang name=langs}
					<li><a href="#tabs-cms-{$smarty.foreach.langs.index+1}">{$lang.title}</a></li>            
        	    {/foreach}
				<li><a href="#tabs-cms-3">Page Options</a></li>                 
                </ul>
    	        {foreach  from=$languages item=lang name=langs}
                {assign var=page_id value="body_{$lang.id}"}
                <div id='tabs-cms-{$smarty.foreach.langs.index+1}'>
                	{include file="admin/page_meta.tpl" lang = $lang.id}   
                	{include file="admin/page_content.tpl" content=$smarty.post.$page_id page_size = $height|default:500 id = $page_id}                                     
                </div>
                {/foreach}
				<div id="tabs-cms-3">     
                	{include file="admin/page_options.tpl" data = $current_page}
                </div>                      
            </div>     
  	{elseif $block_editor and $id == $smarty.get.block and $type == 'block'}
           {assign var='found' value=true}
    	   Edit: <strong>Block</strong>                
  			<input type="hidden" name="do" value="save_block" />
  			<input type="hidden" name="id" value="{$id}" />            
            <div id="tabs-cms">
				<ul>
    	        {foreach  from=$languages item=lang name=langs}
					<li><a href="#tabs-cms-{$smarty.foreach.langs.index+1}">{$lang.title}</a></li>            
        	    {/foreach}
                </ul>
    	        {foreach  from=$languages item=lang name=langs}
                {assign var=block_content value="body_{$lang.id}"}
                <div id="tabs-cms-{$smarty.foreach.langs.index+1}">
                	{include file="admin/page_content.tpl" content = $data.$block_content page_size = $height|default:250 id = $block_content type='block'}                
                </div>
                {/foreach}
            </div>       
  	{/if}
    {/capture}
    {if $found and $enable_ckeditor and $ckeditor_visible and $type==$ckeditor_type}
    <div style="z-index:1000; overflow:visible">
      <form method="post" action="{$scriptpath}">
	  <input type='hidden' name='securitytoken' value='{$userinfo.securitytoken}' />
      <div style="text-align:right"> 
           <input type="submit" name="cancel" value="Cancel" style="background:none; border:none; color:#666" /> &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="submit" name="save" value="Save" style="background:none; border:none; color:#666" />
      </div>
        {$page_content}
      <div style="text-align:right"> 
           <input type="submit" name="cancel" value="Cancel"style="background:none; border:none; color:#666" /> &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="submit" name="save" value="Save" style="background:none; border:none; color:#666" />
      </div>
   	  </form>
      </div>
	   {if $popup_notify}
    	  {include file="admin/popup_notify.tpl"}
	   {/if}
	{else}
		{$content}
	{/if}