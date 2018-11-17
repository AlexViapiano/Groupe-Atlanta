{assign var=spacer value=`$add_spacer``$spacer`}
{foreach from=$sitemap item=info name=found}
  <tr>
	<td class="table_padding_small">{$spacer}{$start}. <a href="{$info.$path}" title="Click to go to this page">{$info.$link}</a></td>
  </tr>
 {assign var=start value=`$start+1`}
  {if $info.children}
      {include file="admin/action/sitemap.tpl" sitemap=$info.children link=$link path=$path lang=$lang add_spacer='&nbsp;&nbsp;&nbsp;&nbsp;' spacer =$spacer start=$start scope=parent}
	  {assign var=start value=$smarty.foreach.found.total+$start}
  {/if}      
{/foreach}

