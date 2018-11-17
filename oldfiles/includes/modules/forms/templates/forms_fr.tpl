<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.min.js"></script>
<script src="includes/scripts/min/jquery.idealforms-fr.min.js"></script>
<script type="text/javascript" src="includes/scripts/jstorage.js"></script>
<script type="text/javascript" src="includes/scripts/sisyphus.min.js"></script>
<script type="text/javascript">
{literal}
    $(function(){
      $('#my-form').sisyphus({
        timeout: 5
      });
      $('#sendAll').click(function(){
        $('#my-form').submit();
      });
    });
{/literal}
</script>
<link rel="stylesheet" href="includes/templates/css/avgrund.css">
<link href="includes/templates/css/jquery.idealforms.css" rel="stylesheet" media="screen"/>
		<div style="position:absolute;background:#fff; z-index:50;width:980px;top:80px;left:0px;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;padding:20px;border: 1px solid #999;margin-bottom:30px">
        <h2 style="text-align:center">Clinique Dentaire Ile Perrot - Formulaires dentaires</h2>
{literal}
<script type="text/javascript">
var isDirty = false;
var submitted = false;
var msg = 'Attention! Vous êtes sur le point de perdre toute information que vous avez saisies dans le formulaire.'+'\n\n'+'Pour continuer à entrer des informations dans le formulaire appuyez sur le bouton "rester sur cette page". Merci';

$(document).ready(function(){
    $(':input').change(function(){
        if(!isDirty){
            isDirty = true;
        }
    });                       
                $('form').submit(function(){
                                                submitted = true;
    });
    
    window.onbeforeunload = function(){
        if(isDirty && !submitted){
            return msg;
        }
    };
    
});
</script>
{/literal}
 <div class="eightcol last">
                  <form id="my-form" action="{$_BASE_URL}" method="post">
                  <input type="hidden" name="do" value="forms">
          <section name="&Eacute;tape 1: Information Confidentiel">
          
<table width="450" align="left">
<tr><td colspan="2"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>Informations Générales</h3></span></div></td></tr>
<tr><td  class="contact">Genre</td><td  class="contact"><div class="ideal-wrap"><select name='field1'    ><option value=0>Sélectionner</option><option value='Man'>Homme</option><option value='Woman'>Femme</option></select></div></td></tr>
<tr><td  class="contact">Date de naissance</td><td  class="contact"><div class="ideal-wrap"><input name="date" class="datepicker" data-ideal="date" type="text" placeholder="mm/dd/yyyy"/></div></td></tr>
<tr><td  class="contact">Pr&eacute;nom</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field2"   data-ideal="required field2"   size="50" placeholder="Votre prénom"></div></td></tr>
<tr><td  class="contact">Nom</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field3"    data-ideal="required field3"   size="50" placeholder="Votre nom de famille"> </div></td></tr>
<tr><td  class="contact">Adresse courriel</td><td  class="contact"><div class="ideal-wrap"><input type="email" name="field4" data-ideal="required email" size="50" placeholder="Votre adresse courriel"></div></td></tr>
<tr><td  class="contact">Adresse</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field5"  data-ideal="required field5"  size="50"  placeholder="Adresse à domicle"></div></td></tr>
<tr><td  class="contact">Ville</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field6"  data-ideal="required field6" size="50" placeholder="Montreal"></div></td></tr>
<tr><td  class="contact">Code postale</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field7"  data-ideal="required field7 zip"  size="50"  placeholder="Exemple H1H 1H1"></div></td></tr>
<tr><td  class="contact">T&eacute;l. cell</td><td  class="contact"><div class="ideal-wrap"><input type="tel" name="field8" data-ideal="phone"  size="50"></div></td></tr>
<tr><td  class="contact">T&eacute;l. maison</td><td  class="contact"><div class="ideal-wrap"><input type="tel" name="field9"  id="field9" data-ideal="required phone"  size="50" placeholder="Numéro pour vous rejoindre"></div></td></tr>
<tr><td  class="contact">T&eacute;l. travail</td><td  class="contact"><div class="ideal-wrap"><input type="tel" name="field10" data-ideal="phone" size="50"></div></td></tr>
<tr><td  class="contact">Peut-on appeler au travail?</td><td  class="contact"><div class="ideal-wrap"><select name='field11'    ><option value=0>Sélectionner</option><option value='Oui'>Oui</option><option value='Non'>Non</option></select></div></td></tr>
<tr><td  class="contact">Quelle est la meilleure fa&ccedil;on de vous contacter?</td><td  class="contact">
	<div class="ideal-wrap"><label class="ideal-label"><input type="checkbox" name="field120"  value = "Tel. cell">T&eacute;l. cell</label></div>
    <div class="ideal-wrap"><label class="ideal-label"><input type="checkbox" name="field121"  value = "Tel. maison" />T&eacute;l. maison</label></div>
    <div class="ideal-wrap"><label class="ideal-label"><input type="checkbox" name="field122"  value = "Tel. travail" >T&eacute;l. travail</label></div>
    <div class="ideal-wrap"><label class="ideal-label"><input type="checkbox" name="field123"  value = "Courriel"   >Courriel</label></div>
    <div class="ideal-wrap"><label class="ideal-label"><input type="checkbox" name="field124"  value = "Messagerie texte"  >Messagerie texte</label></div></td></tr>
</table>

 <table width="450" align="right">
 <tr><td colspan="2"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>AUTRE INFORMATION</h3></span></div></td></tr>
<tr><td  class="contact">&Eacute;tat civil</td><td  class="contact"><div class="ideal-wrap"><select name='field13'    ><option value=0>Sélectionner</option><option value='Marrié'>Marri&eacute;</option><option value='Célibataire'>C&eacute;libataire</option><option value='Divorc&eacute;'>Divorc&eacute;</option><option value='Veuve'>Veuve</option></select></div></td></tr>
<tr><td  class="contact">Moins de 18 ans</td><td  class="contact"><div class="ideal-wrap"><select name='field14'    ><option value=0>Sélectionner</option><option value='Oui'>Oui</option><option value='Non'>Non</option></select></div></td></tr>
</table>
<table width="450" align="right">
<tr><td colspan="2"> <div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>PERSONNE À APPELER EN CAS D'URGENCE</h3></span></div></td></tr>
<tr><td  class="contact">Nom au complet</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field24"  size="50"></div></td></tr>
<tr><td  class="contact">Lien</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field25"  size="50"></div></td></tr>
<tr><td  class="contact">T&eacute;l. travail</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field26" value = ""   size="50" data-ideal="phone"></div></td></tr>
<tr><td  class="contact">T&eacute;l. maison</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field27"   id="field27"  size="50" data-ideal="phone"></div></td></tr>
</table>
<table width="450" align="right">
<tr><td colspan="2"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>Notre sondage</h3></span></div></td></tr>
<tr><td  class="contact">Qui peut-on remercier de vous avoir envoy&eacute; ici?</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field29"  value = ""   size="50"></div></td></tr>
</table>
          </section>
          <section name="&Eacute;tape 2: Antécédents Dentaires" >
          
<table width="450" align="left">
<tr><td colspan="2"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>Information Personel</h3></span></div></td></tr>
<tr><td  class="contact">Dernier examen dentaire</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field3a"  value = ""   size="50"></div></td></tr>
<tr><td  class="contact">Vous vous faites nettoyer les dents tous les combien?</td><td  class="contact"><div class="ideal-wrap"><select name='field6a'    ><option value=0>Sélectionner</option><option value='3 mois'>3 mois</option><option value='4 mois'>4 mois</option><option value='6 mois'>6 mois</option><option value='1 an ou plus'>1 an ou plus</option></select></div></td></tr>
<tr><td  class="contact">Quelle est la raison de votre consultation?</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field7a"  value = ""   size="50"></div></td></tr>
</table>


<table width="450" align="right">
<tr><td colspan="3"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>R&eacute;pondez à ce sujet</h3></span></div></td></tr>
<tr><td></td><td width="30"><b>Oui</b></td><td width="30"><b>Non</b></td></tr>
<tr><td width="400"><div class="ideal-wrap">1. Vous êtes insatisfait de l'aspect de vos dents</div></td><td><input type="radio" name="field8a"  value = "Oui"   ></td><td><input type="radio" name="field8a"  value = "Non"   ></td></tr>
<tr><td width="400">2. Expériences dentaires défavorables</td><td><input type="radio" name="field9a"  value = "Oui"   ></td><td><input type="radio" name="field9a"  value = "Non"   ></td></tr>
<tr><td width="400">3. Peurs dentaires</td><td><input type="radio" name="field10a"  value = "Oui"   ></td><td><input type="radio" name="field10a"  value = "Non"   ></td></tr>
<tr><td width="400">4. Inefficacité de l'anesthésique dentaire ou réactions indésirables à celui-ci</td><td><input type="radio" name="field11a"  value = "Oui"   ></td><td><input type="radio" name="field11a"  value = "Non"   ></td></tr>
<tr><td width="400">5. Traitement orthodontique (broches)</td><td><input type="radio" name="field12a"  value = "Oui"   ></td><td><input type="radio" name="field12a"  value = "Non"   ></td></tr>
<tr><td width="400">6. Traitement périodontique (des gencives)</td><td><input type="radio" name="field13a"  value = "Oui"   ></td><td><input type="radio" name="field13a"  value = "Non"   ></td></tr>
<tr><td width="400">7. Saignement des gencives</td><td><input type="radio" name="field14a"  value = "Oui"   ></td><td><input type="radio" name="field14a"  value = "Non"   ></td></tr>
<tr><td width="400">8. Vous évitez de vous brosser une partie de la bouche</td><td><input type="radio" name="field15a"  value = "Oui"   ></td><td><input type="radio" name="field15a"  value = "Non"   ></td></tr>
<tr><td width="400">9. Sensibilité d'une partie de la bouche au chaud ou au froid</td><td><input type="radio" name="field16a"  value = "Oui"   ></td><td><input type="radio" name="field16a"  value = "Non"   ></td></tr>
<tr><td width="400">10. Mal de dents</td><td><input type="radio" name="field17a"  value = "Oui"   ></td><td><input type="radio" name="field17a"  value = "Non"   ></td></tr>
<tr><td width="400">11. Sensation de brûlure dans la bouche</td><td><input type="radio" name="field18a"  value = "Oui"   ></td><td><input type="radio" name="field18a"  value = "Non"   ></td></tr>
<tr><td width="400">12. Difficulté à avaler</td><td><input type="radio" name="field19a"  value = "Oui"   ></td><td><input type="radio" name="field19a"  value = "Non"   ></td></tr>
<tr><td width="400">13. Goût ou odeur désagréable dans la bouche</td><td><input type="radio" name="field20a"  value = "Oui"   ></td><td><input type="radio" name="field20a"  value = "Non"   ></td></tr>
<tr><td width="400">14. Sécheresse de la bouche, de la gorge ou des yeux</td><td><input type="radio" name="field21a"  value = "Oui"   ></td><td><input type="radio" name="field21a"  value = "Non"   ></td></tr>
<tr><td width="400">15. Trouble de la mâchoire (articulation temporo-mandibulaire)</td><td><input type="radio" name="field22a"  value = "Oui"   ></td><td><input type="radio" name="field22a"  value = "Non"   ></td></tr>
<tr><td width="400">16. Difficulté à ouvrir grand la bouche</td><td><input type="radio" name="field23a"  value = "Oui"   ></td><td><input type="radio" name="field23a"  value = "Non"   ></td></tr>
<tr><td width="400">17. Raideur des muscles du cou</td><td><input type="radio" name="field24a"  value = "Oui"   ></td><td><input type="radio" name="field24a"  value = "Non"   ></td></tr>
<tr><td width="400">18. Conscience des dents ou des mâchoires au réveil</td><td><input type="radio" name="field25a"  value = "Oui"   ></td><td><input type="radio" name="field25a"  value = "Non"   ></td></tr>
<tr><td width="400">19. Maux de tête dus à la tension nerveuse</td><td><input type="radio" name="field26a"  value = "Oui"   ></td><td><input type="radio" name="field26a"  value = "Non"   ></td></tr>
<tr><td width="400">20. Serrement ou grincement des dents</td><td><input type="radio" name="field27a"  value = "Oui"   ></td><td><input type="radio" name="field27a"  value = "Non"   ></td></tr>
<tr><td width="400">21. Craquement ou claquement de la mâchoire</td><td><input type="radio" name="field28a"  value = "Oui"   ></td><td><input type="radio" name="field28a"  value = "Non"   ></td></tr>
<tr><td width="400">22. Perte de dents</td><td><input type="radio" name="field29a"  value = "Oui"   ></td><td><input type="radio" name="field29a"  value = "Non"   ></td></tr>
<tr><td width="400">23. Transpiration ou tremblement intense pendant un examen</td><td><input type="radio" name="field30a"  value = "Oui"   ></td><td><input type="radio" name="field30a"  value = "Non"   ></td></tr>
<tr><td width="400">24. Peur des gens ou des lieux inconnus</td><td><input type="radio" name="field31a"  value = "Oui"   ></td><td><input type="radio" name="field31a"  value = "Non"   ></td></tr>

</table>
<table width="450" align="left">
	<tr><td colspan="3"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>RENSEIGNEMENTS SUR LES PROTHÈSES DENTAIRES</h3></span></div></td></tr>
    <tr><td colspan="3"  class="contact">
    Si vous portez une prothèse dentaire partielle ou complète, remplissez ce qui suit :</td></tr>
    <tr><td width="35"><strong>Oui</strong></td><td width="30"><strong>Non</strong></td><td>&nbsp;</td></tr>
    <tr><td><input type="radio" name="field32a"  value = "Oui"   ></td><td><input type="radio" name="field32a"  value = "Non"   ></td><td><div class="ideal-wrap">A-t-on regarni votre prothèse actuelle?  Quand? <input type="text" name="field33a"  value = ""   size="15"></div></td></tr>
    <tr><td><input type="radio" name="field34a"  value = "Oui"   ></td><td><input type="radio" name="field34a"  value = "Non"   ></td><td><div class="ideal-wrap">Votre prothèse actuelle pose-t-elle un problème?  Lequel? <input type="text" name="field35a"  value = ""   size="50"></div></td></tr>
    <tr><td><input type="radio" name="field36a"  value = "Oui"   ></td><td><input type="radio" name="field36a"  value = "Non"   ></td><td><div class="ideal-wrap">Êtes-vous satisfait de son aspect?   <input type="text" name="field37a"  value = ""   size="50"></div></td></tr>
    <tr><td><input type="radio" name="field38a"  value = "Oui"   ></td><td><input type="radio" name="field38a"  value = "Non"   ></td><td><div class="ideal-wrap">Êtes-vous satisfait de son confort?   <input type="text" name="field39a"  value = ""   size="50"></div></td></tr>    
    <tr><td><input type="radio" name="field40a"  value = "Oui"   ></td><td><input type="radio" name="field40a"  value = "Non"   ></td><td><div class="ideal-wrap">Êtes-vous satisfait de son aptitude à la mastication?  <input type="text" name="field41a"  value = ""   size="50"></div></td></tr>      
    <tr><td colspan="3">S'il vous plaît énumérer toutes les chirurgies, antécédents médicaux, ou des médicaments que vous prenez<br /><textarea name="field44a" style="width:500px"></textarea></td></tr>  
  </table>
<table width="450" align="right" style="margin-top:20px">
	<tr><td  class="contact">Quand avez-vous eu votre première prothèse partielle ou complète?</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field42a"  value = ""   size="50"></div></td></tr>
	<tr><td  class="contact">Depuis quand portez-vous votre prothèse actuelle?</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field43a"  value = ""   size="50"></div></td></tr>    
  </table>
   
          </section>
          <section name="&Eacute;tape 3: Antécédents Médicaux">
          <table width="100%">
          <tr><td colspan="2"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>RENSEIGNEMENTS COMPLÉMENTAIRES</h3></span></div></td></tr>
	<tr><td  class="contact">Nom du médecin</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field4b"  value = ""   size="50"></div></td></tr>
	<tr><td  class="contact">Raison de votre dernière visite médicale</td><td  class="contact"><div class="ideal-wrap"><input type="text" name="field5b"  value = ""   size="50"></div></td></tr>
	<tr><td  class="contact">À votre avis, quel est votre état de santé en général?</td><td  class="contact"><div class="ideal-wrap"><select name='field6b'    ><option value=0>Sélectionner</option><option value='Mauvaise'>Mauvaise</option><option value='Assez bonne'>Assez bonne</option><option value='Bonne'>Bonne</option></select></div></td></tr>
</table>


<table width="100%"> 
<tr><td colspan="7"><div class="ideal-wrap ideal-full-width"><span class="ideal-heading first-child"><h3>AVEZ-VOUS DÉJÀ EU CE QUI SUIT</h3></span></div></td></tr>
  <tr>
    <td></td>
    <td width="30"><b>Oui</b></td>
    <td width="30"><b>Non</b></td>
    <td width="30">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="30"><b>Oui</b></td>
    <td width="30"><b>Non</b></td>
  </tr>
  <tr>
    <td>1. Hospitalisation (pour maladie ou blessure)</td>
    <td><input type="radio" name="field7b"  value = "Oui"   ></td><td><input type="radio" name="field7b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>26. Arthrite</td>
    <td><input type="radio" name="field32b"  value = "Oui"   ></td><td><input type="radio" name="field32b"  value = "Non"   ></td>
  </tr>
  <tr>
    <td colspan="3">2. Réaction allergique à ce qui suit</td>
    <td>&nbsp;</td>
   	<td>27. Glaucome</td>
    <td><input type="radio" name="field33b"  value = "Oui"   ></td><td><input type="radio" name="field33b"  value = "Non"   ></td>
   </tr>
  <tr>
    <td rowspan="10">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%">&nbsp;</td>
        <td width="94%"><input type="checkbox" name="field80b"  value = "Aspirine, ibuprofène, acétaminophène"   > Aspirine, ibuprofène, acétaminophène<br /><input type="checkbox" name="field81b"  value = "Pénicilline"   > Pénicilline<br /><input type="checkbox" name="field82b"  value = "Erythromycine"   > Erythromycine<br /><input type="checkbox" name="field83b"  value = "Tétracycline"   > Tétracycline<br /><input type="checkbox" name="field84b"  value = "Codéine"   > Codéine<br /><input type="checkbox" name="field85b"  value = "Anesthesique local"   > Anesthésique local<br /><input type="checkbox" name="field86b"  value = "Fluor"   > Fluor<br /><input type="checkbox" name="field87b"  value = "Métaux (or, acier inoxydable)"   > Métaux (or, acier inoxydable)<br /><input type="checkbox" name="field88b"  value = "Latex"   > Latex<br /><input type="checkbox" name="field89b"  value = "Autres médicaments"   > Autres médicaments<br /></td>
      </tr>
    </table>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>28. Verres de contact</td>
    <td><input type="radio" name="field34b"  value = "Oui"   ></td><td><input type="radio" name="field34b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>29. Blessures à la tête ou au cou</td>
    <td><input type="radio" name="field35b"  value = "Oui"   ></td><td><input type="radio" name="field35b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>30. &Eacute;pilepsie, convulsions (crises)</td>
    <td><input type="radio" name="field36b"  value = "Oui"   ></td><td><input type="radio" name="field36b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>31. Infections virales ou boutons de fièvre</td>
    <td><input type="radio" name="field37b"  value = "Oui"   ></td><td><input type="radio" name="field37b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>32. Grosseurs ou enflures dans la bouche</td>
    <td><input type="radio" name="field38b"  value = "Oui"   ></td><td><input type="radio" name="field38b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>33. Urticaire, éruptions, rhume des foins</td>
    <td><input type="radio" name="field39b"  value = "Oui"   ></td><td><input type="radio" name="field39"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>34. Maladie vénérienne</td>
    <td><input type="radio" name="field40b"  value = "Oui"   ></td><td><input type="radio" name="field40b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>35. Hépatite </td>
    <td><input type="radio" name="field41b"  value = "Oui"   ></td><td><input type="radio" name="field41b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>36. Infection à VIH ou SIDA</td>
    <td><input type="radio" name="field42b"  value = "Oui"   ></td><td><input type="radio" name="field42b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>37. Tumeur, grosseur anormale</td>
    <td><input type="radio" name="field43b"  value = "Oui"   ></td><td><input type="radio" name="field43b"  value = "Non"   ></td>
  </tr>
      <tr>
   	<td>3. Trouble cardiaque</td>
    <td><input type="radio" name="field9b"  value = "Oui"   ></td><td><input type="radio" name="field9b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>38. Radiothérapie</td>
    <td><input type="radio" name="field44b"  value = "Oui"   ></td><td><input type="radio" name="field44b"  value = "Non"   ></td>
  </tr>
     <tr>
   	<td>4. Souffle cardiaque</td>
    <td><input type="radio" name="field10b"  value = "Oui"   ></td><td><input type="radio" name="field10b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>39. Chimiothérapie</td>
    <td><input type="radio" name="field45b"  value = "Oui"   ></td><td><input type="radio" name="field45b"  value = "Non"   ></td>
  </tr>
     <tr>
   	<td>5. Rhumatisme articulaire aigu</td>
    <td><input type="radio" name="field11b"  value = "Oui"   ></td><td><input type="radio" name="field11b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>40. Troubles émotionnels</td>
    <td><input type="radio" name="field46b"  value = "Oui"   ></td><td><input type="radio" name="field46b"  value = "Non"   ></td>
  </tr>
     <tr>
   	<td>6. Scarlatine</td>
    <td><input type="radio" name="field12b"  value = "Oui"   ></td><td><input type="radio" name="field12b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>41. Traitement psychiatrique</td>
    <td><input type="radio" name="field47b"  value = "Oui"   ></td><td><input type="radio" name="field47b"  value = "Non"   ></td>
  </tr>
     <tr>
   	<td>7. Hypertension artérielle</td>
    <td><input type="radio" name="field13b"  value = "Oui"   ></td><td><input type="radio" name="field13b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>42. Médicament antidépresseur</td>
    <td><input type="radio" name="field48b"  value = "Oui"   ></td><td><input type="radio" name="field48b"  value = "Non"   ></td>
  </tr>
     <tr>
   	<td>8. Hypotension artérielle</td>
    <td><input type="radio" name="field14b"  value = "Oui"   ></td><td><input type="radio" name="field14b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>43. Dépendance à l'alcool ou à une drogue</td>
    <td><input type="radio" name="field49b"  value = "Oui"   ></td><td><input type="radio" name="field49b"  value = "Non"   ></td>
  </tr>
    <tr>
    <td>9. Attaque d'apoplexie</td>
    <td><input type="radio" name="field15b"  value = "Oui"   ></td><td><input type="radio" name="field15b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td colspan="3">
    <strong>Êtes vous?</strong></td>
  </tr>
    <tr>
   	<td>10. Prothèse valvulaire ou articulaire</td>
    <td><input type="radio" name="field16b"  value = "Oui"   ></td><td><input type="radio" name="field16b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>44. Sous traitement pour une maladie</td>
    <td><input type="radio" name="field50b"  value = "Oui"   ></td><td><input type="radio" name="field50b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>11. Anémie ou autre trouble sanguin</td>
    <td><input type="radio" name="field17b"  value = "Oui"   ></td><td><input type="radio" name="field17b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>45. Dans un état de santé différent</td>
    <td><input type="radio" name="field51b"  value = "Oui"   ></td><td><input type="radio" name="field51b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>12. Saignement prolongé (après une coupure)</td>
    <td><input type="radio" name="field18b"  value = "Oui"   ></td><td><input type="radio" name="field18b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>46. Souvent épuisé ou fatigué</td>
    <td><input type="radio" name="field52b"  value = "Oui"   ></td><td><input type="radio" name="field52b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>13. Emphysème</td>
    <td><input type="radio" name="field19b"  value = "Oui"   ></td><td><input type="radio" name="field19b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>47. Sujet à des maux de tête fréquents</td>
    <td><input type="radio" name="field53b"  value = "Oui"   ></td><td><input type="radio" name="field53b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>14. Tuberculose</td>
    <td><input type="radio" name="field20b"  value = "Oui"   ></td><td><input type="radio" name="field20b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>48. Un gros fumeur (1 paquet ou plus par jour)</td>
    <td><input type="radio" name="field54b"  value = "Oui"   ></td><td><input type="radio" name="field54b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>15. Asthme</td>
    <td><input type="radio" name="field21b"  value = "Oui"   ></td><td><input type="radio" name="field21b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>49. Considéré comme susceptible</td>
    <td><input type="radio" name="field55b"  value = "Oui"   ></td><td><input type="radio" name="field55b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>16. Sinusite</td>
    <td><input type="radio" name="field22b"  value = "Oui"   ></td><td><input type="radio" name="field22b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>50. Souvent malheureux ou déprimé</td>
    <td><input type="radio" name="field56b"  value = "Oui"   ></td><td><input type="radio" name="field56b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>17. Maladie des reins</td>
    <td><input type="radio" name="field23b"  value = "Oui"   ></td><td><input type="radio" name="field23b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>51. Facilement vexé ou irrité</td>
    <td><input type="radio" name="field57b"  value = "Oui"   ></td><td><input type="radio" name="field57b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>18. Maladie du foie</td>
    <td><input type="radio" name="field24b"  value = "Oui"   ></td><td><input type="radio" name="field24b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>52. FEMME – sous pilule contraceptive</td>
    <td><input type="radio" name="field58b"  value = "Oui"   ></td><td><input type="radio" name="field58b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>19. Jaunisse</td>
    <td><input type="radio" name="field25b"  value = "Oui"   ></td><td><input type="radio" name="field25b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>53. FEMME – enceinte</td>
    <td><input type="radio" name="field59b"  value = "Oui"   ></td><td><input type="radio" name="field59b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>20. Maladie de la thyroïde ou des parathyroïdes</td>
    <td><input type="radio" name="field26b"  value = "Oui"   ></td><td><input type="radio" name="field26b"  value = "Non"   ></td>
    <td>&nbsp;</td>
   	<td>54. HOMME – atteint d'un trouble de la prostate</td>
    <td><input type="radio" name="field60b"  value = "Oui"   ></td><td><input type="radio" name="field60b"  value = "Non"   ></td></td>
  </tr>
     <tr>
   	<td>21. Insuffisance hormonale</td>
    <td><input type="radio" name="field27b"  value = "Oui"   ></td><td><input type="radio" name="field27b"  value = "Non"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>22. Hypercholestérolémie</td>
    <td><input type="radio" name="field28b"  value = "Oui"   ></td><td><input type="radio" name="field28b"  value = "Non"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>23. Diabète</td>
    <td><input type="radio" name="field29b"  value = "Oui"   ></td><td><input type="radio" name="field29b"  value = "Non"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>24. Ulcère gastrique ou duodénal</td>
    <td><input type="radio" name="field30b"  value = "Oui"   ></td><td><input type="radio" name="field30b"  value = "Non"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>25. Troubles digestifs</td>
    <td><input type="radio" name="field31b"  value = "Oui"   ></td><td><input type="radio" name="field31b"  value = "Non"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table><br />
<div class="ideal-wrap">Si vous suivez un traitement ou que vous allez subir une opération ou suivre un traitement sous peu<br /><textarea name="field61" style="width:500px"></textarea></div>
<br />
<div class="ideal-wrap">Si vous avez pris des médicaments, des compléments à base de plantes ou des vitamines au cours des deux dernières années, précisez (et, s'ils vous ont été prescrits par votre médecin, apportez-en la liste)<br /><textarea name="field62"  style="width:500px"></textarea></div>

          </section>
<hr>
      <div style="width:100%;text-align:center;padding-top:20px;padding-bottom:20px">
        <button type="submit" class="ideal-button" >Soumettre les informations</button>
        <button id="cancel" type="button" onClick="parent.location='{$_BASE_URL}'" class="ideal-button" >Annuler</button>
      </div>

    </form></div></div>
{literal}    
<script>
  var users = ['admin', 'user'];

  var options = {

    inputs: {
      'password': {
        filters: 'required pass'
      },
      'username': {
        filters: 'required username',
        // data: { ajax: { url:'validate.php' } }
      },
      'file': {
        filters: 'extension',
        data: {
          extension: ['jpg']
        }
      },

      'comments': {
        filters: 'min max',
        data: {
          min: 50,
          max: 200
        }
      },
      'field14': {
        filters: 'exclude',
        data: {
          exclude: ['0']
        },
        errors : {
          exclude: 'Sélectionner'
        }
      },
      'field1': {
        filters: 'exclude',
        data: {
          exclude: ['0']
        },
        errors : {
          exclude: 'Sélectionner'
        }
      },
      'field6b': {
        filters: 'exclude',
        data: {
          exclude: ['0']
        },
        errors : {
          exclude: 'Sélectionner'
        }
      },	  	  
      'langs[]': {
        filters: 'min max',
        data: {
          min: 2,
          max: 3
        },
        errors: {
          min: 'Check at least <strong>2</strong> options.',
          max: 'No more than <strong>3</strong> options allowed.'
        }
      }
    }
  };

  var $idealform = $('#my-form').idealforms(options);

  $('#reset').click(function(){ $idealform.reset().fresh().focusFirst() });
  $idealform.focusFirst();

</script>
		</aside>
<script type="text/javascript" src="includes/scripts/avgrund.js"></script>
{/literal}