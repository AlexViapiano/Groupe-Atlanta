{if $pages == -1}
   1
{/if}
{if $prev} <a href="{$prev}" class="pageResults">{$phrase.prev}</a>&nbsp; {/if}
{section name=info loop=$pages+1 start=1}
 {assign var=page value=`$smarty.section.info.index`}
 {if $pages == 1}
    {$pages}
 {else} 
    {if $smarty.get.page == $smarty.section.info.index}
		<strong>{$smarty.section.info.index}</strong>
    {else}
		<a href="{"$page_link"|sprintf:"$page"}"  class="pageResults">{$smarty.section.info.index}</a>&nbsp;
    {/if}
  {/if}
{/section}
{if $next} &nbsp;<a href="{$next}"  class="pageResults">{$phrase.next}</a> {/if}