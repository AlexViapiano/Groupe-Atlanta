{capture name=form}
<h2>Confidental Information</h2>
<small>* Fields are mandetory</small>
<h3>Information</h3><br />
<table>
<tr><td  class="contact">* Gender</td><td  class="contact">Man <input type="radio" name="gender" value="man" />  Woman <input type="radio" name="gender" value="woman" /> <span class="form_error">{$error_msg.gender}</span></td></tr>
<tr><td  class="contact">* First name</td><td  class="contact"><input type="text" name="firstname" size="50" /> <span class="form_error">{$error_msg.firstname}</span></td></tr>
<tr><td  class="contact">* Last name</td><td  class="contact"><input type="text" name="lastname" size="50" />  <span class="form_error">{$error_msg.lastname}</span></td></tr>
<tr><td  class="contact">* Email address</td><td  class="contact"><input type="text" name="email" size="50" />  <span class="form_error">{$error_msg.email}</span></td></tr>
<tr><td  class="contact">* Address</td><td  class="contact"><input type="text" name="address" size="50" />  <span class="form_error">{$error_msg.address}</span></td></tr>
<tr><td  class="contact">* City</td><td  class="contact"><input type="text" name="city" size="50" />  <span class="form_error">{$error_msg.city}</span></td></tr>
<tr><td  class="contact">* Postal Code</td><td  class="contact"><input type="text" name="postal" size="50" />  <span class="form_error">{$error_msg.postal}</span></td></tr>
<tr><td  class="contact">Cell phone</td><td  class="contact"><input type="text" name="cell" size="50" /></td></tr>
<tr><td  class="contact">* Home phone</td><td  class="contact"><input type="text" name="home" size="50" />  <span class="form_error">{$error_msg.home}</span></td></tr>
<tr><td  class="contact">Work phone</td><td  class="contact"><input type="text" name="work" size="50" /></td></tr>
<tr><td  class="contact">Ok to call at work?</td><td  class="contact">{include file="$cwd/includes/modules/forms/templates/yesno.tpl" name="call_work"}</td></tr>
<tr><td  class="contact">Date of birth</td><td  class="contact">{html_select_date name="sub_dob" prefix="dob" time=$dob start_year="-80" display_days=true reverse_years=true} </td></tr>
</table>
<h3>Other Information</h3>
<table>
<tr><td  class="contact">Marial status</td><td  class="contact"><select name="status"><option>Married</option><option>Single</option><option>Seperated</option><option>Divorced</option><option>Widow</option></select> </td></tr>
<tr><td  class="contact">Underage 18</td><td  class="contact">{include file="$cwd/includes/modules/forms/templates/yesno.tpl" name="underage"}</td></tr>
<tr><td  class="contact">Patient's / guardian's employer</td><td  class="contact"><input type="text" name="employer" size="50" /></td></tr>
<tr><td  class="contact">Occupation</td><td  class="contact"><input type="text" name="occupation" size="50" /></td></tr>
<tr><td  class="contact">Employer address</td><td  class="contact"><input type="text" name="emp_address" size="50" /></td></tr>
</table>
<h3>Spouse Information</h3>
<table>
<tr><td  class="contact">Full name</td><td  class="contact"><input type="text" name="sp_name" size="50" /></td></tr>
<tr><td  class="contact">Employer</td><td  class="contact"><input type="text" name="sp_employer" size="50" /></td></tr>
<tr><td  class="contact">Employer address</td><td  class="contact"><input type="text" name="sp_employer_address" size="50" /></td></tr>
<tr><td  class="contact">Phone</td><td  class="contact"><input type="text" name="sp_phone" size="50" /></td></tr>
</table>
<h3>Person to contact in case of emergency</h3>
<table>
<tr><td  class="contact">Full name</td><td  class="contact"><input type="text" name="contact_name" size="50" /></td></tr>
<tr><td  class="contact">Relationship</td><td  class="contact"><input type="text" name="contact_relation" size="50" /></td></tr>
<tr><td  class="contact">Work phone</td><td  class="contact"><input type="text" name="contact_work" size="50" /></td></tr>
<tr><td  class="contact">Home phone</td><td  class="contact"><input type="text" name="contact_home" size="50" /></td></tr>
</table>
<h3>Our Survey</h3>
<table>
<tr><td  class="contact">Other family members that are patients here</td><td  class="contact"><input type="text" name="family" size="50" /></td></tr>
<tr><td  class="contact">Who can we thank for referring you</td><td  class="contact"><input type="text" name="refere" size="50" /></td></tr>
</table>
<input type="hidden" name="form_type" value="confidential" />
<br />
<br />

<h3>Assignment & Release</h3>

<p>I am financially responsible for any balances due and authorize the dentists to release any information for this claim. I authorize that my records can be used by the doctor if he so determines.
In consideration of the services rendered to me by this dental office I am obligated to pay said office in accordance with its credit terms and policy.
I consent to the making of videotapes, photographs, and x-rays before, during and after treatment, and to the use of same by the doctor in scientific papers or demonstrations.
</p>
{/capture}
{include file="$cwd/includes/modules/forms/templates/form_title.tpl" content=$smarty.capture.form title="CONFIDENTIAL INFORMATION QUESTIONNAIRE" action="dental-history"}