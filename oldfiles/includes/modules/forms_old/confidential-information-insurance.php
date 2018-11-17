<?php

$form = new dental_form('confidential-information-insurance');

if ($use_data)
  {
    $_POST['field1'] = $form_data['firstname'];
    $_POST['field3'] = $form_data['lastname'];	
  }
	
$form->name(array('en' => 'Insurance and Financial Information', 'fr' => 'Formulaire d\'Assurance'));
$form->require_fields(array('en' => 'Fields are mandetory', 'fr' => 'Les champs sont requis'));
$form->title(array('en' => 'Name Of Patient', 'fr' => 'Nom du patient'));
$form->text(array('en'	=>	'First name',  'fr'	=> 	'Pr&eacute;nom'),  TYPE_TITLE);
$form->text(array('en'	=>	'Middle name',  'fr'	=> 	'Nom'));
$form->text(array('en'	=>	'Last name',  'fr'	=> 	'Nom'),  TYPE_TITLE);
$form->title(array('en' => 'Insurance Company', 'fr' => 'Compagnie d\'assurance'));
$form->select(array('en'=>	'Insurance coverage?',  'fr'	=> 	'Avez-vous une assurance?'), array('en' => array('Yes', 'No'), 'fr' => array('Oui', 'Non')));
$form->text(array('en'	=>	'Company name',  'fr'	=> 	'Nom de la compangnie d\'assurance'));
$form->text(array('en'	=>	'Phone',  'fr'	=> 	'T&eacute;l.'));
$form->text(array('en'	=>	'Address',  'fr'	=> 	'Adresse'));
$form->text(array('en'	=>	'Subscriber\'s name',  'fr'	=> 	'Nom de l\'assur&eacute;'));
$form->select(array('en'	=>	'Patient\'s relationship with subscriber',  'fr'	=> 	'Lien du patient avec l\'assur&eacute;'), array('en' => array('Self', 'Spouse', 'Dependent'), 'fr' => array('Lui-m&ecirc;me', 'Conjoint', 'Personne &agrave; charge')));
$form->text(array('en'	=>	'Group / Program number',  'fr'	=> 	'N. de groupe ou de programme'));
$form->text(array('en'	=>	'Certificate number',  'fr'	=> 	'Num&eacute;ro de certificat'));
$form->text(array('en'	=>	'Employer',  'fr'	=> 	'Employeur (si diff&eacute;rent de celui ci-dessus)'));
$form->text(array('en'	=>	'Employer address',  'fr'	=> 	'Adresse de l\'employeur'));
$form->title(array('en' => 'Second Insurance Company', 'fr' => 'Autre compagnie d\'assurance'));
$form->select(array('en'=>	'Insurance coverage?',  'fr'	=> 	'Avez-vous une assurance?'), array('en' => array('Yes', 'No'), 'fr' => array('Oui', 'Non')));
$form->text(array('en'	=>	'Company name',  'fr'	=> 	'Nom de la compangnie d\'assurance'));
$form->text(array('en'	=>	'Phone',  'fr'	=> 	'T&eacute;l.'));
$form->text(array('en'	=>	'Address',  'fr'	=> 	'Adresse'));
$form->text(array('en'	=>	'Subscriber\'s name',  'fr'	=> 	'Nom de l\'assur&eacute;'));
$form->select(array('en'	=>	'Patient\'s relationship with subscriber',  'fr'	=> 	'Lien du patient avec l\'assur&eacute;'), array('en' => array('Self', 'Spouse', 'Dependent'), 'fr' => array('Lui-m&ecirc;me', 'Conjoint', 'Personne &agrave; charge')));
$form->text(array('en'	=>	'Group / Program number',  'fr'	=> 	'N. de groupe ou de programme'));
$form->text(array('en'	=>	'Certificate number',  'fr'	=> 	'Num&eacute;ro de certificat'));
$form->text(array('en'	=>	'Employer (if different from above)',  'fr'	=> 	'Employeur (si diff&eacute;rent de celui ci-dessus)'));
$form->text(array('en'	=>	'Employer address',  'fr'	=> 	'Adresse de l\'employeur'));
$form->fetch_form();


?>