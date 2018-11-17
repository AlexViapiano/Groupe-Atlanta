<form action="{$scriptpath}" name="register" method="post" onsubmit="return verify_passwords(password, passwordconfirm);">
<input type="hidden" name="s" value="{$session.sessionhash}" />
{$token}
<input type="hidden" name="do" value="shipping_method" />
<table cellpadding="0" cellspacing="0" border="0" align="center" class="content_wrapper_table">
<tr>
 <td class="content_wrapper_td">
 
	<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">
	<tr><td class="cont_heading_td">Shipping Method</td></tr></table>								
  
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