{literal}
		<script type="text/javascript">
			$(function(){
				$('#meta_keywords').dialog({
					autoOpen: false,
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
				$('#meta_keywords_link').click(function(){
					$('#meta_keywords').dialog('open');
					return false;
				});

				$('#meta_descriptions').dialog({
					autoOpen: false,
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
				$('#meta_descriptions_link').click(function(){
					$('#meta_descriptions').dialog('open');
					return false;
				});

				$('#link_name').dialog({
					autoOpen: false,
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
				$('#link_name_link').click(function(){
					$('#link_name').dialog('open');
					return false;
				});

				$('#page_title').dialog({
					autoOpen: false,
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
				$('#page_title_link').click(function(){
					$('#page_title').dialog('open');
					return false;
				});
				
			});
		</script>
        {/literal}