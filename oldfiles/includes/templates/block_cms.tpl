<div {if $ckeditor_selector} class="clickable" ondblclick="window.location.href='{$_ROOT_URL}{$current_link}?block={$block.id}&amp;#{$block.name}'" title="Double click to edit content"{/if} id="{$block.name}">            
    {include file="admin/content_editor.tpl" content=$block.$body id=$block.id data=$block type=block}             
</div>