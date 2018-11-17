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
{section loop=8 name=i start=1}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>{$titles[1]}</h3>
<table> 
<tr><td></td><td width="25"><b>{$phrase.yes}</b></td><td width="25"><b>{$phrase.no}</b></td></tr>
{section loop=32 name=i start=8}
<tr><td width="400">{$info[i]}</td>{$input[i]}</tr>
{/section}

</table><br />
<h3>{$titles[2]}</h3>
  <table>
    <tr><td colspan="3">
    {if $current_language == 'en'}If you are wearing a partial or complete artificial denture, please complete the following :{else}Si vous portez une prothèse dentaire partielle ou complète, remplissez ce qui suit :{/if}</td></tr>
    <tr><td width="25"><b>{$phrase.yes}</b></td><td width="25"><b>{$phrase.no}</b></td><td></td></tr>
    <tr>{$input[32]}<td>{$info[32]} {$info[33]} {$input[33]}</td></tr>
    <tr>{$input[34]}<td>{$info[34]} {$info[35]} {$input[35]}</td></tr>
    <tr>{$input[36]}<td>{$info[36]} {$info[37]} {$input[37]}</td></tr>
    <tr>{$input[38]}<td>{$info[38]} {$info[39]} {$input[39]}</td></tr>    
    <tr>{$input[40]}<td>{$info[40]} {$info[41]} {$input[41]}</td></tr>        
  </table><br />

  <table>
	<tr><td  class="contact">{$info[42]}</td><td  class="contact">{$input[42]}</td></tr>
	<tr><td  class="contact">{$info[43]}</td><td  class="contact">{$input[43]}</td></tr>    
  </table>

 <br /> {$info[44]}<br />{$input[44]}<br /><br />
<input type="hidden" name="form_type" value="dental" />
<input type="hidden" name="do" value="{$do}" />
<input type="submit" value="{$button}"  style="font-size:14px">
</form>