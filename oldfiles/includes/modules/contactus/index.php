<?php

define('MODULE', 'contactus');

if ($_POST['do'] == 'consultation')
{
		$name = $_POST['name'] ? $_POST['name'] : 'Not provided';
		$phone = $_POST['phone'] ? $_POST['phone'] : 'Not provided';
		sendmail('consultation@cliniquedentaireileperrot.ca', 'Free dental conusltation request', '<h1>Free Dental Consultation Request</h1><p>Name: '.$name.' </p><p>Contact Number: '.$phone.' </p><p>Email: '.$_POST['email'].'</p>
		<p><small>Clinique Dentaire Ile Perrot</small></p>');
		$url = $current_language == 'en' ? 'contact-us' : 'contactez-nous';
		header('location: '.$url.'?success');
}

if ($_POST['do'] == 'contactus')
{
	$Process->input->clean_array_gpc('p', array(
		'lastname'            	=> TYPE_STR,		
		'firstname'            	=> TYPE_STR,		
		'email'               	=> TYPE_STR,
		'new_patient'      		=> TYPE_STR,		
		'phone'            		=> TYPE_STR,
		'phone2'          		=> TYPE_STR,
		'address'          		=> TYPE_STR,			
		'before_noon'      		=> TYPE_STR,		
		'after_noon'       		=> TYPE_STR,		
		'evening'         		=> TYPE_STR,						
		'hear_aboutus'     		=> TYPE_STR,
		'find_us'         		=> TYPE_STR,
		'treatment_type'    	=> TYPE_STR,
		'comments'		    	=> TYPE_STR
	));

	if ($Process->GPC['before_noon'] == 'on')
		$Process->GPC['before_noon'] = 'X';
	if ($Process->GPC['after_noon'] == 'on')
		$Process->GPC['after_noon'] = 'X';
	if ($Process->GPC['evening'] == 'on')
		$Process->GPC['evening'] = 'X';
		
	$Process->input->required(array(
		'firstname'				=> TYPE_NAME,
		'lastname'				=> TYPE_NAME,
		'email'					=> TYPE_EMAIL,
		'phone'					=> TYPE_BODY,
		'captcha'				=> TYPE_CAPTCHA));

	$send_to = in_array($Process->GPC['treatment_type'], array('Free Consultation', 'OrthoPulse')) ? 'consultation@cliniquedentaireileperrot.ca' : 'service@cliniquedentaireileperrot.ca';
	if (!count($Process->input->error_msg))
	{
		sendmail($send_to, parse_values($Process->email_msg['contactus_form']['subject']), parse_values($Process->email_msg['contactus_form']['message']));
		header('location: '.$current_module['seo_url_'.$languageid].'?success');
	}
}

if ($_POST['do'] == 'feedback')
{
	$Process->input->clean_array_gpc('p', array(
		'lastname'            	=> TYPE_STR,		
		'firstname'            	=> TYPE_STR,		
		'email'               	=> TYPE_STR,
		'phone'            		=> TYPE_STR,
		'address'          		=> TYPE_STR,			
		'comments'		    	=> TYPE_STR
	));

	$Process->input->required(array(
		'firstname'				=> TYPE_NAME,
		'lastname'				=> TYPE_NAME,
		'email'					=> TYPE_EMAIL,
		'phone'					=> TYPE_BODY,
		'comments'				=> TYPE_BODY,
		'captcha'				=> TYPE_CAPTCHA));		

	if (!count($Process->input->error_msg))
	{
		sendmail('service@cliniquedentaireileperrot.ca', parse_values($Process->email_msg['feedback_form']['subject']), parse_values($Process->email_msg['feedback_form']['message']));
		header('location: '.$current_module['seo_url_'.$languageid].'?success');
	}
}

//_CALLBACK_FUNCTION('fetch_captcha', array('contact_us'));

$extra['PAGE'] = 'contactus_'.$languageid;
  
?>