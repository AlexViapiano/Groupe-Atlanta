{if $popup.msg}
	{include file="popup.tpl"}
{/if}
{if $ckeditor_selector}<div  class="clickable" ondblclick="window.location.href='{$_ROOT_URL}{$current_link}?page={$current_page.id}&amp;#page'" title="Double click to edit content" id="page">{/if}          
        	{capture name=page_content}
	        	{$static_page}
    	    {/capture}
            {if $content_before}
            	{$add_content}
            {/if}
            {if !$add_content_same}
			    {include file="admin/content_editor.tpl" content=$smarty.capture.page_content id=$current_page.id type=page }
            {/if}
            {if !$content_before}
            	{$add_content}
            {/if}            
{if $ckeditor_selector}</div>{/if}