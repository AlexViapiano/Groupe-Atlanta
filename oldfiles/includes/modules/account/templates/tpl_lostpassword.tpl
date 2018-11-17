<form name=forgotpassword action="{$scriptpth}" method="post">
    		<input type="hidden" name="s" value="{$session.sessionhash}" />
		{$token}
   		<input type=hidden name=do value=lostpassword />
				<table cellpadding="0" cellspacing="0" border="0" align="center" class="content_wrapper_table">
					<tr><td class="content_wrapper_td">
				<table border="0" width="100%" cellspacing="0" cellpadding="0"  class="cont_heading_table">
  <tr>
    <td  class="cont_heading_td">I've Forgotten My Password!</td>
  </tr>
</table>
								
  
  <table cellpadding="0" cellspacing="0" border="0" class="content_wrapper1_table">
		<tr><td class="content_wrapper1_td">
        {if $error_msg.email}
    <table cellpadding="0" cellspacing="0" border="0">
	  <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr class="messageStackError">
    <td class="messageStackError">
    <img src="{$path_img}/error.gif" border="0" alt="Error" title=" Error " width="10" height="10">
    &nbsp;Error: {$error_msg.email}</td>
  </tr>
</table>
</td>
      </tr>
      <tr>
        <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
      </tr>
	</table>
		{/if}
				
 
			<table border="0" width="100%" height="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
              </tr>
              <tr>
                <td class="main" colspan="2">If you've forgotten your password, enter your e-mail address below and we'll send you an e-mail message containing your new password.</td>
              </tr>
              <tr>
                <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
              </tr>
              <tr>
                <td class="main"><b>E-Mail Address:</b> <input type="text" name="email" value="{$smarty.post.email}"></td>
              </tr>
              <tr>
                <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
              </tr>
            </table>
            
 
		
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>				
<table cellpadding="0" cellspacing="5" border="0"><tr><td>
			<table border="0" width="100%" cellspacing="0" cellpadding="2">
				<tr><td></td>
                <td align="right"><input type="submit" value="{$phrase.reset_password}" alt="{$phrase.reset_password}" title=" {$phrase.reset_password} "></td></tr>
            </table>
				
</td></tr></table>
</td></tr>
  </table>      		
</td></tr>
  				</table>	
	</form>