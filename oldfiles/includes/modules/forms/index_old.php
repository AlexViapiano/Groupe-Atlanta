<?php

define('MODULE', 'forms');

$forms = array('en' => 
				array('confid'	 => 'Confidential Information',
					  'dental'	 => 'Dental History',
					  'medical'	 => 'Medical History'),
				'fr'=>
				array('confid'	 => 'Formulaire confidentiel',
					  'dental'	 => 'Antecedents dentaires',
					  'medical'	 => 'Antecedents medicaux')
				);
				
if ($_POST['do'] == 'forms')
{
	$confid = fetch_template(CWD.'/includes/modules/forms/templates/tpl_confidential-information-layout-'.$languageid, $languageid);
	$dental = fetch_template(CWD.'/includes/modules/forms/templates/tpl_dental-history-layout-'.$languageid, $languageid);	
	$medical = fetch_template(CWD.'/includes/modules/forms/templates/tpl_medical-history-layout-'.$languageid, $languageid);	
	sendmail('consultation@cliniquedentaireileperrot.ca', $forms[$languageid]['confid'], utf8_decode($confid));
	sendmail('consultation@cliniquedentaireileperrot.ca', $forms[$languageid]['dental'], utf8_decode($dental));
	sendmail('consultation@cliniquedentaireileperrot.ca', $forms[$languageid]['medical'], utf8_decode($medical));		
	redirect(_BASE_URL.'?success');
}

$extra['viewpage'] = fetch_template(CWD.'/includes/modules/forms/templates/tpl_form_home_'.$languageid, $languageid);	
$extra['PAGE'] =  'forms_'.$languageid;
?>
	