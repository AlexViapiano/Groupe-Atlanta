{capture name=form}
<h2>Insurance and Financial Information</h2>
<h3>Name of Patient</h3>
<table>
<tr><td  class="contact">First name</td><td  class="contact"><input type="text" name="fistname" size="50" value="{$form_data.firstname}" /></td></tr>
<tr><td  class="contact">Middle name</td><td  class="contact"><input type="text" name="middlename" size="50" /></td></tr>
<tr><td  class="contact">Last name</td><td  class="contact"><input type="text" name="lastname" size="50" value="{$form_data.lastname}" /></td></tr>
</table>
<h3>Insurance Company</h3>
<table>
<tr><td  class="contact">Isurance coverage</td><td  class="contact">{include file="$cwd/includes/modules/forms/templates/yesno.tpl" name="ins_coverage"}</td></tr>
<tr><td  class="contact">Company name</td><td  class="contact"><input type="text" name="ins_name" size="50" /></td></tr>
<tr><td  class="contact">Phone</td><td  class="contact"><input type="text" name="ins_phone" size="50" /></td></tr>
<tr><td  class="contact">Address</td><td  class="contact"><input type="text" name="ins_address" size="50" /></td></tr>
<tr><td  class="contact">Subscriber's name</td><td  class="contact"><input type="text" name="ins_sub" size="50" /></td></tr>
<tr><td  class="contact">Patient's relationship with subscriber</td><td  class="contact"><input type="text" name="ins_relation" size="50" /></td></tr>
<tr><td  class="contact">Subscriber's date of birth</td><td  class="contact">{html_select_date name="sub_dob" prefix="sub_dob" time=$dob start_year="-80" display_days=true reverse_years=true} </td></tr>
<tr><td  class="contact">Group / Program number</td><td  class="contact"><input type="text" name="ins_number" size="50" /></td></tr>
<tr><td  class="contact">Certificate number</td><td  class="contact"><input type="text" name="ins_certificate" size="50" /></td></tr>
<tr><td  class="contact">Employer (if different from above)</td><td  class="contact"><input type="text" name="ins_employer" size="50" /></td></tr>
<tr><td  class="contact">Employer address</td><td  class="contact"><input type="text" name="ins_address" size="50" /></td></tr>
</table>

<h3>Insurance Company</h3>
<table>
<tr><td  class="contact">Second coverage</td><td  class="contact">{include file="$cwd/includes/modules/forms/templates/yesno.tpl" name="ins2_coverage"}</td></tr>
<tr><td  class="contact">Company name</td><td  class="contact"><input type="text" name="ins2_name" size="50" /></td></tr>
<tr><td  class="contact">Phone</td><td  class="contact"><input type="text" name="ins2_phone" size="50" /></td></tr>
<tr><td  class="contact">Address</td><td  class="contact"><input type="text" name="ins2_address" size="50" /></td></tr>
<tr><td  class="contact">Subscriber's name</td><td  class="contact"><input type="text" name="ins2_sub" size="50" /></td></tr>
<tr><td  class="contact">Patient's relationship with subscriber</td><td  class="contact"><input type="text" name="ins2_relation" size="50" /></td></tr>
<tr><td  class="contact">Subscriber's date of birth</td><td  class="contact">{html_select_date name="sub2_dob" prefix="sub2_dob" time=$dob start_year="-80" display_days=true reverse_years=true} </td></tr>
<tr><td  class="contact">Group / Program number</td><td  class="contact"><input type="text" name="ins2_number" size="50" /></td></tr>
<tr><td  class="contact">Certificate number</td><td  class="contact"><input type="text" name="ins2_certificate" size="50" /></td></tr>
<tr><td  class="contact">Employer (if different from above)</td><td  class="contact"><input type="text" name="ins2_employer" size="50" /></td></tr>
<tr><td  class="contact">Employer address</td><td  class="contact"><input type="text" name="ins2_address" size="50" /></td></tr>
</table>
<br />
<br />
<input type="hidden" name="form_type" value="insurance" />
<h3>ASSIGNMENT &amp; RELEASE</h3>

<p>I authorize release, to my dental benefits plan administrator, information contained in claims submitted electronically. This authorization shall continue in effect until the undersigned revokes the same.</p>

<p>I am financially responsible for any balances due and authorize the dentists to release any information for this claim.</p>

{/capture}
{include file="$cwd/includes/modules/forms/templates/form_title.tpl" content=$smarty.capture.form action="medical-history"}