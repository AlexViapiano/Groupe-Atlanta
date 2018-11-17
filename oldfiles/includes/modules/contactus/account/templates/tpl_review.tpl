<table cellpadding="0" cellspacing="0" border="0" align="center" class="content_wrapper_table">
					<tr><td class="content_wrapper_td">
 
<table cellpadding="0" cellspacing="0" border="0" class="cont_heading_table">
	<tr><td class="cont_heading_td">
				Review & Checkout		
</td></tr>
</table>								
  
  <table cellpadding="0" cellspacing="0" border="0" class="content_wrapper1_table">
		<tr>
		  <td class="content_wrapper1_td"> 
 
<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>	
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="main indent_2" width="35%"><b>Shipping &amp; Billing</b></td>
			<td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
            <td class="main indent_2" width="65%"><b>Invoice Information</b></td>
          </tr>
          <tr>
            <td height="100%">
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
				<table border="0" width="100%" height="100%" cellspacing="5" cellpadding="0">
                  <tr>
                    <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                  </tr>
                  <tr>
                    <td class="main" style="height:100%;">
                    <u>Prefered Shipping:</u><br /><br />
                    {if empty($shipping_rate)}
                    	<strong>Free shipping</strong>
                    {else}
                    {$shipping_method}: {$shipping_rate|string_format:"$format_price"}
                    {/if}
                    <br /><hr /><br />
                    <u>Ship To:</u><br /><br />
					{$userinfo.firstname} {$userinfo.lastname}<br />
                    {$userinfo.address}<br />
					{$userinfo.city}, {$userinfo.state}<br />
					{$userinfo.country}, {$userinfo.zipcode}

                    {if !$userinfo.shipping_as_billing}
<br /><hr><br />                    
                    <u>Bill To:</u><br /><br />
					{$userinfo.ship_contact}<br />
                    {$userinfo.ship_address}<br />
					{$userinfo.ship_city}, {$userinfo.ship_state}<br />
					{$userinfo.ship_country}, {$userinfo.ship_zipcode}
                   {/if}
                    </td>
                  </tr>
                </table>
				
</td></tr>
	</table>
			</td>
			<td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="1" height="1"></td>
            <td height="100%">
				
 
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="infoBox_">
		<tr><td class="infoBox__">
	<table border="0" width="100%" height="100%" cellspacing="5" cellpadding="0">
                  <tr>
                    <td><img src="{$path_img}/pixel_trans.gif" border="0" alt="" width="100%" height="10"></td>
                  </tr>
                  <tr>
                    <td class="main" style="height:100%;">
                    <u>Cart Contents:</u><br /><br />
                    {foreach from=$cart_contents item=product key=barcode}
                     <ul> <strong>{$product.qty} x {$product.title}</strong>
                        <li>Price: {$product.total_price|string_format:"$format_price"}</li>
                      	{if $product.selected_size}
                      		<li>Color: {$product.selected_size}</li>
                      	{/if}
                      	{if $product.selected_color}
                      		<li>Color: {$product.select_color}</li>
                      	{/if}
                      </ul><br /><br />
                    {/foreach}
                    <br /> <div align="right">______________</div>                   
                    <div align="right">Subtotal: {$cart_subtotal|string_format:"$format_price"}</div>                    <br /><br />
					{if !empty($shipping_rate)}
                    <u>Shipping:</u><br /><br />
					<strong>{$shipping_method}</strong>                   
                    <br /> <div align="right">______________</div>  
                    <div align="right">Rate: {$shipping_rate|string_format:"$format_price"}</div>
                    {/if}
                    <br />
                    {if $cart_tax1}
                    <u>Taxes:</u>
                    <br /> <div align="right">______________</div>  
					<div align="right">TPS: {$cart_tax1|string_format:"$format_price"}</div>   
                      {if $cart_tax2}
						<div align="right">TVQ: {$cart_tax2|string_format:"$format_price"}</div>                       
                      {/if}
                    <br />         
                    {/if}           
                    <br />
                    <u>Total:</u>
                    <br /> <div align="right">______________</div>  
					<div align="right">{$cart_total|string_format:"$format_price"}</div>   
                    <br />
                  </tr>
                </table>
				
</td></tr>
	</table>
			</td>
          </tr>
        </table>
	<div style="padding:0px 0px 0px 0px;"><img src="{$path_img}/spacer.gif" border="0" alt="" width="1" height="1"></div>				
<table cellpadding="0" cellspacing="5" border="0"><tr><td>
			<table border="0" width="100%" cellspacing="0" cellpadding="2">
				<tr><td>{$checkout_button}</td></tr>
            </table>
				
</td></tr></table>	
</td></tr>
  </table>      		
</td></tr>
  				</table>
