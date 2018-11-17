{assign var=spacer value="{$add_spacer}{$spacer}"}
{foreach from=$sitemap item=info name=found}
  <tr>
	<td class="table_padding_small">{$spacer}{$start}. <a href="{$info.$path}?lang={$lang}" title="Click to go to this page">{$info.$link}</a></td>
    {if $userinfo.god}
		<td class="table_padding_small" align="right">{word_count content=$info.$this_body}</td>
		<td class="table_padding_small" align="right">{word_count content=$info.$this_keywords}</td>
		<td class="table_padding_small" align="right">{word_count content=$info.$this_description}</td>            
    {/if}
  </tr>
 {assign var=start value="{$start+1}"}
  {if $info.children}
      {include file="admin/action/sitemap.tpl" sitemap=$info.children link=$link path=$path lang=$lang add_spacer='&nbsp;&nbsp;&nbsp;&nbsp;' spacer =$spacer start=$start}
	  {assign var=start value=$smarty.foreach.found.total+$start}
  {/if}      
{/foreach}

