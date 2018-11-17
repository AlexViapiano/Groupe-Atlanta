<textarea id="{$id}" name="{$id}">{if $smarty.post.$id and !empty($smarty.post.$id)} {htmlspecialchars content=$smarty.post.$id} {else} {htmlspecialchars content=$content} {/if}</textarea>
<script type="text/javascript">	
	var editor = CKEDITOR.replace('{$id}',

   {literal} {height : {/literal}{$page_size}{literal}}); 	{/literal}
   CKFinder.setupCKEditor( editor, '{$add_dir}/includes/scripts/core/ckeditor/ckfinder/' ) ;
</script> 