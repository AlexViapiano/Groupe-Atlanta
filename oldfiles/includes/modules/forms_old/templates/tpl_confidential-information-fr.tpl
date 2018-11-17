{capture name=form}
<h2>RENSEIGNEMENTS CONFIDENTIELS</h2>

<table border="1" cellspacing="1" cellpadding="1" style="border-color:#666" > 
<tbody>
<tr>
<td colspan="4" valign="top" >
  <table>
    <tr><td>NOM DU PATIENT:</td><td>{if $submitted}<u>{$smarty.post.nom}</u>{else}<input type="text" name="nom" size="60" >{/if}</td></tr>
    <tr><td>PR&Eacute;NOM(S):</td><td>{if $submitted}<u>{$smarty.post.prenom}</u>{else}<input type="text" name="prenom" size="60">{/if}</p></td></tr>
    </table>
    </td>
<td colspan="2" valign="top" ><p><strong>DATE DE NAISSANCE</strong><br>
  (AAAA/MMM/JJ):{if $submitted}<u>{$smarty.post.naissance}</u>{else} <input type="text" name="naissance" size="30" >{/if}</p></td>
<td width="243" valign="top" ><p><strong>GENRE
    </strong><br />
    {if $submitted}
    	<u>{$smarty.post.genre}</u>
    {else}
    <input  type="radio" name="genre" value="homme" > 
  Homme <input type="radio" name="genre" value="femme" > Femme{/if}</p></td>
</tr>

<tr>
<td colspan="7" valign="top" >
<table>
	<tr><td>ADRESSE DU PATIENT</td><td>
{if $submitted}<u>{$smarty.post.addr}</u>{else}    <input type="text" name="addr" size="35" >{/if}</td>
<td>N. ET RUE APP.</td><td>{if $submitted}<u>{$smarty.post.app}</u>{else}<input type="text" name="app" size="35"  }>{/if}</td></tr>
<tr><td>VILLE PROV.</td><td>{if $submitted}<u>{$smarty.post.prov}</u>{else}<input type="text" name="prov" size="35" >{/if}</td><td>CODE POSTAL</td>
<td>{if $submitted}<u>{$smarty.post.postal}</u>{else}<input type="text" name="postal" size="35" >{/if}</td></tr></table>
</td>
</tr>

<tr>
<td colspan="5" valign="top" >
<table>
<tr><td>T&Eacute;L. CELLULAIRE</td><td>{if $submitted}<u>{$smarty.post.cel}</u>{ else}<input type="text" name="cel" size="35" >{/if}</td>
<td>T&Eacute;L. DOMICILE</td><td>{if $submitted}<u>{$smarty.post.dom}</u> {else}<input type="text" name="dom" size="35">{/if}</td></tr>
<tr><td>COURRIEL</td><td>{if $submitted}<u>{$smarty.post.email}</u> {else}<input type="text" name="email" size="35">{/if}</td><td>
T&Eacute;L. AU TRAVAIL</td><td>{if $submitted}<u>{$smarty.post.work}</u> {else}<input type="text" name="work" size="35" >{/if}</p></td></tr>
</table>
</td>
<td colspan="2" valign="top" ><p>PEUT-ON APPELER AU TRAVAIL?<br />
<input type="radio" name="call_work"> OUI 
<input type="radio" name="call_work" > NON</p></td>
</tr>
<tr>
<td colspan="7" valign="top" ><p>QUELLE EST LA MEILLEURE FA&Ccedil;ON DE VOUS CONTACTER?<br />
<input type="checkbox" name="reach_cell" {if $smarty.post.reach_cell == 'on'} checked="checked"{/if} {if $submitted} disabled="disabled"{/if}> T&Eacute;L. CELLULAIRE 
<input type="checkbox" name="reach_home" {if $smarty.post.reach_home == 'on'} checked="checked"{/if} {if $submitted} disabled="disabled"{/if}> T&Eacute;L. AU DOMICILE  
<input type="checkbox" name="reach_work" {if $smarty.post.reach_work == 'on'} checked="checked"{/if} {if $submitted} disabled="disabled"{/if}> T&Eacute;L. AU TRAVAIL 
<input type="checkbox" name="reach_txtmsg" {if $smarty.post.reach_txtmsg == 'on'} checked="checked"{/if} {if $submitted} disabled="disabled"{/if}> MESSAGERIE TEXTE 
<input type="checkbox" name="reach_email" {if $smarty.post.reach_email == 'on'} checked="checked"{/if} {if $submitted} disabled="disabled"{/if}> COURRIEL</p></td>
</tr>
<tr>
<td width="286" valign="top" ><p>&Eacute;TAT CIVIL
<input type="radio" name="status" {if $submitted} disabled="disabled"{/if}> M 
<input type="radio" name="status" {if $submitted} disabled="disabled"{/if}> C 
<input type="radio" name="status" {if $submitted} disabled="disabled"{/if}> D 
<input type="radio" name="status" {if $submitted} disabled="disabled"{/if}> V <br />
MOINS DE 18 ANS {if $submitted}<u>{$smarty.post.cel}</u>{else}<input type="checkbox" name="under18" size="30" {if $smarty.post.under18 == 'on'} checked="checked"{/if} {if $submitted}disabled="disabled"{/if}>{/if}
</p></td>
<td colspan="2" valign="top" ><p>EMPLOYEUR DU PATIENT OU DU TUTEUR<br>{if $submitted}<u>{$smarty.post.employer}</u>{else} <input type="text" name="employer" size="30" >{/if}</p></td>
<td colspan="4" valign="top" ><p>PROFESSION<br />
 {if $submitted}<u>{$smarty.post.profession}</u>{else} <input type="text" name="profession" size="60" >{/if}</p></td>
</tr>

<tr>
<td colspan="7" valign="top" ><p>ADRESSE AU TRAVAIL N. ET RUE VILLE PROV. CODE POSTAL<br />
 {if $submitted}<u>{$smarty.post.address}</u>{else} <input type="text" name="address" size="80" >{/if}</p></td>
</tr>

<tr>
<td colspan="3" valign="top" ><p>NOM DU CONJOINT PR&Eacute;NOM(S) <br>{if $submitted}<u>{$smarty.post.namepartner}</u>{else}<input type="text" name="namepartner" size="60"  >{/if}</p></td>
<td colspan="3" valign="top" ><p>EMPLOYEUR DU CONJOINT{if $submitted}<u>{$smarty.post.employerpartner}</u>{else} <input type="text" name="employerpartner" size="30" >{/if}</p></td>
<td valign="top" ><p>PROFESSION<br>{if $submitted}<u>{$smarty.post.professionpartner}</u>{else}<input type="text" name="professionpartner" size="30" />{/if}</p></td>
</tr>

<tr>
<td colspan="3" valign="top" ><p>ADRESSE AU TRAVAIL N. ET RUE VILLE PROV. CODE POSTAL <br>
 {if $submitted}<u>{$smarty.post.addresswork}</u>{else}<input type="text" name="addresswork" size="80" >{/if}</p></td>
<td colspan="3" valign="top" ><p>T&Eacute;L. AU TRAVAIL<br>
 {if $submitted}<u>{$smarty.post.worknumber}</u>{else}<input type="text" name="worknumber" size="30"  >{/if}</p></td>
<td valign="top" ><p>PEUT-ON APPELER AU TRAVAIL?<br />
<input type="radio" name="call_work_partner" {if $submitted} disabled="disabled"{/if}> OUI 
<input type="radio" name="call_work_partner" {if $submitted} disabled="disabled"{/if}> NON</p></td>
</tr>
<tr>
<td colspan="7" valign="top" ><p>PERSONNE &Agrave; APPELER EN CAS D'URGENCE (AILLEURS QU'&Agrave; VOTRE DOMICILE )</p>

<p>NOM{if $submitted}<u>{$smarty.post.urgentname}</u>{else} <input type="text" name="urgentname" size="30" > {/if}
LIEN {if $submitted}<u>{$smarty.post.lien}</u>{else}<input type="text" name="lien" size="30" > {/if}
  <br />
  T&Eacute;L. AU TRAVAIL
{if $submitted}<u>{$smarty.post.urgenttelwork}</u>{else}<input type="text" name="urgenttelwork" size="30"  >{/if}
 T&Eacute;L. DOMICILE {if $submitted}<u>{$smarty.post.urgenttelhome}</u>{else}<input type="text" name="urgenttelhome" size="30" >{/if}</p></td>
</tr>

<tr>
<td colspan="2" valign="top" ><p>AUTRES MEMBRES DE LA FAMILLE VENANT ICI<br>
{if $submitted}<u>{$smarty.post.familymembers}</u>{else}<input type="text" name="familymembers" size="60" >{/if} </p></td>
<td colspan="5" valign="top" ><p>QUI PEUT-ON REMERCIER DE VOUS AVOIR ENVOY&Eacute; ICI?<br>
{if $submitted}<u>{$smarty.post.referal}</u>{else}<input type="text" name="referal" size="60" >{/if}</p></td>
</tr>

</tbody>
</table>
<br />
<br />

<p><strong>CESSION ET D&Eacute;CHARGE</strong></p>

<p><input type="checkbox" name="accept"> Je suis financièrement responsable de tout solde dû et j'autorise le dentiste à communiquer tout renseignement pour cette demande d'indemnité. J'autorise le dentiste à utiliser mon dossier s'il le décide. Compte tenu des services que m'a rendus ce cabinet dentaire, je suis obligé de payer celui-ci selon sa politique et ses modalités de crédit. Je consens à ce qu'on fasse des vidéos et qu'on prenne des photos et des radiographies avant, pendant et après le traitement et que le dentiste utilise celles-ci dans des articles ou des démontrations scientifiques.</p>
{/capture}
{include file="$cwd./includes/modules/forms/templates/form_title.tpl" content=$smarty.capture.form title="CONFIDENTIAL INFORMATION QUESTIONNAIRE"}