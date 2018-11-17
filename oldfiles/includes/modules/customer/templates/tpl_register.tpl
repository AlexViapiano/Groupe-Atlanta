<script type="text/javascript" src="includes/scripts/calendardateinput.js"></script> 
<form action="{$scriptpath}" name="register" method="post" onsubmit="return verify_passwords(password, passwordconfirm);">
<input type="hidden" name="s" value="{$session.sessionhash}" />
{$token}
<input type="hidden" name="do" value="addmember" />
<table cellpadding="0" cellspacing="0" border="0" align="center" class="content_wrapper_table">
<tr>
 <td class="content_wrapper_td">
 
	<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">
	<tr><td class="cont_heading_td">My Account Information</td></tr></table>								
  
   <table cellpadding="0" cellspacing="0" border="0" class="content_wrapper1_table">
  <tr>
   <td class="content_wrapper1_td">	
	<table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td class="smallText"><br><font color="#FF0000"><small><b>NOTE:</b></font></small> If you already have an account with us, please login at the <a href="login"><u>login page</u></a>.</td>
      </tr>
      <tr>
        <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
      </tr>
		
		<table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main indent_2"><b>Your Personal Details</b></td>
           <td class="inputRequirement" align="right">* Required information</td>
          </tr>
        </table>
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Gender:</strong></td>
                <td class="main radio"><input type="radio" name="sex" value="1"  style="background:url({$path_img}/spacer.gif) 0px 0px repeat;border:0px"> Male <input type="radio" name="sex" value="2"  style="background:url({$path_img}/spacer.gif) 0px 0px repeat;border:0px"> Female&nbsp;<span class="inputRequirement">*</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>First Name:</strong></td>
                <td class="main width2_100"><input type="text" name="firstname">&nbsp;<span class="inputRequirement">* {$error_msg.firstname}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Last Name:</strong></td>
                <td class="main width2_100"><input type="text" name="lastname">&nbsp;<span class="inputRequirement">* {$error_msg.lastname}</span></td>
              </tr>
              <tr>
                <td class="main "><strong>Date of Birth:</strong></td>
                <td class="main" width="100"><script>DateInput("dob", true, "YYYY-MM-DD")</script></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>E-Mail Address:</strong></td>
                <td class="main width2_100"><input type="text" name="email">&nbsp;<span class="inputRequirement">* {$error_msg.email}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Confirm E-Mail Address:</strong></td>
                <td class="main width2_100"><input type="text" name="email_confirm">&nbsp;<span class="inputRequirement">*</span></td>
              </tr>

            </table>
 
</td></tr>
	</table>		
 
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>
	<table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td class="main indent_2"><b>Company Details</b></td>
      </tr>
	</table>
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Company Name:</strong></td>
                <td class="main width2_100"><input type="text" name="company_name">&nbsp;</td>
              </tr>
            </table>
				
</td></tr>
	</table>
 
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>
    <table cellpadding="0" cellspacing="0" border="0">
	  <tr>
        <td class="main indent_2"><b>Your Address</b></td>
      </tr>
	</table>
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Street Address:</strong></td>
                <td class="main width2_100"><input type="text" name="address"></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Post Code:</strong></td>
                <td class="main width2_100"><input type="text" name="zipcode"></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>City:</strong></td>
                <td class="main width2_100"><input type="text" name="city"></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>State/Province:</strong></td>
                <td class="main width2_100">
<input type="text" name="state"> </td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Country:</strong></td>
                <td class="main width2_100">{$country}</td>
              </tr>
            </table>
				
</td></tr>
	</table>
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>
	<table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td class="main indent_2"><b>Your Contact Information</b></td>
      </tr>
	</table>
					
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Telephone Number:</strong></td>
                <td class="main width2_100"><input type="text" name="phone"></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Fax Number:</strong></td>
                <td class="main width2_100"><input type="text" name="fax">&nbsp;</td>
              </tr>
            </table>
				
</td></tr>
	</table>
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Newsletter:</strong></td>
                <td class="main radio"><input type="checkbox" name="newsletter" value="1"  style="background:url({$path_img}/spacer.gif) 0px 0px repeat;border:0px">&nbsp;</td>
              </tr>
            </table>
				
</td></tr>
	</table>
{$captcha}
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>				
<table cellpadding="0" cellspacing="5" border="0"><tr><td>
			<table border="0" width="100%" cellspacing="0" cellpadding="2">
				<tr><td><input type="submit" value="{$phrase.register}" alt="{$phrase.register}" title=" {$phrase.register} "></td></tr>
            </table>
				
</td></tr></table>	
</td></tr>
  </table>      		
</td></tr>
  				</table>
	</form>