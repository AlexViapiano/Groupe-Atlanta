<?php

define('MODULE', 'forms');
include('class.form.php');

$forms['en'] = array('confidential-information'				=> 'Confidential Information', 
					 'dental-history' 						=> 'Dental History',
				/*	 'confidential-information-insurance'	=> 'Insurance Information',*/
					 'medical-history'						=> 'Medical History');
					 
$forms['fr'] = array('confidential-information'				=> 'Formulaire confidentiel', 
					 'dental-history' 						=> 'Antecedents dentaires',
				/*	 'confidential-information-insurance'	=> 'Formulaire d\'assurance',*/
					 'medical-history'						=> 'Antecedents medicaux');
					 
$extra['form_action'] = $languageid == 'en' ? 'online-forms' : 'formulaires-en-ligne';
$extra['forms'] = $forms[$languageid];
$extra['pagetitle'] = $current_module['page_title_'.$languageid];
$form_data = unserialize($_GET['data']);
$use_data = !empty($form_data['firstname']) && !empty($form_data['lastname']);

$use_form = $_GET['fill'];
$form_file = 'includes/modules/forms/'.$use_form.'.php';
$url = $current_module['seo_url_'.$languageid];
if (isset($_GET['completed']))
	$extra['completed'] = $languageid=='en' ? 
	'Your forms have been sent successfully, thank you for having filled out our forms.' : 'Vos formulaires ont été envoyés avec succès. Merci d\'avoir rempli nos formulaires.';
	
if (isset($_GET['failed']))
	$extra['completed'] = $languageid=='en' ? 
	'An error has occurred and we did not receive your forms. Please try again later or contact us to inform us of the issue if it persists.' : 
	'Une erreur s\'est produite et nous n\'avons pas re&ccedil;u vos formulaires. S\'il vous pla&icirc;t r&eacute;essayer plus tard ou nous contacter pour nous des informer sur la question si elle persiste.';	

$script['en'] = 'Warning! You are about to lose any information that you have entered into the form. To continue entering information on the form press the stay on page button. Thank you.';
$script['fr'] = 'Attention! Vous êtes sur le point de perdre toute information que vous avez saisies dans le formulaire. Pour continuer à entrer des informations dans le formulaire appuyez sur le bouton rester sur cette page. Merci';
$extra['form_script'] = "
<script type=\"text/javascript\">
var isDirty = false;
var submitted = false;
var msg = '".$script[$languageid]."';

$(document).ready(function(){
    $(':input').change(function(){
        if(!isDirty){
            isDirty = true;
        }
    });                       
                $('form').submit(function(){
                                                submitted = true;
    });
    
    window.onbeforeunload = function(){
        if(isDirty && !submitted){
            return msg;
        }
    };
    
});
</script>

";
if (file_exists($form_file) && isset($extra['form_action'][$use_form]))
   {
	  include($form_file);
	  if ($form->processed)
	      {
			    $subject = $form->name;
				foreach ($_POST as $key => $value)
				  if (empty($value))
				  	  $_POST[$key] = '';
				if ($first_form)
				   {
					   $_POST['firstname'] = $_POST['field2'];
					   $_POST['lastname'] = $_POST['field3'];
					   $_GET['data'] = serialize(array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname']));			   
				   }
				$form = fetch_template(CWD.'/includes/modules/forms/templates/tpl_'.$use_form.'-layout-'.$languageid, $languageid);
				if (!sendmail('info@cliniquedentaireileperrot.ca', utf8_decode($subject), utf8_decode($form)))
					redirect($url.'?failed');
				$form_list = array_keys($extra['forms']);
				for ($i=0; $i<count($form_list); $i++)
				{
				  if ($form_list[$i] == $use_form && ($i < count($form_list) -1 ))
					redirect($url.'?fill='.$form_list[$i+1].'&data='.$_GET['data']);
				}
				redirect($url.'?completed');
		  }
	  
	  $extra['button'] = $languageid == 'en' ? ' Submit and continue ' : ' Envoyer et continuer ';
	  $extra['do'] = $use_form;
	  $extra['input'] = $form->input;
	  $extra['info'] = $form->info;
	  $extra['form_name'] = $form->name;
	  $extra['titles'] = $form->titles;
	  $extra['mandetory'] = $form->mandetory;
	  $extra['viewpage'] = fetch_template(CWD.'/includes/modules/forms/templates/tpl_'.$use_form, $languageid);	  
   }
else
    $extra['viewpage'] = fetch_template(CWD.'/includes/modules/forms/templates/tpl_form_home_'.$languageid, $languageid);	

$extra['PAGE'] =  'forms_'.$languageid;

/*$forms['en'] = array('confidential-information'				=> 'Confidential Information', 
					 'dental-history' 						=> 'Dental History',
					 'confidential-information-insurance'	=> 'Insurance Information',
					 'medical-history'						=> 'Medical History');
					 
$forms['fr'] = array('confidential-information'				=> 'Formulaire confidentiel', 
					 'dental-history' 						=> 'Ant&eacute;c&eacute;dents dentaires',
					 'confidential-information-insurance'	=> 'Formulaire d\'assurance',
					 'medical-history'						=> 'Ant&eacute;c&eacute;dents m&eacute;dicaux');

$form = $_GET['fill'].'-'.$languageid;

$extra['submitted'] = $_POST['do'] == 'submitted';
$extra['form_data'] = unserialize($_GET['data']);
/*
if ($_POST['form_type'] == 'confidential')
   {
	$Process->input->clean_array_gpc('p', array(
	 	'gender'				=> TYPE_STR,
		'firstname'    	    	=> TYPE_STR,
		'lastname'            	=> TYPE_STR,	
		'home'      	     	=> TYPE_STR,
		'address'      	     	=> TYPE_STR,					
		'city'      	     	=> TYPE_STR,
		'postal'      	     	=> TYPE_STR,				
		'email'		         	=> TYPE_STR));
			   
	$Process->input->required(array(
		'gender'            	=> TYPE_TITLE,	
		'firstname'            	=> TYPE_TITLE,	
		'lastname'      	    => TYPE_TITLE,			
		'home'            		=> TYPE_TITLE,		
		'address'      	     	=> TYPE_TITLE,					
		'city'      	     	=> TYPE_TITLE,
		'postal'      	     	=> TYPE_TITLE,				
		'email'            		=> TYPE_EMAIL));
    
	if (!count($Process->input->error_msg))
	  {
		$form = fetch_template(CWD.'/includes/modules/forms/templates/tpl_'.$_GET['fill'].'-layout-'.$languageid, $languageid);
		sendmail('fsfeir@hotmail.com', $_GET['fill'], $form);
		redirect('online-forms?fill=dental-history&data='.serialize(array('firstname' => $Process->GPC['firstname'], 'lastname' => $Process->GPC['lastname'])));
	  }
   }*/
/*
if ($_POST['form_type'] == 'dental')
	redirect('online-forms?fill=confidential-information-insurance&data='.$_GET['data']);

if ($_POST['form_type'] == 'insurance')
	redirect('online-forms?fill=medical-history&data='.$_GET['data']);


/*if (file_exists('includes/modules/forms/templates/tpl_'.$form.'.tpl') && isset($_GET['fill']))
   {
     $extra['pagetitle'] = $forms[$languageid][$_GET['fill']];
	 $extra['viewpage'] = fetch_template(CWD.'/includes/modules/forms/templates/tpl_'.$form, $languageid);
//	echo  $extra['PAGE'] =  $form;	  
/*	  if ($extra['submitted'])
		  sendmail('fsfeir@hotmail.com', 'Online Form', $email_form);
	  echo $email_form;
	  die;
   }
else*/

	
?>
	