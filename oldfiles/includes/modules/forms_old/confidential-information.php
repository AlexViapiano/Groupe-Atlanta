<?php

$first_form = true;
$form = new dental_form('confidential-information');

$form->name(array('en' => 'Confidential Information', 'fr' => 'Renseignements Confidentiels'));
$form->require_fields(array('en' => 'Fields are mandetory', 'fr' => 'Les champs sont requis'));
$form->title(array('en' => 'Information', 'fr' => 'Information'));
$form->select(array('en'=>	'Gender',  'fr'	=> 	'Genre'), array('en' => array('Man', 'Woman'), 'fr' =>  array('Homme', 'Femme')), TYPE_SELECT);
$form->text(array('en'	=>	'First name',  'fr'	=> 	'Pr&eacute;nom'),  TYPE_TITLE);
$form->text(array('en'	=>	'Last name',  'fr'	=> 	'Nom'),  TYPE_TITLE);
$form->text(array('en'	=>	'Email address',  'fr'	=> 	'Address courriel'),  TYPE_EMAIL);
$form->text(array('en'	=>	'Address',  'fr'	=> 	'Adresse'),  TYPE_TITLE);
$form->text(array('en'	=>	'City',  'fr'	=> 	'Ville'),  TYPE_TITLE);
$form->text(array('en'	=>	'Postal Code',  'fr'	=> 	'Code postale'),  TYPE_TITLE);
$form->text(array('en'	=>	'Cell Phone',  'fr'	=> 	'T&eacute;l. cell'));
$form->text(array('en'	=>	'Home Phone',  'fr'	=> 	'T&eacute;l. maison'),  TYPE_TITLE);
$form->text(array('en'	=>	'Work phone',  'fr'	=> 	'T&eacute;l. travail'));
$form->select(array('en'=>	'Ok to call at work?',  'fr'	=> 	'Peut-on appeler au travail?'), array('en' => array('Yes', 'No'), 'fr' => array('Oui', 'Non')));
$form->checkbox(array('en'=>'What is the best way to contact you?', 'fr'	=> 'Quelle est la meilleure fa&ccedil;on de vous contacter?'), 
	array('en' => array('Cell Phone', 'Home Phone', 'Work Phone', 'Email', 'Text Messaging'), 'fr' => array('T&eacute;l. cell', 'T&eacute;l. maison', 'T&eacute;l. travail', 'Courriel', 'Messagerie texte')));
$form->title(array('en' => 'Other Information', 'fr' => 'Autre information'));
$form->select(array('en'=>	'Martial status',  'fr'	=> 	'&Eacute;tat civil'), array('en' => array('Married', 'Single', 'Seperated', 'Divorced', 'Widow'),'fr' => array('Marri&eacute;', 'Single', 'Celibataire', 'Divorc&eacute;', 'Veuve')));
$form->select(array('en'=>	'Underage 18',  'fr'	=> 	'Moins de 18 ans'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')), TYPE_SELECT);
$form->text(array('en'	=>	'Patient\'s / guardian\'s employer',  'fr'	=> 	'Employeur du patient ou du tuteur'));
$form->text(array('en'	=>	'Occupation',  'fr'	=> 	'Profession'));
$form->text(array('en'	=>	'Employer address',  'fr'	=> 	'Adresse au travail'));
$form->title(array('en' => 'Spouse Information', 'fr' => 'Information &eacute;pouse'));
$form->text(array('en'	=>	'Full name',  'fr'	=> 	'Nom au complet'));
$form->text(array('en'	=>	'Occupation',  'fr'	=> 	'Profession'));
$form->text(array('en'	=>	'Employer',  'fr'	=> 	'Employeur'));
$form->text(array('en'	=>	'Employer address',  'fr'	=> 	'Addresse au travail'));
$form->text(array('en'	=>	'Work Phone',  'fr'	=> 	'T&eacute;l. travail'));
$form->select(array('en'=>	'Ok to call at work?',  'fr'	=> 	'Peut-on appeler au travail?'), array('en' => array('Yes', 'No'), 'fr' => array('Oui', 'Non')));
$form->title(array('en' => 'PERSON WE CAN CONTACT IN CASE OF AN EMERGENCY ','fr' => 'PERSONNE À APPELER EN CAS D\'URGENCE'));
$form->text(array('en'	=>	'Full name',  'fr'	=> 	'Nom au complet'), TYPE_TITLE);
$form->text(array('en'	=>	'Relationship',  'fr'	=> 	'Lien'), TYPE_TITLE);
$form->text(array('en'	=>	'Work phone',  'fr'	=> 	'T&eacute;l. travail'));
$form->text(array('en'	=>	'Home phone',  'fr'	=> 	'T&eacute;l. maison'), TYPE_TITLE);
$form->title(array('en' => 'Our survey', 'fr' => 'Notre sondage'));
$form->text(array('en'	=>	'Other family members that are patients here',  'fr'	=> 	'Autres membres de la famille venant ici'));
$form->text(array('en'	=>	'Who can we thank for referring you?',  'fr'	=> 	'qui peut-on remercier de vous avoir envoy&eacute; ici?'));
$form->fetch_form();


?>