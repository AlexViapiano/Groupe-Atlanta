{capture name=form}
<h2>Dental History</h2>
<h3>Personal Information</h3>
<table>
<tr><td  class="contact">Name</td><td  class="contact"><input type="text" name="name" size="50" value="{$form_data.firstname} {$form_data.lastname}" /></td></tr>
<tr><td  class="contact">Referred by</td><td  class="contact"><input type="text" name="referred_by" size="50" /></td></tr>
<tr><td  class="contact">Most recent dental exam</td><td  class="contact"><input type="text" name="dental_exam" size="50" /></td></tr>
<tr><td  class="contact">Most recent dental X-RAY</td><td  class="contact"><input type="text" name="dental_xray" size="50" /></td></tr>
<tr><td  class="contact">Most recent dental treatment</td><td  class="contact"><input type="text" name="dental_treatment" size="50" /></td></tr>
<tr><td  class="contact">How often d you have your teeth cleaned?</td><td  class="contact"><select name="clean_teeth"><option>3 month</option><option>4 month</option><option>6 month</option><option>1 year or longer</option></select></td></tr>
<tr><td  class="contact">What is your immedidate dentail concern?</td><td  class="contact"><input type="text" name="concern" size="50" /></td></tr>
</table>
<h3>Please Answer The Following</h3>
<table> 
<tr><td></td><td><b>YES</b></td><td><b> No</b></td></tr>
<tr><td>1. unhappy with the appearance of your teeth</td><td><input type="radio" name="opt1" /></td><td><input type="radio" name="opt1" /></td></tr>
<tr><td>2. unfavorable dental experiences</td><td><input type="radio" name="opt2" /></td><td><input type="radio" name="opt2" /></td></tr>
<tr><td>3. dental fears</td><td><input type="radio" name="opt3" /></td><td><input type="radio" name="opt3" /></td></tr>
<tr><td>4. problems with effectiveness or bad reactions to dental anesthetic</td><td><input type="radio" name="opt4" /></td><td><input type="radio" name="opt4" /></td></tr>
<tr><td>5. orthodontic treatment (braces) when</td><td><input type="radio" name="opt5" /></td><td><input type="radio" name="opt5" /></td></tr>
<tr><td>6. periodontal (gum) treatment when</td><td><input type="radio" name="opt6" /></td><td><input type="radio" name="opt6" /></td></tr>
<tr><td>7. bleeding gums</td><td><input type="radio" name="opt7" /></td><td><input type="radio" name="opt7" /></td></tr>
<tr><td>8. avoid brushing any part of your mouth </td><td><input type="radio" name="opt8" /></td><td><input type="radio" name="opt8" /></td></tr>
<tr><td>9. part of your mouth is sensitive to temperature</td><td><input type="radio" name="opt9" /></td><td><input type="radio" name="opt9" /></td></tr>
<tr><td>10. sore teeth</td><td><input type="radio" name="opt10" /></td><td><input type="radio" name="opt10" /></td></tr>
<tr><td>11. a burning sensation in your mouth</td><td><input type="radio" name="opt11" /></td><td><input type="radio" name="opt11" /></td></tr>
<tr><td>12. difficulty swallowing</td><td><input type="radio" name="" /></td><td><input type="radio" name="" /></td></tr>
<tr><td>13. an unpleasant taste or odor in your mouth</td><td><input type="radio" name="opt12" /></td><td><input type="radio" name="opt12" /></td></tr>
<tr><td>14. dry mouth, throat, and or eyes</td><td><input type="radio" name="opt13" /></td><td><input type="radio" name="opt13" /></td></tr>
<tr><td>15. jaw problems (temporomandibular joint)</td><td><input type="radio" name="opt14" /></td><td><input type="radio" name="opt14" /></td></tr>
<tr><td>16. difficultly opening your mouth widely</td><td><input type="radio" name="opt15" /></td><td><input type="radio" name="opt15" /></td></tr>
<tr><td>17. stiff neck muscles</td><td><input type="radio" name="opt16" /></td><td><input type="radio" name="opt16" /></td></tr>
<tr><td>18. awaken with an awareness of your teeth or jaws</td><td><input type="radio" name="opt17" /></td><td><input type="radio" name="opt17" /></td></tr>
<tr><td>19. tension headaches</td><td><input type="radio" name="opt18" /></td><td><input type="radio" name="opt18" /></td></tr>
<tr><td>20. clench or grind your teeth</td><td><input type="radio" name="opt19" /></td><td><input type="radio" name="opt19" /></td></tr>
<tr><td>21. jaw clicking or popping</td><td><input type="radio" name="opt20" /></td><td><input type="radio" name="opt20" /></td></tr>
<tr><td>22. lost any teeth</td><td><input type="radio" name="opt21" /></td><td><input type="radio" name="opt21" /></td></tr>
<tr><td>23. do you sweat or tremble a lot during examination</td><td><input type="radio" name="opt22" /></td><td><input type="radio" name="opt22" /></td></tr>
<tr><td>24. do strange people or places make you afraid</td><td><input type="radio" name="opt23" /></td><td><input type="radio" name="opt23" /></td></tr>
</table><br />
<h3>Supplemental Denture History</h3>
<table>
<tr><td colspan="2">
  <table>
    <tr><td colspan="3">If you are wearing a partial or complete artificial denture, please complete the following :</td></tr>
    <tr><td>YES</td><td>NO</td><td>(Please check Yes or No)</td></tr>
    <tr><td><input type="radio" name="ans1" /></td><td><input type="radio" name="ans1" /></td><td>Has your present denture been relined? When <input type="text"  size="40" name="ans1_val" /></td></tr>
	<tr><td><input type="radio" name="ans2" /></td><td><input type="radio" name="ans2" /></td><td>Is your present denture a problem? Describe <input type="text"  size="40"  name="ans2_val" /></td></tr>
    <tr><td><input type="radio" name="ans3" /></td><td><input type="radio" name="ans3" /></td><td>Satisfied with the appearance? <input type="text"  size="40" name="ans3_val"  /></td></tr>
    <tr><td><input type="radio" name="ans4" /></td><td><input type="radio" name="ans4" /></td><td>Satisfied with the comfort?  <input type="text"   size="40" name="ans4_val" /></td></tr>
    <tr><td><input type="radio" name="ans5" /></td><td><input type="radio" name="ans5" /></td><td>Satisfied with the chewing ability? <input type="text"  size="40"   name="ans5_val"/></td></tr>
  </table>
</td>
</tr>
    <tr><td class="contact">When did you receive your first partial or complete denture?</td><td class="contact">  <input type="text"  name="first_denture" size="40" /></td></tr>
    <tr><td class="contact">How long have you worn your present denture? </td><td  class="contact"><input type="text" name="present_denture"  size="40" /></td></tr>
</table>
<input type="hidden" name="form_type" value="dental" />
{/capture}
{include file="$cwd/includes/modules/forms/templates/form_title.tpl" content=$smarty.capture.form title="DENTAL HISTORY" action="confidential-information-insurance"}