{$form_script}
<div style="float:right; padding-right:20px; padding-top:20px">
<img src="includes/modules/forms/templates/siteseal_sf_3_h_l_m.gif" /><br /><br />
<br />
<img src="includes/modules/forms/templates/TRUSTe_Seal.gif" />
</div>
<h2>{$form_name}</h2>
{$mandetory}
<h3>{$titles[0]}</h3>
<form method="post" action="{$scriptpath}&lang={$current_language}">
<table>
<tr><td  class="contact">{$info[1]}</td><td  class="contact">{$input[1]}</td></tr>
<tr><td  class="contact">{if $current_language =='en'}Date of birth{else}Date de naissance{/if}</td><td  class="contact">{html_select_date name="sub_dob" prefix="dob" time=$smarty.post.sub_dob start_year="-80" display_days=true reverse_years=true} </td></tr>
{section loop=13 name=i start=2}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>{$titles[1]}</h3>
<table>
{section loop=18 name=i start=13}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>{$titles[2]}</h3>
<table>
{section loop=24 name=i start=18}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>{$titles[3]}</h3>
<table>
{section loop=28 name=i start=24}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>{$titles[4]}</h3>
<table>
{section loop=30 name=i start=28}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
<tr><td colspan="2" align="center"><br />

<input type="hidden" name="do" value="{$do}" />
<input type="submit" value="{$button}" style="font-size:14px"></td></tr>
</table>
</form>