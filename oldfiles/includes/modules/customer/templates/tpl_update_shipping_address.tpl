<script type="text/javascript" src="includes/scripts/calendardateinput.js"></script> 
<form action="{$scriptpath}" name="register" method="post" onsubmit="return verify_passwords(password, passwordconfirm);">
<input type="hidden" name="s" value="{$session.sessionhash}" />
{$token}
<input type="hidden" name="do" value="update_shipping" />
<table cellpadding="0" cellspacing="0" border="0" align="center" class="content_wrapper_table">
<tr>
 <td class="content_wrapper_td">
 
	<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">
	<tr><td class="cont_heading_td">Account Information</td></tr></table>								
  
   <table cellpadding="0" cellspacing="0" border="0" class="content_wrapper1_table">
  <tr>
   <td class="content_wrapper1_td">	
	<table cellpadding="0" cellspacing="0" border="0">
        <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
      </tr>
		
		<table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main indent_2"><b>Company Information</b></td>
           <td class="inputRequirement" align="right">* Required information</td>
          </tr>
        </table>
 
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>
			
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Company Name:</strong></td>
                <td class="main width2_100"><input type="text" name="company_name" value="{$userinfo.company_name}">&nbsp;</td>
              </tr>
            </table>
				
</td></tr>
	</table>
 
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>
    <table cellpadding="0" cellspacing="0" border="0">
	  <tr>
        <td class="main indent_2"><b>Shipping Address</b></td>
      </tr>
	</table>
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Street Address:</strong></td>
                <td class="main width2_100"><input type="text" name="address" value="{$userinfo.address}">&nbsp;<span class="inputRequirement">* {$error_msg.address}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Postal Code:</strong></td>
                <td class="main width2_100"><input type="text" name="zipcode" value="{$userinfo.zipcode}">&nbsp;<span class="inputRequirement">* {$error_msg.zipcode}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>City:</strong></td>
                <td class="main width2_100"><input type="text" name="city" value="{$userinfo.city}">&nbsp;<span class="inputRequirement">* {$error_msg.city}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>State/Province:</strong></td>
                <td class="main width2_100">{$state}</td>
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
        <td class="main indent_2"><b>Contact Information</b></td>
      </tr>
	</table>
					
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Telephone Number:</strong></td>
                <td class="main width2_100"><input type="text" name="phone" value="{$userinfo.phone}">&nbsp;<span class="inputRequirement">* {$error_msg.phone}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Fax Number:</strong></td>
                <td class="main width2_100"><input type="text" name="fax" value="{$userinfo.fax}">&nbsp;</td>
              </tr>
            </table>
				
</td></tr>
	</table>
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>
    <table cellpadding="0" cellspacing="0" border="0">
	  <tr>
        <td class="main indent_2"><b>Billing Address</b> <input type="checkbox" {if $shipping_as_billing} checked="checked"{/if} name="shipping_as_billing" onclick="toggleDisplay('shipping_address')" /><small>Same as shipping address</small></td>
      </tr>
	</table>
<script type='text/javascript' src='includes/scripts/default.js'></script>		
 <div id="shipping_address" {if $shipping_as_billing} style="display:none" {else} style="display:block"{/if}>
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
			<table border="0" cellspacing="4" cellpadding="2">
              <tr>
                <td class="main b_width"><strong>Street Address:</strong></td>
                <td class="main width2_100"><input type="text" name="ship_address" value="{$userinfo.ship_address}">&nbsp;<span class="inputRequirement">* {$error_msg.ship_address}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Postal Code:</strong></td>
                <td class="main width2_100"><input type="text" name="ship_zipcode" value="{$userinfo.ship_zipcode}">&nbsp;<span class="inputRequirement">* {$error_msg.ship_zipcode}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>City:</strong></td>
                <td class="main width2_100"><input type="text" name="ship_city" value="{$userinfo.ship_city}">&nbsp;<span class="inputRequirement">* {$error_msg.ship_city}</span></td>
              </tr>
              <tr>
                <td class="main b_width"><strong>State/Province:</strong></td>
                <td class="main width2_100">{$ship_state}</td>
              </tr>
              <tr>
                <td class="main b_width"><strong>Country:</strong></td>
                <td class="main width2_100">{$ship_country}</td>
              </tr>
            </table>
            
</td></tr>
	</table>
</div>
				
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>				
<table cellpadding="0" cellspacing="5" border="0"><tr><td>
			<table border="0" width="100%" cellspacing="0" cellpadding="2">
				<tr><td><input type="submit" value="{$phrase.continue}" alt="{$phrase.register}" title=" {$phrase.register} " name="continue"></td></tr>
            </table>
				
</td></tr></table>	
</td></tr>
  </table>      		
</td></tr>
  				</table>
	</form>