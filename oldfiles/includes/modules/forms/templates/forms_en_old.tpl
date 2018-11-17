<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.min.js"></script>
<script src="includes/scripts/min/jquery.idealforms-en.min.js"></script>
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
        <h2 style="text-align:center">Clinique Dentail Ile Perrot - Dental Forms </h2>
{literal}
<script type="text/javascript">
var isDirty = false;
var submitted = false;
var msg = 'Warning! You are about to lose any information that you have entered into the form.'+'\n\n'+'To continue entering information on the form press the "stay on page" button. Thank you.';

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
          <section name="Step 1: Confidential Information">
          
<table width="450" align="left">
<tr><td colspan="2"><div><h3>General Information</h3></div></td></tr>
<tr><td  class="contact">Gender</td><td  class="contact"><div><select name='field1'    ><option value=0>Select</option><option value='Man'>Man</option><option value='Woman'>Woman</option></select></div></td></tr>
<tr><td  class="contact">Date of birth</td><td  class="contact"><div><input name="date" class="datepicker" data-ideal="date" type="text" placeholder="mm/dd/yyyy"/></div></td></tr>
<tr><td  class="contact">First name</td><td  class="contact"><div><input type="text" name="field2"   data-ideal="required field2"   size="50"  placeholder="Enter your first name"></div></td></tr>
<tr><td  class="contact">Last name</td><td  class="contact"><div><input type="text" name="field3"    data-ideal="required field3"   size="50" placeholder="Enter your last name"></div></td></tr>
<tr><td  class="contact">Email address</td><td  class="contact"><div><input type="email" name="field4" data-ideal="required email" size="50"  placeholder="Enter your email address"></div></td></tr>
<tr><td  class="contact">Address</td><td  class="contact"><div><input type="text" name="field5"  data-ideal="required field5"  size="50"  placeholder="Enter your home address"></div></td></tr>
<tr><td  class="contact">City</td><td  class="contact"><div><input type="text" name="field6"  data-ideal="required field6" size="50"  placeholder="Montreal"></div></td></tr>
<tr><td  class="contact">Postal Code</td><td  class="contact"><div><input type="text" name="field7"  data-ideal="required field7"  size="50"  placeholder="Example H1H 1H1"></div></td></tr>
<tr><td  class="contact">Cell Phone</td><td  class="contact"><div><input type="tel" name="field8" data-ideal="phone"  size="50"></div></td></tr>
<tr><td  class="contact">Home Phone</td><td  class="contact"><div><input type="tel" name="field9"  id="field9" data-ideal="required phone"  size="50"  placeholder="Enter contact number"></div></td></tr>
<tr><td  class="contact">Work phone</td><td  class="contact"><div><input type="tel" name="field10" data-ideal="phone" size="50"></div></td></tr>
<tr><td  class="contact">Ok to call at work?</td><td  class="contact"><div><select name='field11'    ><option value=0>Select</option><option value='Yes'>Yes</option><option value='No'>No</option></select></div></td></tr>
<tr><td  class="contact">To contact you</td><td  class="contact">
	<div><label><input type="checkbox" name="field120"  value = "Cell Phone">Cell Phone</label></div>
    <div><label><input type="checkbox" name="field121"  value = "Home Phone" />Home Phone</label></div>
    <div><label><input type="checkbox" name="field122"  value = "Work Phone" >Work Phone</label></div>
    <div><label><input type="checkbox" name="field123"  value = "Email"   >Email</label></div>
    <div><label><input type="checkbox" name="field124"  value = "Text Messaging"  >Text Messaging</label></div></td></tr>
</table>

 <table width="450" align="right">
 <tr><td colspan="2"> <div><h3 style="margin-top:-30px">Other Information</h3></div></td></tr>
<tr><td  class="contact">Martial status</td><td  class="contact"><div><select name='field13'    ><option value=0>Select</option><option value='Married'>Married</option><option value='Single'>Single</option><option value='Seperated'>Seperated</option><option value='Divorced'>Divorced</option><option value='Widow'>Widow</option></select></div></td></tr>
<tr><td  class="contact">Underage 18</td><td  class="contact"><div><select name='field14' id="field14" ><option value=0>Select</option><option value='Yes'>Yes</option><option value='No'>No</option></select></div></td></tr>
</table>
<table width="450" align="right">
<tr><td colspan="2"> <div><h3>CONTACT IN CASE OF AN EMERGENCY </h3></div></td></tr>
<tr><td  class="contact">Full name</td><td  class="contact"><div><input type="text" name="field24"  size="50"></div></td></tr>
<tr><td  class="contact">Relationship</td><td  class="contact"><div><input type="text" name="field25"  size="50"></div></td></tr>
<tr><td  class="contact">Work phone</td><td  class="contact"><div><input type="text" name="field26" value = ""   size="50" data-ideal="phone"></div></td></tr>
<tr><td  class="contact">Home phone</td><td  class="contact"><div><input type="text" name="field27"   id="field27"  size="50" data-ideal="phone"></div></td></tr>
</table>
<table width="450" align="right">
<tr><td colspan="2"><div><h3>Our survey</h3></div></td></tr>
<tr><td  class="contact">Who can we thank for referring you?</td><td  class="contact"><div><input type="text" name="field29"  value = ""   size="50"></div></td></tr>
</table>
          </section>
          <section name="Step 2: Dental History" >
          
<table width="450" align="left">
<tr><td colspan="2"><div><h3>Personal Information</h3></div></td></tr>
<tr><td  class="contact">Most recent dental exam</td><td  class="contact"><div><input type="text" name="field3a"  value = ""   size="50"></div></td></tr>
<tr><td  class="contact">How often do you have your teeth cleaned?</td><td  class="contact"><div><select name='field6a'    ><option value=0>Select</option><option value='3 month'>3 month</option><option value='4 month'>4 month</option><option value='6 month'>6 month</option><option value='1 year or longer'>1 year or longer</option></select></div></td></tr>
<tr><td  class="contact">What is yout immediate dental concern?</td><td  class="contact"><div><input type="text" name="field7a"  value = ""   size="50"></div></td></tr>
</table>


<table width="450" align="right">
<tr><td colspan="3"><div style="margin-top:-30px"><h3>Please answer the following</h3></div></td></tr>
<tr><td></td><td width="30"><b>Yes</b></td><td width="30"><b>No</b></td></tr>
<tr><td width="400"><div>1. Unhappy with the appearance of your teeth</div></td><td><input type="radio" name="field8a"  value = "Yes"   ></td><td><input type="radio" name="field8a"  value = "No"   ></td></tr>
<tr><td width="400">2. Unfavorable dental experiences</td><td><input type="radio" name="field9a"  value = "Yes"   ></td><td><input type="radio" name="field9a"  value = "No"   ></td></tr>
<tr><td width="400">3. Dental fears</td><td><input type="radio" name="field10a"  value = "Yes"   ></td><td><input type="radio" name="field10a"  value = "No"   ></td></tr>
<tr><td width="400">4. Problems with effectiveness or bad reactions to dental anesthetic</td><td><input type="radio" name="field11a"  value = "Yes"   ></td><td><input type="radio" name="field11a"  value = "No"   ></td></tr>
<tr><td width="400">5. Orthodontic treatment (braces)</td><td><input type="radio" name="field12a"  value = "Yes"   ></td><td><input type="radio" name="field12a"  value = "No"   ></td></tr>
<tr><td width="400">6. Periodontal (gum) treatment</td><td><input type="radio" name="field13a"  value = "Yes"   ></td><td><input type="radio" name="field13a"  value = "No"   ></td></tr>
<tr><td width="400">7. Bleeding gums</td><td><input type="radio" name="field14a"  value = "Yes"   ></td><td><input type="radio" name="field14a"  value = "No"   ></td></tr>
<tr><td width="400">8. Avoid brushing any part of your mouth</td><td><input type="radio" name="field15a"  value = "Yes"   ></td><td><input type="radio" name="field15a"  value = "No"   ></td></tr>
<tr><td width="400">9. Part of your mouth is sensitive to temperature</td><td><input type="radio" name="field16a"  value = "Yes"   ></td><td><input type="radio" name="field16a"  value = "No"   ></td></tr>
<tr><td width="400">10. Sore teeth</td><td><input type="radio" name="field17a"  value = "Yes"   ></td><td><input type="radio" name="field17a"  value = "No"   ></td></tr>
<tr><td width="400">11. A burning sensation in your mouth</td><td><input type="radio" name="field18a"  value = "Yes"   ></td><td><input type="radio" name="field18a"  value = "No"   ></td></tr>
<tr><td width="400">12. Difficulty swallowing</td><td><input type="radio" name="field19a"  value = "Yes"   ></td><td><input type="radio" name="field19a"  value = "No"   ></td></tr>
<tr><td width="400">13. An unpleasant taste or odor in your mouth</td><td><input type="radio" name="field20a"  value = "Yes"   ></td><td><input type="radio" name="field20a"  value = "No"   ></td></tr>
<tr><td width="400">14. Dry mouth, throat, and or eyes</td><td><input type="radio" name="field21a"  value = "Yes"   ></td><td><input type="radio" name="field21a"  value = "No"   ></td></tr>
<tr><td width="400">15. Jaw problems (temporomandibular joint)</td><td><input type="radio" name="field22a"  value = "Yes"   ></td><td><input type="radio" name="field22a"  value = "No"   ></td></tr>
<tr><td width="400">16. Difficultly opening your mouth widely</td><td><input type="radio" name="field23a"  value = "Yes"   ></td><td><input type="radio" name="field23a"  value = "No"   ></td></tr>
<tr><td width="400">17. Stiff neck muscles</td><td><input type="radio" name="field24a"  value = "Yes"   ></td><td><input type="radio" name="field24a"  value = "No"   ></td></tr>
<tr><td width="400">18. Awaken with an awareness of your teeth or jaws</td><td><input type="radio" name="field25a"  value = "Yes"   ></td><td><input type="radio" name="field25a"  value = "No"   ></td></tr>
<tr><td width="400">19. Tension headaches</td><td><input type="radio" name="field26a"  value = "Yes"   ></td><td><input type="radio" name="field26a"  value = "No"   ></td></tr>
<tr><td width="400">20. Clench or grind your teeth</td><td><input type="radio" name="field27a"  value = "Yes"   ></td><td><input type="radio" name="field27a"  value = "No"   ></td></tr>
<tr><td width="400">21. Jaw clicking or popping</td><td><input type="radio" name="field28a"  value = "Yes"   ></td><td><input type="radio" name="field28a"  value = "No"   ></td></tr>
<tr><td width="400">22. Lost any teeth</td><td><input type="radio" name="field29a"  value = "Yes"   ></td><td><input type="radio" name="field29a"  value = "No"   ></td></tr>
<tr><td width="400">23. Do you sweat or tremble a lot during examination</td><td><input type="radio" name="field30a"  value = "Yes"   ></td><td><input type="radio" name="field30a"  value = "No"   ></td></tr>
<tr><td width="400">24. Do strange people or places make you afraid</td><td><input type="radio" name="field31a"  value = "Yes"   ></td><td><input type="radio" name="field31a"  value = "No"   ></td></tr>

</table>
<table width="450" align="left">
	<tr><td colspan="3"><div><h3>SUPPLEMENTAL DENTURE HISTORY</h3></div></td></tr>
    <tr><td colspan="3"  class="contact">
    If you are wearing a partial or complete artificial denture, please complete the following :</td></tr>
    <tr><td width="35"><strong>Yes</strong></td><td width="30"><strong>No</strong></td><td>&nbsp;</td></tr>
    <tr><td><input type="radio" name="field32a"  value = "Yes"   ></td><td><input type="radio" name="field32a"  value = "No"   ></td><td><div>Has your present denture been relined? When <input type="text" name="field33a"  value = ""   size="15"></div></td></tr>
    <tr><td><input type="radio" name="field34a"  value = "Yes"   ></td><td><input type="radio" name="field34a"  value = "No"   ></td><td><div>Is your present denture a problem? Describe <input type="text" name="field35a"  value = ""   size="50"></div></td></tr>
    <tr><td><input type="radio" name="field36a"  value = "Yes"   ></td><td><input type="radio" name="field36a"  value = "No"   ></td><td><div>Satisfied with the appearance?   <input type="text" name="field37a"  value = ""   size="50"></div></td></tr>
    <tr><td><input type="radio" name="field38a"  value = "Yes"   ></td><td><input type="radio" name="field38a"  value = "No"   ></td><td><div>Satisfied with the comfort?   <input type="text" name="field39a"  value = ""   size="50"></div></td></tr>    
    <tr><td><input type="radio" name="field40a"  value = "Yes"   ></td><td><input type="radio" name="field40a"  value = "No"   ></td><td><div>Satisfied with the chewing ability?  <input type="text" name="field41a"  value = ""   size="50"></div></td></tr>   
    <tr><td colspan="3">Please list any opertations, past medical conditions or medications been taken<br /><textarea name="field44a" style="width:500px""></textarea></td></tr>       
  </table>
<table width="450" align="right" style="margin-top:20px">
	<tr><td  class="contact">When did you receive your first partial or complete denture?</td><td  class="contact"><div><input type="text" name="field42a"  value = ""   size="50"></div></td></tr>
	<tr><td  class="contact">How long have you worn your present denture?</td><td  class="contact"><div><input type="text" name="field43a"  value = ""   size="50"></div></td></tr>    
  </table>
          </section>
          <section name="Step 3: Medical History">
          <table width="100%">
          <tr><td colspan="2"><div><h3>OTHER INFORMATION</h3></div></td></tr>
	<tr><td  class="contact">Name of physician</td><td  class="contact"><div><input type="text" name="field4b"  value = ""   size="50"></div></td></tr>
	<tr><td  class="contact">Reason for your last medical visit</td><td  class="contact"><div><input type="text" name="field5b"  value = ""   size="50"></div></td></tr>
	<tr><td  class="contact">What is your estimate of your general health?</td><td  class="contact"><div><select name='field6b'    ><option value=0>Select</option><option value='Poor'>Poor</option><option value='Fair'>Fair</option><option value='Good'>Good</option></select></div></td></tr>
</table>


<table width="100%"> 
<tr><td colspan="7"><div><h3>HAVE YOU EVER HAD THE FOLLOWING</h3></div></td></tr>
  <tr>
    <td></td>
    <td width="25"><b></b></td>
    <td width="25"><b></b></td>
    <td width="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="25"><b></b></td>
    <td width="25"><b></b></td>
  </tr>
  <tr>
    <td>1. Hospitalization for illness or injury</td>
    <td><input type="radio" name="field7b"  value = "Yes"   ></td><td><input type="radio" name="field7b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>26. Arthritis</td>
    <td><input type="radio" name="field32b"  value = "Yes"   ></td><td><input type="radio" name="field32b"  value = "No"   ></td>
  </tr>
  <tr>
    <td colspan="3">2. Allergic reaction to</td>
    <td>&nbsp;</td>
   	<td>27. Glaucoma</td>
    <td><input type="radio" name="field33b"  value = "Yes"   ></td><td><input type="radio" name="field33b"  value = "No"   ></td>
   </tr>
  <tr>
    <td rowspan="10">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%">&nbsp;</td>
        <td width="94%"><input type="checkbox" name="field80b"  value = "aspirin, ibuprofen, acetaminophen"   > Aspirin, ibuprofen, acetaminophen<br /><input type="checkbox" name="field81b"  value = "penicillin"   > Penicillin<br /><input type="checkbox" name="field82b"  value = "erythromycin"   > Erythromycin<br /><input type="checkbox" name="field83b"  value = "tetracycline"   > Tetracycline<br /><input type="checkbox" name="field84b"  value = "codeine"   > Codeine<br /><input type="checkbox" name="field85b"  value = "local anaesthetic"   > Local anaesthetic<br /><input type="checkbox" name="field86b"  value = "fluoride"   > Fluoride<br /><input type="checkbox" name="field87b"  value = "metals (gold, stainless steel)"   > Metals (gold, stainless steel)<br /><input type="checkbox" name="field88b"  value = "latex"   > Latex<br /><input type="checkbox" name="field89b"  value = "any other medications"   > any other medications<br /></td>
      </tr>
    </table>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>28. Contact lenses</td>
    <td><input type="radio" name="field34b"  value = "Yes"   ></td><td><input type="radio" name="field34b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>29. Head or neck injuries</td>
    <td><input type="radio" name="field35b"  value = "Yes"   ></td><td><input type="radio" name="field35b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>30. Epilepsy, convulsions (seizures)</td>
    <td><input type="radio" name="field36b"  value = "Yes"   ></td><td><input type="radio" name="field36b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>31. Viral infections and cold sores</td>
    <td><input type="radio" name="field37b"  value = "Yes"   ></td><td><input type="radio" name="field37b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>32. Any lumps or swelling in the mouth</td>
    <td><input type="radio" name="field38b"  value = "Yes"   ></td><td><input type="radio" name="field38b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>33. Hives, skin rash, hay fever</td>
    <td><input type="radio" name="field39b"  value = "Yes"   ></td><td><input type="radio" name="field39"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>34. Venereal disease</td>
    <td><input type="radio" name="field40b"  value = "Yes"   ></td><td><input type="radio" name="field40b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>35. Hepatitis </td>
    <td><input type="radio" name="field41b"  value = "Yes"   ></td><td><input type="radio" name="field41b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>36. HIV / AIDS</td>
    <td><input type="radio" name="field42b"  value = "Yes"   ></td><td><input type="radio" name="field42b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   	<td>37. Tumor, abnormal growth</td>
    <td><input type="radio" name="field43b"  value = "Yes"   ></td><td><input type="radio" name="field43b"  value = "No"   ></td>
  </tr>
      <tr>
   	<td>3. Heart problem</td>
    <td><input type="radio" name="field9b"  value = "Yes"   ></td><td><input type="radio" name="field9b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>38. Radiation therapy</td>
    <td><input type="radio" name="field44b"  value = "Yes"   ></td><td><input type="radio" name="field44b"  value = "No"   ></td>
  </tr>
     <tr>
   	<td>4. Heart murmur</td>
    <td><input type="radio" name="field10b"  value = "Yes"   ></td><td><input type="radio" name="field10b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>39. Chemotherapy</td>
    <td><input type="radio" name="field45b"  value = "Yes"   ></td><td><input type="radio" name="field45b"  value = "No"   ></td>
  </tr>
     <tr>
   	<td>5. Rheumatic fever</td>
    <td><input type="radio" name="field11b"  value = "Yes"   ></td><td><input type="radio" name="field11b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>40. Emotional problems</td>
    <td><input type="radio" name="field46b"  value = "Yes"   ></td><td><input type="radio" name="field46b"  value = "No"   ></td>
  </tr>
     <tr>
   	<td>6. Scarlet fever</td>
    <td><input type="radio" name="field12b"  value = "Yes"   ></td><td><input type="radio" name="field12b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>41. Psychiatric treatment</td>
    <td><input type="radio" name="field47b"  value = "Yes"   ></td><td><input type="radio" name="field47b"  value = "No"   ></td>
  </tr>
     <tr>
   	<td>7. High blood pressure</td>
    <td><input type="radio" name="field13b"  value = "Yes"   ></td><td><input type="radio" name="field13b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>42. Antidepressant medication</td>
    <td><input type="radio" name="field48b"  value = "Yes"   ></td><td><input type="radio" name="field48b"  value = "No"   ></td>
  </tr>
     <tr>
   	<td>8. Low blood pressure</td>
    <td><input type="radio" name="field14b"  value = "Yes"   ></td><td><input type="radio" name="field14b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>43. Alcohol/drug dependency</td>
    <td><input type="radio" name="field49b"  value = "Yes"   ></td><td><input type="radio" name="field49b"  value = "No"   ></td>
  </tr>
    <tr>
    <td>9. a Stroke</td>
    <td><input type="radio" name="field15b"  value = "Yes"   ></td><td><input type="radio" name="field15b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td colspan="3">
    <strong>Are you</strong></td>
  </tr>
    <tr>
   	<td>10. Artificial prosthesis (heart valve or joints)</td>
    <td><input type="radio" name="field16b"  value = "Yes"   ></td><td><input type="radio" name="field16b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>44. Presently being treated for any illness</td>
    <td><input type="radio" name="field50b"  value = "Yes"   ></td><td><input type="radio" name="field50b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>11. Anemia or other blood disorder</td>
    <td><input type="radio" name="field17b"  value = "Yes"   ></td><td><input type="radio" name="field17b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>45. Aware of a change in your general health</td>
    <td><input type="radio" name="field51b"  value = "Yes"   ></td><td><input type="radio" name="field51b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>12. Prolonged bleeding due to a slight cut</td>
    <td><input type="radio" name="field18b"  value = "Yes"   ></td><td><input type="radio" name="field18b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>46. Often exhausted or fatigued</td>
    <td><input type="radio" name="field52b"  value = "Yes"   ></td><td><input type="radio" name="field52b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>13. Emphysema</td>
    <td><input type="radio" name="field19b"  value = "Yes"   ></td><td><input type="radio" name="field19b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>47. Subject to frequent headaches</td>
    <td><input type="radio" name="field53b"  value = "Yes"   ></td><td><input type="radio" name="field53b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>14. Tuberculosis</td>
    <td><input type="radio" name="field20b"  value = "Yes"   ></td><td><input type="radio" name="field20b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>48. A heavy smoker (1 pack or more a day)</td>
    <td><input type="radio" name="field54b"  value = "Yes"   ></td><td><input type="radio" name="field54b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>15. Asthma</td>
    <td><input type="radio" name="field21b"  value = "Yes"   ></td><td><input type="radio" name="field21b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>49. Considered a touchy person</td>
    <td><input type="radio" name="field55b"  value = "Yes"   ></td><td><input type="radio" name="field55b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>16. Sinus problems</td>
    <td><input type="radio" name="field22b"  value = "Yes"   ></td><td><input type="radio" name="field22b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>50. Often unhappy or depressed</td>
    <td><input type="radio" name="field56b"  value = "Yes"   ></td><td><input type="radio" name="field56b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>17. Kidney disease</td>
    <td><input type="radio" name="field23b"  value = "Yes"   ></td><td><input type="radio" name="field23b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>51. Easily upset or irritated</td>
    <td><input type="radio" name="field57b"  value = "Yes"   ></td><td><input type="radio" name="field57b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>18. Liver disease</td>
    <td><input type="radio" name="field24b"  value = "Yes"   ></td><td><input type="radio" name="field24b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>52. FEMALE - taking birth control pills</td>
    <td><input type="radio" name="field58b"  value = "Yes"   ></td><td><input type="radio" name="field58b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>19. Jaundice</td>
    <td><input type="radio" name="field25b"  value = "Yes"   ></td><td><input type="radio" name="field25b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>53. FEMALE – pregnant</td>
    <td><input type="radio" name="field59b"  value = "Yes"   ></td><td><input type="radio" name="field59b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>20. Thyroid or parathyroid disease</td>
    <td><input type="radio" name="field26b"  value = "Yes"   ></td><td><input type="radio" name="field26b"  value = "No"   ></td>
    <td>&nbsp;</td>
   	<td>54. MALE - Prostate disorders</td>
    <td><input type="radio" name="field60b"  value = "Yes"   ></td><td><input type="radio" name="field60b"  value = "No"   ></td></td>
  </tr>
     <tr>
   	<td>21. Hormone deficiency</td>
    <td><input type="radio" name="field27b"  value = "Yes"   ></td><td><input type="radio" name="field27b"  value = "No"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>22. High cholesterol</td>
    <td><input type="radio" name="field28b"  value = "Yes"   ></td><td><input type="radio" name="field28b"  value = "No"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>23. Diabetes</td>
    <td><input type="radio" name="field29b"  value = "Yes"   ></td><td><input type="radio" name="field29b"  value = "No"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>24. Stomach or duodenal ulcer</td>
    <td><input type="radio" name="field30b"  value = "Yes"   ></td><td><input type="radio" name="field30b"  value = "No"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
   	<td>25. Digestive disorders</td>
    <td><input type="radio" name="field31b"  value = "Yes"   ></td><td><input type="radio" name="field31b"  value = "No"   ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   </table><br />
<div>Please describe any current medical treatment, impending surgery, or other medical treatment<br /><textarea name="field61" style="width:500px"></textarea></div>
<br />
<div>List any medications, herbal supplements, and or vitamins taken within the last two years (Please bring list if have been prescribed by your doctor.)<br /><textarea name="field62"  style="width:500px"></textarea></div>

          </section>
<hr>
      <div style="width:100%;text-align:center;padding-top:20px;padding-bottom:20px">
        <button type="submit" id="sendAll" >Submit Information</button>
        <button id="cancel" type="button" onClick="parent.location='{$_BASE_URL}'">Cancel</button>
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
          exclude: 'Select'
        }
      },
      'field1': {
        filters: 'exclude',
        data: {
          exclude: ['0']
        },
        errors : {
          exclude: 'Select Gender'
        }
      },
      'field6b': {
        filters: 'exclude',
        data: {
          exclude: ['0']
        },
        errors : {
          exclude: 'Select Gender Health'
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