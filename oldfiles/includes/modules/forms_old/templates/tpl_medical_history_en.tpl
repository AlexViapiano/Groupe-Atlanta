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
<h2>MEDICAL HISTORY</h2>
<form>
<table>
<tr>
	<td>Patient Name</td><td><input type="text" name="patient_name"></td>
	<td>Nickname</td><td><input type="text" name="patient_nickname"></td>
</tr>
<tr>
	<td>Birth Date (DD/MM/YY)</td><td><input type="text" name="birth"></td>
    <td>Name of Physician</td><td><input type="text" name="name_phy"></td>
</tr>
<tr>
	<td>Most recent physical examination</td><td><input type="text" name="recent_exam"></td>
    <td>Purpose</td><td><input type="text" name="purpose"></td>
</tr>
<tr><td colspan="4">What is your estimate of your general health? 
<input type="radio" name="health"> Poor
<input type="radio" name="health"> Fair
<input type="radio" name="health">  Good</td></tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>HAVE YOU EVER HAD THE FOLLOWING</strong></td>
    <td>YES</td>
    <td>NO</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>YES</td>
    <td>NO</td>
  </tr>
  <tr>
    <td>1. hospitalization for illness or injury</td>
    <td>
      <input type="radio" name="radio1"  value="radio">
 </td>
    <td><input type="radio" name="radio1" id="radio2" value="radio"></td>
    <td>&nbsp;</td>
    <td>26.  arthritis</td>
    <td><input type="radio" name="radio26" id="radio49" value="radio"></td>
    <td><input type="radio" name="radio26" id="radio50" value="radio"></td>
  </tr>
  <tr>
    <td colspan="3">2. allergic  reaction to        </td>
    <td>&nbsp;</td>
    <td>27.  glaucoma</td>
    <td><input type="radio" name="radio27" id="radio51" value="radio"></td>
  <td><input type="radio" name="radio27" id="radio53" value="radio"></td    
  ></tr>
  <tr>
    <td rowspan="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%">&nbsp;</td>
        <td width="94%"><input type="checkbox" name="checkbox" id="checkbox">
          <label for="checkbox"></label>
          aspirin,  ibuprofen, acetaminophen</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox2" id="checkbox2">
          penicillin</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox3" id="checkbox3">
          erythromycin</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox4" id="checkbox4">
          tetracycline</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox5" id="checkbox5">
          codeine</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox6" id="checkbox6">
          local  anaesthetic</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox7" id="checkbox7">
          fluoride</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox8" id="checkbox8">
          metals  (gold, stainless steel)</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox9" id="checkbox9">
          latex</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="checkbox" name="checkbox10" id="checkbox10">
          any  other medications</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>28.  contact lenses</td>
    <td><input type="radio" name="radio28" id="radio52" value="radio"></td>
    <td><input type="radio" name="radio28" id="radio54" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>29.  head or neck injuries</td>
    <td><input type="radio" name="radio29" id="radio55" value="radio"></td>
    <td><input type="radio" name="radio29" id="radio56" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>30.  epilepsy, convulsions (seizures)</td>
    <td><input type="radio" name="radio30" id="radio57" value="radio"></td>
    <td><input type="radio" name="radio30" id="radio58" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>31.  viral infections and cold sores</td>
    <td><input type="radio" name="radio31" id="radio59" value="radio"></td>
    <td><input type="radio" name="radio31" id="radio60" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>32.  any lumps or swelling in the mouth</td>
    <td><input type="radio" name="radio32" id="radio61" value="radio"></td>
    <td><input type="radio" name="radio32" id="radio62" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>33.  hives, skin rash, hay fever</td>
    <td><input type="radio" name="radio33" id="radio63" value="radio"></td>
    <td><input type="radio" name="radio33" id="radio64" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>34.  venereal disease</td>
    <td><input type="radio" name="radio34" id="radio65" value="radio"></td>
    <td><input type="radio" name="radio34" id="radio66" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>35.  hepatitis (type          )</td>
    <td><input type="radio" name="radio35" id="radio67" value="radio"></td>
    <td><input type="radio" name="radio35" id="radio68" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>36.  HIV / AIDS</td>
    <td><input type="radio" name="radio36" id="radio69" value="radio"></td>
    <td><input type="radio" name="radio36" id="radio70" value="radio"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>37.  tumor, abnormal growth</td>
    <td><input type="radio" name="radio37" id="radio71" value="radio"></td>
    <td><input type="radio" name="radio37" id="radio72" value="radio"></td>
  </tr>
  <tr>
    <td>3.  heart problem</td>
    <td><input type="radio" name="radio3" id="radio3" value="radio"></td>
    <td><input type="radio" name="radio3" id="radio4" value="radio"></td>
    <td>&nbsp;</td>
    <td>38.  radiation therapy</td>
    <td><input type="radio" name="radio38" id="radio73" value="radio"></td>
    <td><input type="radio" name="radio38" id="radio74" value="radio"></td>
  </tr>
  <tr>
    <td>4.  heart murmur</td>
    <td><input type="radio" name="radio4" id="radio5" value="radio"></td>
    <td><input type="radio" name="radio4" id="radio6" value="radio"></td>
    <td>&nbsp;</td>
    <td>39.  chemotherapy</td>
    <td><input type="radio" name="radio39" id="radio75" value="radio"></td>
    <td><input type="radio" name="radio39" id="radio76" value="radio"></td>
  </tr>
  <tr>
    <td>5.  rheumatic fever</td>
    <td><input type="radio" name="radio5" id="radio7" value="radio"></td>
    <td><input type="radio" name="radio5" id="radio8" value="radio"></td>
    <td>&nbsp;</td>
    <td>40.  emotional problems</td>
    <td><input type="radio" name="radio40" id="radio77" value="radio"></td>
    <td><input type="radio" name="radio40" id="radio78" value="radio"></td>
  </tr>
  <tr>
    <td>6.  scarlet fever</td>
    <td><input type="radio" name="radio6" id="radio9" value="radio"></td>
    <td><input type="radio" name="radio6" id="radio10" value="radio"></td>
    <td>&nbsp;</td>
    <td>41.  psychiatric treatment</td>
    <td><input type="radio" name="radio41" id="radio79" value="radio"></td>
    <td><input type="radio" name="radio41" id="radio80" value="radio"></td>
  </tr>
  <tr>
    <td>7.  high blood pressure</td>
    <td><input type="radio" name="radio7" id="radio11" value="radio"></td>
    <td><input type="radio" name="radio7" id="radio12" value="radio"></td>
    <td>&nbsp;</td>
    <td>42.  antidepressant medication</td>
    <td><input type="radio" name="radio42" id="radio81" value="radio"></td>
    <td><input type="radio" name="radio43" id="radio82" value="radio"></td>
  </tr>
  <tr>
    <td>8.  low blood pressure</td>
    <td><input type="radio" name="radio8" id="radio13" value="radio"></td>
    <td><input type="radio" name="radio8" id="radio14" value="radio"></td>
    <td>&nbsp;</td>
    <td>43.  alcohol/drug dependency</td>
    <td><input type="radio" name="radio43" id="radio83" value="radio"></td>
    <td><input type="radio" name="radio43" id="radio84" value="radio"></td>
  </tr>
  <tr>
    <td>9.  a stroke</td>
    <td><input type="radio" name="radio9" id="radio15" value="radio"></td>
    <td><input type="radio" name="radio9" id="radio16" value="radio"></td>
    <td>&nbsp;</td>
    <td colspan="3">ARE YOU:</td>
  </tr>
  <tr>
    <td>10.  artificial prosthesis (heart  valve or joints)</td>
    <td><input type="radio" name="radio10" id="radio17" value="radio"></td>
    <td><input type="radio" name="radio10" id="radio18" value="radio"></td>
    <td>&nbsp;</td>
    <td>44.  presently being treated for any illness</td>
    <td><input type="radio" name="radio44" id="radio85" value="radio"></td>
    <td><input type="radio" name="radio44" id="radio86" value="radio"></td>
  </tr>
  <tr>
    <td>11.  anemia or other blood disorder</td>
    <td><input type="radio" name="radio11" id="radio19" value="radio"></td>
    <td><input type="radio" name="radio11" id="radio20" value="radio"></td>
    <td>&nbsp;</td>
    <td>45.  aware of a change in  your general health</td>
    <td><input type="radio" name="radio45" id="radio87" value="radio"></td>
    <td><input type="radio" name="radio45" id="radio88" value="radio"></td>
  </tr>
  <tr>
    <td>12.  prolonged bleeding due  to a slight cut</td>
    <td><input type="radio" name="radio12" id="radio21" value="radio"></td>
    <td><input type="radio" name="radio12" id="radio22" value="radio"></td>
    <td>&nbsp;</td>
    <td>46.  often exhausted or fatigued</td>
    <td><input type="radio" name="radio46" id="radio89" value="radio"></td>
    <td><input type="radio" name="radio46" id="radio90" value="radio"></td>
  </tr>
  <tr>
    <td>13.  emphysema</td>
    <td><input type="radio" name="radio13" id="radio23" value="radio"></td>
    <td><input type="radio" name="radio13" id="radio24" value="radio"></td>
    <td>&nbsp;</td>
    <td>47.  subject to frequent headaches</td>
    <td><input type="radio" name="radio47" id="radio91" value="radio"></td>
    <td><input type="radio" name="radio47" id="radio92" value="radio"></td>
  </tr>
  <tr>
    <td>14.  tuberculosis</td>
    <td><input type="radio" name="radio14" id="radio25" value="radio"></td>
    <td><input type="radio" name="radio14" id="radio26" value="radio"></td>
    <td>&nbsp;</td>
    <td>48.  a heavy smoker (1 pack or more a day)</td>
    <td><input type="radio" name="radio48" id="radio93" value="radio"></td>
    <td><input type="radio" name="radio48" id="radio94" value="radio"></td>
  </tr>
  <tr>
    <td>15.  asthma</td>
    <td><input type="radio" name="radio15" id="radio27" value="radio"></td>
    <td><input type="radio" name="radio15" id="radio28" value="radio"></td>
    <td>&nbsp;</td>
    <td>49.  considered a touchy person</td>
    <td><input type="radio" name="radio49" id="radio95" value="radio"></td>
    <td><input type="radio" name="radio49" id="radio96" value="radio"></td>
  </tr>
  <tr>
    <td>16.  sinus problems</td>
    <td><input type="radio" name="radio16" id="radio29" value="radio"></td>
    <td><input type="radio" name="radio16" id="radio30" value="radio"></td>
    <td>&nbsp;</td>
    <td>50.  often unhappy or depressed</td>
    <td><input type="radio" name="radio50" id="radio97" value="radio"></td>
    <td><input type="radio" name="radio50" id="radio98" value="radio"></td>
  </tr>
  <tr>
    <td>17.  kidney disease</td>
    <td><input type="radio" name="radio17" id="radio31" value="radio"></td>
    <td><input type="radio" name="radio17" id="radio32" value="radio"></td>
    <td>&nbsp;</td>
    <td>51.  easily upset or irritated</td>
    <td><input type="radio" name="radio51" id="radio99" value="radio"></td>
    <td><input type="radio" name="radio51" id="radio100" value="radio"></td>
  </tr>
  <tr>
    <td>18.  liver disease</td>
    <td><input type="radio" name="radio18" id="radio33" value="radio"></td>
    <td><input type="radio" name="radio18" id="radio34" value="radio"></td>
    <td>&nbsp;</td>
    <td>52.  FEMALE - taking birth control pills</td>
    <td><input type="radio" name="radio52" id="radio101" value="radio"></td>
    <td><input type="radio" name="radio52" id="radio102" value="radio"></td>
  </tr>
  <tr>
    <td>19.  jaundice</td>
    <td><input type="radio" name="radio19" id="radio35" value="radio"></td>
    <td><input type="radio" name="radio19" id="radio36" value="radio"></td>
    <td>&nbsp;</td>
    <td>53.  FEMALE – pregnant</td>
    <td><input type="radio" name="radio53" id="radio103" value="radio"></td>
    <td><input type="radio" name="radio53" id="radio106" value="radio"></td>
  </tr>
  <tr>
    <td>20.  thyroid or parathyroid disease</td>
    <td><input type="radio" name="radio20" id="radio37" value="radio"></td>
    <td><input type="radio" name="radio20" id="radio38" value="radio"></td>
    <td>&nbsp;</td>
    <td>54.  MALE - Prostate disorders</td>
    <td><input type="radio" name="radio54" id="radio104" value="radio"></td>
    <td><input type="radio" name="radio54" id="radio105" value="radio"></td>
  </tr>
  <tr>
    <td>21.  hormone deficiency</td>
    <td><input type="radio" name="radio21" id="radio39" value="radio"></td>
    <td><input type="radio" name="radio21" id="radio40" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>22.  high cholesterol</td>
    <td><input type="radio" name="radio22" id="radio41" value="radio"></td>
    <td><input type="radio" name="radio22" id="radio42" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>23.  diabetes</td>
    <td><input type="radio" name="radio23" id="radio43" value="radio"></td>
    <td><input type="radio" name="radio23" id="radio44" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>24.  stomach or duodenal ulcer</td>
    <td><input type="radio" name="radio24" id="radio45" value="radio"></td>
    <td><input type="radio" name="radio24" id="radio46" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>25.  digestive disorders</td>
    <td><input type="radio" name="radio25" id="radio47" value="radio"></td>
    <td><input type="radio" name="radio25" id="radio48" value="radio"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<br />
<p>Please describe any current medical treatment, impending surgery, or other medical treatment
  <br />
  <textarea cols="80" rows="3"></textarea>
</p>
<p>List any medications, herbal supplements, and or vitamins taken within the last two years (Please bring list if have been prescribed by your doctor.)
  <br />
  <textarea cols="80" rows="3"></textarea>
</p>
<p>PLEASE ADVISE US IN THE FUTURE OF ANY CHANGE IN YOUR MEDICAL HISTORY OR ANY MEDICATIONS YOU MAY BE TAKING.</p>
</form>