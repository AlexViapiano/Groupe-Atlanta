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
	   $Process->input->clean_array_gpc('p', array(
			'field2'		=> TYPE_STR,
			'field3'		=> TYPE_STR,
			'field4'		=> TYPE_STR,
			'field5'		=> TYPE_STR,
			'field8'		=> TYPE_STR,
			'field9'		=> TYPE_STR,
			'field10'		=> TYPE_STR));							
			
		save_input(array('table' 	=> 'dental_forms'),
						  array('data'	=> addslashes(serialize($_POST)),
						  		'date_created'	=> TIMENOW,
								'language_id'	=> $languageid));
	$confid = fetch_template(CWD.'/includes/modules/forms/templates/tpl_confidential-information-layout-'.$languageid, $languageid);
	$dental = fetch_template(CWD.'/includes/modules/forms/templates/tpl_dental-history-layout-'.$languageid, $languageid);	
	$medical = fetch_template(CWD.'/includes/modules/forms/templates/tpl_medical-history-layout-'.$languageid, $languageid);	
	sendmail('info@cliniquedentaireileperrot.ca', $forms[$languageid]['confid'], utf8_decode($confid));
	sendmail('info@cliniquedentaireileperrot.ca', $forms[$languageid]['dental'], utf8_decode($dental));
	sendmail('info@cliniquedentaireileperrot.ca', $forms[$languageid]['medical'], utf8_decode($medical));
	redirect(_BASE_URL.'?completed');
}

if (isset($_GET['print']) && file_exists(CWD.'/includes/modules/forms/templates/tpl_'.$_GET['print'].'-layout-en.tpl') && file_exists(CWD.'/includes/modules/forms/templates/tpl_'.$_GET['print'].'-layout-fr.tpl'))
 {
   $data = array();
   $data = query_first("select * from dental_forms where id = ".intval($_GET['id']));
   $lang = $data['language_id'];
   $data = unserialize(stripslashes($data['data']));
   $_POST = $data;
   echo fetch_template(CWD.'/includes/modules/forms/templates/tpl_'.$_GET['print'].'-layout-'.$lang, $lang);	
   die;				  
}
else
{
	$extra['viewpage'] = fetch_template(CWD.'/includes/modules/forms/templates/tpl_form_home_'.$languageid, $languageid);	
	$extra['PAGE'] =  'forms_'.$languageid;
}
?>
	