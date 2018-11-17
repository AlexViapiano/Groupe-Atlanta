  <link rel="stylesheet" href="includes/templates/css/jjquery_forms.css">
   <div class="container_24">     
   <a href="directions"><img src="includes/templates/images/top_map.jpg" style="border:1px solid #CCC;margin-bottom:20px" /> </a>        
                  <div class="indent6">
                  		<div class=" container">
                        	<div class="grid_14 bg2" style="width:465px">
                            	<div style="padding: 0 20px 0 0">
                                       
<h2>Find Us</h2>
                                    <div>
                                    <div itemscope itemtype="http://schema.org/Dentist">
	                                      <p>
                                         <span itemprop="contactPoint"><h3>Dr Alvaro de la Fuente</h3></span> 
<span itemprop="description">General dentist - provides dental services to Île-Perrot, the West Island, Pierrefonds, Vaudreuil-Dorion and surrounding areas.</span></p>
<span itemprop="name"><h3>Clinique dentaire Île-Perrot</h3></span>
<strong>Plaza Grand Boul</strong><br />
 <span itemprop="address">475 Grand Boulevard Suite 16<br />Île-Perrot, QC J7V 4X4</span><br />
 <br />
<strong>Phone:</strong> <span itemprop="telephone">514.453.0830</span><br />
<br /><strong>Email:</strong> <a href="mailto:info@dentperrot.com"><span itemprop="email">info@cliniquedentaireileperrot.ca</span></a>
<br />
<br />
<table>
  <tbody>
  	<tr><td colspan="2"><h3>Business Hours</h3></td></tr>
    <tr>
      <td valign="top" width="120"><strong>Sunday</strong></td>
      <td valign="top"><strong>Emergency service - Call us!</strong></td>
    </tr>
    <tr>
      <td valign="top"><strong>Monday</strong></td>
      <td valign="top">7:30 am – 5:00 pm</td>
    </tr>
    <tr>
      <td valign="top"><strong>Tuesday</strong></td>
      <td valign="top">8:30 am – 8:00 pm</td>
    </tr>
    <tr>
      <td valign="top"><strong>Wednesday</strong></td>
      <td valign="top">8:30 am – 8:00 pm</td>
    </tr>
    <tr>
      <td valign="top"><strong>Thursday</strong></td>
      <td valign="top">7:30 am – 8:00 pm</td>
    </tr>
    <tr>
      <td valign="top"><strong>Friday</strong></td>
      <td valign="top">7:30 am – 5:00 pm</td>
    </tr>
    <tr>
      <td valign="top"><strong>Saturday</strong></td>
      <td valign="top">9:00 am – 5:00 pm</td>
    </tr>
  </tbody>
</table>
</p>
                                    </div>
                                    </div>

                              </div>
                            </div>
                            <div class="grid_10 omega" style="width:465px">
                            	<div class=" pad2">
                                      	<h2>Contact Form</h2>
                                    {if isset($smarty.get.success)}<p style=" color:#F00">Your request has been sent successfully!</p>{/if}
                                    <p>Thank you for your interest in our services. You may either call us at <strong style=" font-size:14px">514.453.0830</strong> or please fill out the form below and one of our team members will contact you shortly. We look forward to seeing you soon</p>
                                       <!-- <form id="form" action="{$scriptpath}" method="post">-->
                                        <form action="{$scriptpath}" novalidate autocomplete="off" class="idealforms">

        <div class="idealsteps-wrap">
            <div class="field">
              <label class="main">Name:</label>
              <input name="name" type="text" placeholder="Your full name">
              <span class="error"></span>
            </div>

            <div class="field">
              <label class="main">E-Mail:</label>
              <input name="email" type="email" placeholder="Your email address">
              <span class="error"></span>
            </div>
   
            <div class="field">
              <label class="main">Phone:</label>
              <input name="phone" type="text" placeholder="514-555-5555">
              <span class="error"></span>
            </div>

            <div class="field">
              <label class="main">Comments:</label>
              <textarea name="comments" placeholder="How can we help you?" cols="30" rows="11"></textarea>
              <span class="error"></span>
            </div>

            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="submit" class="submit">Submit</button>
            </div>

        </div>

        <span id="invalid"></span>

      </form> <br/>
<br/>
{literal}
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="includes/scripts/jquery_forms.js"></script>
  <!--<script src="js/out/jquery.idealforms.min.js"></script>-->
  <script>

    $('form.idealforms').idealforms({

      silentLoad: true,

      rules: {
        'name': 'required',
        'email': 'required email',
        'phone': 'required phone',
      },
	  
	  onSubmit: function(invalid, e) {
        e.preventDefault();
        $('#invalid')
          .show()
          .toggleClass('valid', ! invalid)
      }
    });

    $('form.idealforms').find('input, select, textarea').on('change keyup', function() {
      $('#invalid').hide();
    });

    $('form.idealforms').idealforms('addRules', {
      'comments': 'required minmax:10:150'
    });


  </script>
  {/literal}
                                </div>
                                
                            </div>
                        </div>
                  </div>
              </div>

<br />
<br />
<br />

