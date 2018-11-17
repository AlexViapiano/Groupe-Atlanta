<?php /* Smarty version Smarty-3.1.3, created on 2017-08-16 22:11:31
         compiled from "/home/content/85/8502785/html/groupeatlanta/includes/modules/contactus/templates/tpl_contactus_fr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12354705125994fb5377c597-43293128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '251afb33094f1ccf6e9501ee3bee8244fd48b1f4' => 
    array (
      0 => '/home/content/85/8502785/html/groupeatlanta/includes/modules/contactus/templates/tpl_contactus_fr.tpl',
      1 => 1470022083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12354705125994fb5377c597-43293128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'scriptpath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5994fb5399b52',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5994fb5399b52')) {function content_5994fb5399b52($_smarty_tpl) {?>  <link rel="stylesheet" href="includes/templates/css/jjquery_forms.css">
   <div class="container_24">     
   <a href="directions"><img src="includes/templates/images/top_map.jpg" style="border:1px solid #CCC;margin-bottom:20px" /> </a>        
                  <div class="indent6">
                  		<div class=" container">
                        	<div class="grid_14 bg2" style="width:465px">
                            	<div style="padding: 0 20px 0 0">
                                 <h2>Notre clinique</h2>
                                    <div>
                                    <div itemscope itemtype="http://schema.org/Dentist">
	                                      <p> <span itemprop="contactPoint"><h3>Dr Alvaro de la Fuente</h3></span>
<span itemprop="description">Chirurgien dentiste - dispense des soins dentaires à Île-Perrot, l'Ouest de l'île, Pierrefonds, Vaudreuil-Dorion et les environs: Appelez-nous ou contactez-nous.</span></p>
<span itemprop="name">
<h3>Clinique dentaire Île-Perrot</h3></span>
<strong>Plaza Grand Boul</strong><br />
<span itemprop="address">475 Grand Boulevard Suite 16<br />
Île-Perrot, QC J7V 4X4</span><br />
<br />

<strong>Téléphone:</strong> <span itemprop="telephone">514.453.0830</span><br />
<br />
<strong>Courriel: </strong> <a href="mailto:info@dentperrot.com"><span itemprop="email">info@cliniquedentaireileperrot.ca</span></a>
<br />
<br />
<table>
  <tbody>
  	<tr>
  	  <td colspan="2"><h3>Heures d'ouverture</h3></td></tr>
    <tr>
      <td valign="top" width="120">Dimanche</td>
      <td valign="top"><strong>Service d'urgence - Appelez-nous!</strong></td>
    </tr>
    <tr>
      <td valign="top">Lundi</td>
      <td valign="top">7h30  – 17h00 </td>
    </tr>
    <tr>
      <td valign="top">Mardi</td>
      <td valign="top">8h30  – 20h00 </td>
    </tr>
    <tr>
      <td valign="top">Mercredi</td>
      <td valign="top">8h30  – 20h00 </td>
    </tr>
    <tr>
      <td valign="top">Jeudi</td>
      <td valign="top">7h30  – 20h00 </td>
    </tr>
    <tr>
      <td valign="top">Vendredi</td>
      <td valign="top">7h30  – 17h00 </td>
    </tr>
    <tr>
      <td valign="top">Samedi</td>
      <td valign="top">9h00  – 17h00 </td>
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
                                 <h2>Formulaire de contact</h2>
                                    <?php if (isset($_GET['success'])){?><p style=" color:#F00">Votre demande a bien &eacute;t&eacute; envoy&eacute;!</p>
                                    <?php }?>
                                    <p>Merci de votre intérêt pour nos services. Vous pouvez nous téléphoner au <strong style=" font-size:14px">514.453.0830</strong> ou encore remplir le formulaire ci-dessous. Un membre de notre équipe communiquera avec vous pour prendre rendez-vous. Nous espérons vous voir bientôt.</p>
                                       <!-- <form id="form" action="<?php echo $_smarty_tpl->tpl_vars['scriptpath']->value;?>
" method="post">-->
                                        <form action="<?php echo $_smarty_tpl->tpl_vars['scriptpath']->value;?>
" novalidate autocomplete="off" class="idealforms">

        <div class="idealsteps-wrap">
            <div class="field">
              <label class="main">Nom:</label>
              <input name="name" type="text" placeholder="Votre nom complet">
              <span class="error"></span>
            </div>

            <div class="field">
              <label class="main">Courriel:</label>
              <input name="email" type="email" placeholder="Votre adresse courriel">
              <span class="error"></span>
            </div>
   
            <div class="field">
              <label class="main">Tél:</label>
              <input name="phone" type="text" placeholder="514-555-5555">
              <span class="error"></span>
            </div>

            <div class="field">
              <label class="main">Commentaires:</label>
              <textarea name="comments" placeholder="Comment pouvons-nous vous aider?" cols="30" rows="6"></textarea>
              <span class="error"></span>
            </div>

            <div class="field buttons">
              <label class="main">&nbsp;</label>
              <button type="submit" class="submit">Soumettre</button>
            </div>

        </div>

        <span id="invalid"></span>

      </form> <br/>
<br/>

<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="includes/scripts/jquery_forms_fr.js"></script>
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
             
                              </div>
                                
                            </div>
                        </div>
                  </div>
              </div>

<br />
<br />
<br />

<?php }} ?>