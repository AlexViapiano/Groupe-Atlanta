<div style="text-align:center">
  <h2>Customer List</h2></div>
<table border="1">
<tr>
  <td style="padding:2px">Full name</td>
  <td style="padding:2px">Email</td>  
  <td style="padding:2px">Address</td>  
  <td style="padding:2px">City</td>  
  <td style="padding:2px">State</td>  
  <td style="padding:2px">Country</td>  
  <td style="padding:2px">Postal</td>    
  <td style="padding:2px">Type</td>  
  <td style="padding:2px">Total Amount</td>  
</tr>
{foreach from=$customers item=user name=info_links}
   <tr>
   	  <td style="padding:2px">{$user.lastname} {$user.firstname}</td>
   	  <td style="padding:2px"><a href="mailto:{$user.email}">{$user.email}</a></td>      
   	  <td style="padding:2px">{$user.address}</td>
   	  <td style="padding:2px">{$user.city}</td>      
   	  <td style="padding:2px">{$user.prov}</td>    
   	  <td style="padding:2px">{$user.country}</td>        
   	  <td style="padding:2px">{$user.postal}</td>      
   	  <td style="padding:2px">{$user.type}</td>            
   	  <td style="padding:2px">${$user.total_amount}</td>                  
   </tr>
{/foreach}
</table>

