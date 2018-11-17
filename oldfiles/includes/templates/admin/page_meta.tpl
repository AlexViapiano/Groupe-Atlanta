<table id="cms">
   <tr><td style="padding:5px; width:290px">
   					Meta Tags Keywords:</td>
       <td style="padding:5px">
				   	<textarea cols="115" rows="4" name="{$meta_keywords}">{if $smarty.post.$meta_keywords and !empty($smarty.post.$meta_keywords)}{$smarty.post.$meta_keywords}{else}{$data.$meta_keywords}{/if}</textarea></td></tr>
   <tr><td style="padding:5px">
   					Meta Tags Description:</td>
		<td style="padding:5px">
        			<textarea cols="115" rows="4" name="{$meta_descriptions}" >{if $smarty.post.$meta_descriptions and !empty($smarty.post.$meta_descriptions)}{$smarty.post.$meta_descriptions}{else}{$data.$meta_descriptions}{/if}</textarea></td></tr>
   <tr><td style="padding:5px">
				   	Link name:</td>
		<td style="padding:5px">
        			<input type="text" size="115" name="{$link}" value="{if $smarty.post.$link and !empty($smarty.post.$link)}{$smarty.post.$link}{else}{$data.$link}{/if}"/></td></tr>
   <tr><td style="padding:5px">Page Title:</td>
   		<td style="padding:5px"><input type="text" name="{$page_title}" size="115" value="{if $smarty.post.$page_title and !empty($smarty.post.$page_title)}{$smarty.post.$page_title}{else}{$data.$page_title}{/if}" /></td></tr>                                            
</table>
