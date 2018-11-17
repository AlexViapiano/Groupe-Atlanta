{literal}
<style type="text/css">
table td { 
	padding:2px;
	color:#000;
	font-weight:bold
}
input
{
	height:16px;
}
</style>
{/literal}
<h2>ANTÉCÉDENTS  MÉDICAUX</h2>
<form>
<table>
<tr>
	<td>Nom du patient</td><td><input type="text" name="patient_name"></td>
	<td>Surnom</td><td><input type="text" name="patient_nickname"></td>
</tr>
<tr>
	<td>Date de naissance (DD/MM/YY)</td><td><input type="text" name="birth"></td>
    <td>Nom du médecin</td><td><input type="text" name="name_phy"></td>
</tr>
<tr>
	<td>Dernier examen physique</td><td><input type="text" name="recent_exam"></td>
    <td>But</td><td><input type="text" name="purpose"></td>
</tr>
<tr>
  <td colspan="4">À votre avis, quel est votre état de santé en général?
<input type="radio" name="health"> 
Mauvais
<input type="radio" name="health"> Assez bon
<input type="radio" name="health">  Bon</td></tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>AVEZ-VOUS  DÉJÀ EU CE QUI SUIT&nbsp;</strong></td>
    <td>OUI</td>
    <td>NON</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>OUI</td>
    <td>NON</td>
  </tr>
  <tr>
    <td>1. hospitalisation (pour maladie ou blessure)</td>
    <td>
      <input type="radio" name="radio1"  value="radio">
 </td>
    <td><input type="radio" name="radio1" id="radio2" value="radio"></td>
    <td>&nbsp;</td>
    <td>26.  arthrite</td>
    <td><input type="radio" name="radio26" id="radio49" value="radio"></td>
    <td><input type="radio" name="radio26" id="radio50" value="radio"></td>
  </tr>
  <tr>
    <td colspan="3">2. réaction allergique à ce qui suit&nbsp;</td>
    <td>&nbsp;</td>
    <td>27.  glaucome</td>
    <td><input type="radio" name="radio27" id="radio51" value="radio"></td>
  <td><input type="radio" name="radio27" id="radio53" value="radio"></td    
  ></tr>
  <tr>
    <td rowspan="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%">&nbsp;</td>
        <td width="94%"><input type="checkbox" name="checkbox" id="checkbox">
          <label for="checkbox"></label>
          aspirine, ibuprofène, acétaminophène</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox2" id="checkbox2">
          pénicilline</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox3" id="checkbox3">
          érythromycine</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox4" id="checkbox4">
          tétracycline</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox5" id="checkbox5">
          codéine</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox6" id="checkbox6">
          anesthésique local</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox7" id="checkbox7">
          fluor</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox8" id="checkbox8">
          métaux (or, acier inoxydable)</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox9" id="checkbox9">
          latex</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox10" id="checkbox10">
          autres médicaments</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>28.  verres de contact</td>
    <td><input type="radio" name="radio28" id="radio52" value="radio"></td>
    <td><input type="radio" name="radio28" id="radio54" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>29.  blessures à la tête ou au cou</td>
    <td><input type="radio" name="radio29" id="radio55" value="radio"></td>
    <td><input type="radio" name="radio29" id="radio56" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>30.  épilepsie, convulsions (crises)</td>
    <td><input type="radio" name="radio30" id="radio57" value="radio"></td>
    <td><input type="radio" name="radio30" id="radio58" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>31.  infections virales ou boutons de fièvre</td>
    <td><input type="radio" name="radio31" id="radio59" value="radio"></td>
    <td><input type="radio" name="radio31" id="radio60" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>32.  grosseurs ou enflures dans la bouche</td>
    <td><input type="radio" name="radio32" id="radio61" value="radio"></td>
    <td><input type="radio" name="radio32" id="radio62" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>33.urticaire, éruptions, rhume des foins</td>
    <td><input type="radio" name="radio33" id="radio63" value="radio"></td>
    <td><input type="radio" name="radio33" id="radio64" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>34.  maladie vénérienne</td>
    <td><input type="radio" name="radio34" id="radio65" value="radio"></td>
    <td><input type="radio" name="radio34" id="radio66" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>35.  hépatite (type&nbsp;:  )</td>
    <td><input type="radio" name="radio35" id="radio67" value="radio"></td>
    <td><input type="radio" name="radio35" id="radio68" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>36.  infection à VIH ou SIDA</td>
    <td><input type="radio" name="radio36" id="radio69" value="radio"></td>
    <td><input type="radio" name="radio36" id="radio70" value="radio"></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>37. tumeur, grosseur anormale</td>
    <td><input type="radio" name="radio37" id="radio71" value="radio"></td>
    <td><input type="radio" name="radio37" id="radio72" value="radio"></td>
  </tr>
  <tr>
    <td>3.  trouble cardiaque</td>
    <td><input type="radio" name="radio3" id="radio3" value="radio"></td>
    <td><input type="radio" name="radio3" id="radio4" value="radio"></td>
    <td>&nbsp;</td>
    <td>38. radiothérapie</td>
    <td><input type="radio" name="radio38" id="radio73" value="radio"></td>
    <td><input type="radio" name="radio38" id="radio74" value="radio"></td>
  </tr>
  <tr>
    <td>4.  souffle cardiaque</td>
    <td><input type="radio" name="radio4" id="radio5" value="radio"></td>
    <td><input type="radio" name="radio4" id="radio6" value="radio"></td>
    <td>&nbsp;</td>
    <td>39. chimiothérapie</td>
    <td><input type="radio" name="radio39" id="radio75" value="radio"></td>
    <td><input type="radio" name="radio39" id="radio76" value="radio"></td>
  </tr>
  <tr>
    <td>5.  rhumatisme articulaire aigu</td>
    <td><input type="radio" name="radio5" id="radio7" value="radio"></td>
    <td><input type="radio" name="radio5" id="radio8" value="radio"></td>
    <td>&nbsp;</td>
    <td>40. troubles émotionnels</td>
    <td><input type="radio" name="radio40" id="radio77" value="radio"></td>
    <td><input type="radio" name="radio40" id="radio78" value="radio"></td>
  </tr>
  <tr>
    <td>6.  scarlatine</td>
    <td><input type="radio" name="radio6" id="radio9" value="radio"></td>
    <td><input type="radio" name="radio6" id="radio10" value="radio"></td>
    <td>&nbsp;</td>
    <td>41. traitement psychiatrique</td>
    <td><input type="radio" name="radio41" id="radio79" value="radio"></td>
    <td><input type="radio" name="radio41" id="radio80" value="radio"></td>
  </tr>
  <tr>
    <td>7.  hypertension artérielle</td>
    <td><input type="radio" name="radio7" id="radio11" value="radio"></td>
    <td><input type="radio" name="radio7" id="radio12" value="radio"></td>
    <td>&nbsp;</td>
    <td>42. médicament antidépresseur</td>
    <td><input type="radio" name="radio42" id="radio81" value="radio"></td>
    <td><input type="radio" name="radio43" id="radio82" value="radio"></td>
  </tr>
  <tr>
    <td>8.  hypotension artérielle</td>
    <td><input type="radio" name="radio8" id="radio13" value="radio"></td>
    <td><input type="radio" name="radio8" id="radio14" value="radio"></td>
    <td>&nbsp;</td>
    <td>43. dépendance à l’alcool ou à une drogue          </td>
    <td><input type="radio" name="radio43" id="radio83" value="radio"></td>
    <td><input type="radio" name="radio43" id="radio84" value="radio"></td>
  </tr>
  <tr>
    <td>9.  attaque d’apoplexie</td>
    <td><input type="radio" name="radio9" id="radio15" value="radio"></td>
    <td><input type="radio" name="radio9" id="radio16" value="radio"></td>
    <td>&nbsp;</td>
    <td colspan="3">ÊTES-VOUS&nbsp;:</td>
  </tr>
  <tr>
    <td>10.  prothèse valvulaire ou articulaire</td>
    <td><input type="radio" name="radio10" id="radio17" value="radio"></td>
    <td><input type="radio" name="radio10" id="radio18" value="radio"></td>
    <td>&nbsp;</td>
    <td>44. sous traitement pour une maladie</td>
    <td><input type="radio" name="radio44" id="radio85" value="radio"></td>
    <td><input type="radio" name="radio44" id="radio86" value="radio"></td>
  </tr>
  <tr>
    <td>11.  anémie ou autre trouble sanguin</td>
    <td><input type="radio" name="radio11" id="radio19" value="radio"></td>
    <td><input type="radio" name="radio11" id="radio20" value="radio"></td>
    <td>&nbsp;</td>
    <td>45. dans un état de santé différent</td>
    <td><input type="radio" name="radio45" id="radio87" value="radio"></td>
    <td><input type="radio" name="radio45" id="radio88" value="radio"></td>
  </tr>
  <tr>
    <td>12.  saignement prolongé (après une coupure)</td>
    <td><input type="radio" name="radio12" id="radio21" value="radio"></td>
    <td><input type="radio" name="radio12" id="radio22" value="radio"></td>
    <td>&nbsp;</td>
    <td>46. souvent épuisé ou fatigué</td>
    <td><input type="radio" name="radio46" id="radio89" value="radio"></td>
    <td><input type="radio" name="radio46" id="radio90" value="radio"></td>
  </tr>
  <tr>
    <td>13.  emphysème</td>
    <td><input type="radio" name="radio13" id="radio23" value="radio"></td>
    <td><input type="radio" name="radio13" id="radio24" value="radio"></td>
    <td>&nbsp;</td>
    <td>47. sujet à des maux de tête fréquents</td>
    <td><input type="radio" name="radio47" id="radio91" value="radio"></td>
    <td><input type="radio" name="radio47" id="radio92" value="radio"></td>
  </tr>
  <tr>
    <td>14.  tuberculose</td>
    <td><input type="radio" name="radio14" id="radio25" value="radio"></td>
    <td><input type="radio" name="radio14" id="radio26" value="radio"></td>
    <td>&nbsp;</td>
    <td>48. un gros fumeur (1 paquet ou plus par jour)</td>
    <td><input type="radio" name="radio48" id="radio93" value="radio"></td>
    <td><input type="radio" name="radio48" id="radio94" value="radio"></td>
  </tr>
  <tr>
    <td>15.  asthme</td>
    <td><input type="radio" name="radio15" id="radio27" value="radio"></td>
    <td><input type="radio" name="radio15" id="radio28" value="radio"></td>
    <td>&nbsp;</td>
    <td>49. considéré comme susceptible</td>
    <td><input type="radio" name="radio49" id="radio95" value="radio"></td>
    <td><input type="radio" name="radio49" id="radio96" value="radio"></td>
  </tr>
  <tr>
    <td>16.  sinusite</td>
    <td><input type="radio" name="radio16" id="radio29" value="radio"></td>
    <td><input type="radio" name="radio16" id="radio30" value="radio"></td>
    <td>&nbsp;</td>
    <td>50. souvent malheureux ou déprimé</td>
    <td><input type="radio" name="radio50" id="radio97" value="radio"></td>
    <td><input type="radio" name="radio50" id="radio98" value="radio"></td>
  </tr>
  <tr>
    <td>17.  maladie des reins</td>
    <td><input type="radio" name="radio17" id="radio31" value="radio"></td>
    <td><input type="radio" name="radio17" id="radio32" value="radio"></td>
    <td>&nbsp;</td>
    <td>51. facilement vexé ou irrité</td>
    <td><input type="radio" name="radio51" id="radio99" value="radio"></td>
    <td><input type="radio" name="radio51" id="radio100" value="radio"></td>
  </tr>
  <tr>
    <td>18.  maladie du foie</td>
    <td><input type="radio" name="radio18" id="radio33" value="radio"></td>
    <td><input type="radio" name="radio18" id="radio34" value="radio"></td>
    <td>&nbsp;</td>
    <td>52. FEMME – sous pilule contraceptive</td>
    <td><input type="radio" name="radio52" id="radio101" value="radio"></td>
    <td><input type="radio" name="radio52" id="radio102" value="radio"></td>
  </tr>
  <tr>
    <td>19.  jaunisse</td>
    <td><input type="radio" name="radio19" id="radio35" value="radio"></td>
    <td><input type="radio" name="radio19" id="radio36" value="radio"></td>
    <td>&nbsp;</td>
    <td>53. FEMME – enceinte</td>
    <td><input type="radio" name="radio53" id="radio103" value="radio"></td>
    <td><input type="radio" name="radio53" id="radio106" value="radio"></td>
  </tr>
  <tr>
    <td>20.  maladie de la thyroïde ou des parathyroïdes</td>
    <td><input type="radio" name="radio20" id="radio37" value="radio"></td>
    <td><input type="radio" name="radio20" id="radio38" value="radio"></td>
    <td>&nbsp;</td>
    <td>54. HOMME – atteint d’un trouble de la  prostate</td>
    <td><input type="radio" name="radio54" id="radio104" value="radio"></td>
    <td><input type="radio" name="radio54" id="radio105" value="radio"></td>
  </tr>
  <tr>
    <td>21.insuffisance hormonale</td>
    <td><input type="radio" name="radio21" id="radio39" value="radio"></td>
    <td><input type="radio" name="radio21" id="radio40" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>22.  hypercholestérolémie</td>
    <td><input type="radio" name="radio22" id="radio41" value="radio"></td>
    <td><input type="radio" name="radio22" id="radio42" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>23.  diabète</td>
    <td><input type="radio" name="radio23" id="radio43" value="radio"></td>
    <td><input type="radio" name="radio23" id="radio44" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>24.  ulcère gastrique ou duodénal</td>
    <td><input type="radio" name="radio24" id="radio45" value="radio"></td>
    <td><input type="radio" name="radio24" id="radio46" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>25.  troubles digestifs</td>
    <td><input type="radio" name="radio25" id="radio47" value="radio"></td>
    <td><input type="radio" name="radio25" id="radio48" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<br />
<p>Si  vous suivez un traitement ou que vous allez subir une opération ou suivre un  traitement sous peu, précisez:<br />
  <textarea cols="80" rows="3"></textarea>
</p>
<p>Si vous avez pris des médicaments, des compléments à base de  plantes ou des vitamines au cours des deux dernières années, précisez (et,  s’ils vous ont été prescrits par votre médecin, apportez-en la liste)&nbsp;<br />
  <textarea cols="80" rows="3"></textarea>
</p>
<p>AVISEZ-NOUS DE TOUT CHANGEMENT ULTÉRIEUR CONCERNANT VOS ANTÉCÉDENTS
MÉDICAUX ET, S'IL Y A LIEU, LES MÉDICAMENTS QUE VOUS PRENEZ.
</p>
</form>