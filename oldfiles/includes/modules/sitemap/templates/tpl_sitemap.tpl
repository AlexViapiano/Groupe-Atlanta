   {assign var=link value=link_`$current_language`}
   {assign var=path value=path_`$current_language`}   
         <div id="tabs-{$smarty.foreach.langs.index+1}">
         <table>
           	{include file="admin/action/sitemap.tpl" sitemap=$sitemap link=$link path=$path lang=$current_language start=1}
         </table>
         </div>
