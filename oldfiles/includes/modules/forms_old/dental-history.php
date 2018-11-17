<?php

$form = new dental_form('dental-history');

if ($use_data)
    $_POST['field1'] = $form_data['firstname'].' '.$form_data['lastname'];
	
$form->name(array('en' => 'Dental History', 'fr' => 'Ant&eacute;c&eacute;dents Dentaires'));
$form->require_fields(array('en' => 'Fields are mandetory', 'fr' => 'Les champs sont requis'));
$form->title(array('en' => 'Personal Information', 'fr' => 'Information Personel'));
$form->text(array('en'	=>	'Name',  'fr'	=> 	'Nom complet'),  TYPE_TITLE);
$form->text(array('en'	=>	'How did you find our clinic',  'fr'	=> 	'Consultation demand&eacute;e par'),  TYPE_TITLE);
$form->text(array('en'	=>	'Most recent dental exam',  'fr'	=> 	'Dernier examen dentaire'));
$form->text(array('en'	=>	'Most recent dental X-RAY',  'fr'	=> 	'Dernière radiographie dentaire'));
$form->text(array('en'	=>	'Most recent dental treatment',  'fr'	=> 	'Dernier traitement dentaire'));
$form->select(array('en'=>	'How often do you have your teeth cleaned?',  'fr'	=> 	'Vous vous faites nettoyer les dents tous les combien? '), 
		array('en' => array('3 month', '4 month', '6 month', '1 year or longer'), 'fr' => array('3 mois', '4 mois', '6 mois', '1 an ou plus')), TYPE_SELECT);
$form->text(array('en'	=>	'What is yout immediate dental concern?',  'fr'	=> 	'Quelle est la raison de votre consultation?'));
$form->title(array('en' => 'Please answer the following', 'fr' => 'R&eacute;pondez à ce sujet'));
$form->radio(array('en'=>	'1. unhappy with the appearance of your teeth',  'fr'	=> 	'1. vous êtes insatisfait de l\'aspect de vos dents'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'2. unfavorable dental experiences',  'fr'	=> 	'2. exp&eacute;riences dentaires d&eacute;favorables'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'3. dental fears',  'fr'	=> 	'3. peurs dentaires'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'4. problems with effectiveness or bad reactions to dental anesthetic',  'fr'	=> 	'4. inefficacit&eacute; de l\'anesth&eacute;sique dentaire ou r&eacute;actions ind&eacute;sirables à celui-ci'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'5. orthodontic treatment (braces)',  'fr'	=> 	'5. traitement orthodontique (broches) '), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'6. periodontal (gum) treatment',  'fr'	=> 	'6. traitement p&eacute;riodontique (des gencives) '), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'7. bleeding gums',  'fr'	=> 	'7. saignement des gencives'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'8. avoid brushing any part of your mouth',  'fr'	=> 	'8. vous &eacute;vitez de vous brosser une partie de la bouche'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'9. part of your mouth is sensitive to temperature',  'fr'	=> 	'9. sensibilit&eacute; d\'une partie de la bouche au chaud ou au froid'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'10. sore teeth',  'fr'	=> 	'10. mal de dents'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'11. a burning sensation in your mouth',  'fr'	=> 	'11. sensation de brûlure dans la bouche'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'12. difficulty swallowing',  'fr'	=> 	'12. difficult&eacute; à avaler'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'13. an unpleasant taste or odor in your mouth',  'fr'	=> 	'13. goût ou odeur d&eacute;sagr&eacute;able dans la bouche'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'14. dry mouth, throat, and or eyes',  'fr'	=> 	'14. s&eacute;cheresse de la bouche, de la gorge ou des yeux'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'15. jaw problems (temporomandibular joint)',  'fr'	=> 	'15. trouble de la mâchoire (articulation temporo-mandibulaire)'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'16. difficultly opening your mouth widely',  'fr'	=> 	'16. difficult&eacute; à ouvrir grand la bouche'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'17. stiff neck muscles',  'fr'	=> 	'17. raideur des muscles du cou'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'18. awaken with an awareness of your teeth or jaws',  'fr'	=> 	'18. conscience des dents ou des mâchoires au r&eacute;veil'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'19. tension headaches',  'fr'	=> 	'19. maux de tête dus à la tension nerveuse'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'20. clench or grind your teeth',  'fr'	=> 	'20. serrement ou grincement des dents'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'21. jaw clicking or popping',  'fr'	=> 	'21. craquement ou claquement de la mâchoire'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'22. lost any teeth',  'fr'	=> 	'22. perte de dents'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'23. do you sweat or tremble a lot during examination',  'fr'	=> 	'23. transpiration ou tremblement intense pendant un examen'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'24. do strange people or places make you afraid',  'fr'	=> 	'24. peur des gens ou des lieux inconnus'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->title(array('en' => 'SUPPLEMENTAL DENTURE HISTORY', 'fr' => 'RENSEIGNEMENTS SUR LES PROTHÈSES DENTAIRES '));
$form->radio(array('en'=>	'Has your present denture been relined?',  'fr'	=> 	'A-t-on regarni votre prothèse actuelle? '), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->text(array('en'	=>	'When',  'fr'	=> 	'Quand?'));
$form->radio(array('en'=>	'Is your present denture a problem?',  'fr'	=> 	'Votre prothèse actuelle pose-t-elle un problème? '), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->text(array('en'	=>	'Describe',  'fr'	=> 	'Lequel?'));
$form->radio(array('en'=>	'Satisfied with the appearance? ',  'fr'	=> 	'Êtes-vous satisfait de son aspect?'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->text();
$form->radio(array('en'=>	'Satisfied with the comfort? ',  'fr'	=> 	'Êtes-vous satisfait de son confort?'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->text();
$form->radio(array('en'=>	'Satisfied with the chewing ability?',  'fr'	=> 	'Êtes-vous satisfait de son aptitude à la mastication?'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->text();
$form->text(array('en'	=>	'When did you receive your first partial or complete denture?',  'fr'	=> 	'Quand avez-vous eu votre première prothèse partielle ou complète?'));
$form->text(array('en'	=>	'How long have you worn your present denture?',  'fr'	=> 	'Depuis quand portez-vous votre prothèse actuelle?'));
$form->textarea(array('en' => 'Please list any opertations, past medical conditions or medications been taken', 'fr' => 'S\'il vous plaît énumérer toutes les chirurgies, antécédents médicaux, ou des médicaments que vous prenez'));
$form->fetch_form();


?>