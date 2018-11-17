{capture name=form}
<table border="1" cellspacing="1" cellpadding="1" style="border-color:#666" > 
<tbody>
<tr>
<td colspan="6" valign="top" > <h2>RENSEIGNEMENTS SUR LES ASSURANCES</h2>

</td>
</tr>

<tr>
<td colspan="6" valign="top" ><p>NOM DU PATIENT <br>
  NOM <input type="text" name="last"> 
  PR&Eacute;NOM  <input type="text" name="first">
  </p></td>
</tr>

<tr>
<td valign="top" >AVEZ-VOUS UNE ASSURANCE?<br>
<input type="radio" name="coverage"> OUI 
<input type="radio" name="coverage"> NON</td>
<td colspan="5" valign="top" ><p>
NOM DE LA COMPAGNIE D'ASSURANCES                                                            <input type="text" name="inssurance_name">T&Eacute;L. <input type="text" name="inssurance_phone"></p>

<p>ADRESSE <input type="text" name="inssurance_address"></p></td>
</tr>

<tr>
<td colspan="3" valign="top" ><p>NOM DE L'ASSUR&Eacute;<br />
<input type="text" name="subscriber" /></p></td>
<td valign="top" ><p>LIEN DU PATIENT AVEC L'ASSUR&Eacute;<br />
<input type="radio" name="relation" value="self" /> LUI-M&Ecirc;ME     
<input type="radio" name="relation" value="spouse" /> CONJOINT 
<input type="radio" name="relation" value="dependent" /> PERSONNE &Agrave; CHARGE</p></td>
<td valign="top" ><p>DATE DE NAISSANCE DE L'ASSUR&Eacute; <br />
<input type="text" name="birth" />
</p></td>
<td valign="top" ><p>N. DE GROUPE OU DE PROGRAMME<br />
  <input type="text" name="program" />
</p></td>
</tr>

<tr>
<td colspan="2" valign="top" ><p>NUM&Eacute;RO DE CERTIFICAT<br />
  <input type="text" name="certificate" />
</p></td>
<td colspan="2" valign="top" ><p>EMPLOYEUR (SI DIFF&Eacute;RENT DE CELUI CI-DESSUS)<br />
  <input type="text" name="employer" />
</p></td>
<td colspan="2" valign="top" ><p>ADRESSE DE L'EMPLOYEUR<br />
  <input type="text" name="employer_address" />
</p></td>
</tr>

<tr>
<td valign="top" ><p>AVEZ-VOUS UNE AUTRE ASSURANCE<br />
    <input type="radio" name="second_coverage" value="yes" />
    OUI 
    <input type="radio" name="second_coverage" value="no" />
    NON</p></td>
<td colspan="5" valign="top" ><p>NOM DE LA COMPAGNIE D'ASSURANCES 
    <input type="text" name="ins_name" /> 
   T&Eacute;L. 
  <input type="text" name="ins_phone" />
  <br />
  ADRESSE
<input type="text" name="ins_address" />
</p></td>
</tr>

<tr>
<td colspan="3" valign="top" ><p>NOM DE L'ASSUR&Eacute;
  <input type="text" name="subscriber2" />
</p></td>
<td valign="top" ><p>LIEN DU PATIENT AVEC L'ASSUR&Eacute;<br />

 
    <input type="radio" name="relation2" value="self" />
LUI-M&Ecirc;ME  

<input type="radio" name="relation2" value="spouse" />
CONJOINT 

<input type="radio" name="relation2" value="dependent" />
PERSONNE &Agrave; CHARGE</p></td>
<td valign="top" ><p>DATE DE NAISSANCE DE L'ASSUR&Eacute;
<input type="text" name="birth2" />
</p></td>
<td valign="top" ><p>N. DE GROUPE OU DE PROGRAMME<br />
  <input type="text" name="program2" />
</p></td>
</tr>

<tr>
<td colspan="3" valign="top" ><p>NUM&Eacute;RO DE CERTIFICAT<br />
  <input type="text" name="certificate2" />
</p></td>
<td valign="top" ><p>EMPLOYEUR (SI DIFF&Eacute;RENT DE CELUI CI-DESSUS)<br />
  <input type="text" name="employer2" />
</p></td>
<td colspan="2" valign="top" ><p>ADRESSE DE L'EMPLOYEUR<br />
  <input type="text" name="employer_address2" />
</p></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

</tbody>
</table>
<br />
<br />

<p><strong>CESSION ET DÉCHARGE</strong></p>

<p><input type="checkbox" />
Par la present, j’autorise la transmission par  ordinateur, à l’administrateur de mon régime ou à ses mandataires, de tous les  renseignements contenus dans mes demandes de prestations d’assurance soins  dentaires.</p>
<p>Je suis financièrement responsable de tout solde dû et  j’autorise le dentiste à communiquer tout renseignement pour cette demande  d’indemnité. </p>
<p>&nbsp;</p>
{/capture}
{include file="$cwd./includes/modules/forms/templates/form_title.tpl" content=$smarty.capture.form title="RENSEIGNEMENTS SUR LES ASSURANCES"}