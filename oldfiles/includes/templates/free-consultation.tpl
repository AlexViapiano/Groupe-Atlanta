<link rel="stylesheet" href="includes/templates/css/avgrund.css">
<link href="includes/templates/css/jquery.idealforms.css" rel="stylesheet"/>
<div class="avgrund-popup">
{if $current_language == 'en'}
<h2>Get Your Free Dental Consultation</h2>
<p>A free dental consultation session can be scheduled to better guide you in making positive and informed decisions about your dental health.</p>
<form id="my-form" action="contact-us" method="post">
	<input type="hidden" name="do" value="consultation">
	<div><label>Name:</label><input id="name" name="name" type="text"   data-ideal="name" placeholder="Your full name"/></div>
    <div><label>Phone:</label><input id="phone" name="phone" type="tel"  data-ideal="phone" placeholder="Contact phone number"/></div>
    <div><label>E-Mail:</label><input id="email" name="email" data-ideal="required email" type="email" placeholder="Your email address"/></div>
    <div>
        <button type="submit">Book Now</button>
        <button  onClick="parent.location='{$_BASE_URL}'" type="button">Cancel</button>
    </div>
</form>
{else}
<h2>Consultation gratuite</h2>
<p>Planifiez une session de consultation dentaire gratuite pour vous permettre de prendre des décisions positives et informées au sujet de votre santé dentaire.</p>
<form id="my-form" action="contactez-nous" method="post">
	<input type="hidden" name="do" value="consultation">
	<div><label>Nom:</label><input id="name" name="name" type="text"   data-ideal="name" placeholder="Votre nom complet"/></div>
    <div><label>Téléphone:</label><input id="phone" name="phone" type="tel"  data-ideal="phone" placeholder="Numéro pour vous contacter"/></div>
    <div><label>E-Mail:</label><input id="email" name="email" data-ideal="required email" type="email" placeholder="Votre adresse de courriel"/></div>
    <div>
        <button type="submit">Réserver maintenant</button>
        <button  onClick="parent.location='{$_BASE_URL}'" type="button">Annuler</button>
    </div>
</form>
{/if}
</div>

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.min.js"></script>
<script src="includes/scripts/min/jquery.idealforms-{$current_language}.min.js"></script>
{literal}
<script>

  var options = {

    onFail: function() {
      alert( $myform.getInvalid().length +' invalid fields.' )
    },

    inputs: {
      'password': {
        filters: 'required pass',
      },
      'username': {
        filters: 'required username',
        data: {
          //ajax: { url:'validate.php' }
        }
      },
      'file': {
        filters: 'extension',
        data: { extension: ['jpg'] }
      },

      'comments': {
        filters: 'min max',
        data: { min: 50, max: 200 }
      },
      'states': {
        filters: 'exclude',
        data: { exclude: ['default'] },
        errors : {
          exclude: 'Select a State.'
        }
      },
      'langs[]': {
        filters: 'min max',
        data: { min: 2, max: 3 },
        errors: {
          min: 'Check at least <strong>2</strong> options.',
          max: 'No more than <strong>3</strong> options allowed.'
        }
      }
    }
  };

  var $myform = $('#my-form').idealforms(options).data('idealforms');

  $('#reset').click(function(){ $myform.reset().fresh().focusFirst() });
  $myform.focusFirst();

</script>
{/literal}		