<h2>{$form_name}</h2>
{$mandetory}
<h3>{$titles[0]}</h3>
<form method="post" action="{$scriptpath}">
<table>
<tr><td  class="contact">{$info[1]}</td><td  class="contact">{$input[1]}</td></tr>
{if $current_language == 'en'}
	<tr><td  class="contact">{$info[2]}</td><td  class="contact">{$input[2]}</td></tr>
{/if}
<tr><td  class="contact">{$info[3]}</td><td  class="contact">{$input[3]}</td></tr>
</table>
<h3>{$titles[1]}</h3>
<table>
{section loop=9 name=i start=4}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
<tr><td  class="contact">{if $current_language =='en'}Date of birth{else}Date of naissance{/if}</td><td  class="contact">{html_select_date name="sub_dob1" prefix="dob" time=$smarty.post.sub_dob start_year="-80" display_days=true reverse_years=true} </td></tr>
{section loop=14 name=i start=9}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>

<h3>{$titles[2]}</h3>
<table>
{section loop=19 name=i start=14}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
<tr><td  class="contact">{if $current_language =='en'}Date of birth{else}Date of naissance{/if}</td><td  class="contact">{html_select_date name="sub_dob2" prefix="dob" time=$smarty.post.sub_dob start_year="-80" display_days=true reverse_years=true} </td></tr>
{section loop=24 name=i start=19}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<input type="hidden" name="do" value="{$do}" />
<input type="submit" value="{$button}">
</form>