{literal}

				$('#{/literal}{$id}{literal}').dialog({
					autoOpen: {/literal}{if $autoopen}true{else}false{/if}{literal},
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				$('#{/literal}{$id}{literal}_link').click(function(){
					$('#{/literal}{$id}{literal}').dialog('open');
					return false;
				});
{/literal}                