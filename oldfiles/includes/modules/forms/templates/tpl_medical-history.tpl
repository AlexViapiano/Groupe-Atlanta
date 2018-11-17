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
{section loop=4 name=i start=1}
{if $smarty.section.i.index !=2}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/if}
{/section}
<tr><td  class="contact">{if $current_language =='en'}Date of birth{else}Date of naissance{/if}</td><td  class="contact">{html_select_date name="sub_dob" prefix="dob" time=$smarty.post.sub_dob start_year="-80" display_days=true reverse_years=true} </td></tr>
{section loop=7 name=i start=4}
{if $smarty.section.i.index !=2}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/if}
{/section}
</table>
<br />
<h3>{$titles[1]}</h3>


<table width="100%" > 
  <tr>
    <td></td>
    <td width="25"><b>{$phrase.yes}</b></td>
    <td width="25"><b>{$phrase.no}</b></td>
    <td width="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="25"><b>{$phrase.yes}</b></td>
    <td width="25"><b>{$phrase.no}</b></td>
  <tr>
    <td>{$info[7]}</td>
    {$input[7]}
    <td>&nbsp;</td>
   	<td>{$info[32]}</td>
    {$input[32]}
  </tr>
  <tr>
    <td colspan="3">{$info[8]}</td>
    <td>&nbsp;</td>
   	<td>{$info[33]}</td>
    {$input[33]}
   </tr>
  <tr>
    <td rowspan="10">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%">&nbsp;</td>
        <td width="94%">{$input[8]}</td>
      </tr>
    </table>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>{$info[34]}</td>
    {$input[34]}
  </tr>
  {section loop=44 name=i start=35}
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>{$info[i]}</td>
    {$input[i]}
  </tr>
  {/section}
 {section loop=15 name=i start=9}
 {assign var=j value={$smarty.section.i.index+35}}
  <tr>
   	<td>{$info[i]}</td>
    {$input[i]}
    <td>&nbsp;</td>
   	<td>{$info[$j]}</td>
    {$input[$j]}
  </tr>
  {/section}
  <tr>
    <td>{$info[15]}</td>
    {$input[15]}
    <td>&nbsp;</td>
   	<td colspan="3">
    <strong>{if $current_language=='en'}Are you{else}&Ecirc;tes vous?{/if}</strong></td>
  </tr>
 {section loop=27 name=i start=16}
 {assign var=j value={$smarty.section.i.index+34}}
  <tr>
   	<td>{$info[i]}</td>
    {$input[i]}
    <td>&nbsp;</td>
   	<td>{$info[$j]}</td>
    {$input[$j]}</td>
  </tr>
  {/section}
 {section loop=32 name=i start=27}
  <tr>
   	<td>{$info[i]}</td>
    {$input[i]}
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  {/section}
 </table><br />
{section loop=63 name=i start=61}
{$info[i]}<br />{$input[i]}<br />
<br />
{/section}

<br />
<br />
<input type="hidden" name="do" value="{$do}" />
<input type="submit" value="{$button}"  style="font-size:14px">
</form>