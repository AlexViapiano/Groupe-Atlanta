<?php

$form = new dental_form('medical-history');

if ($use_data)
  {
    $_POST['field1'] = $form_data['firstname'];
    $_POST['field3'] = $form_data['lastname'];	
  }

$form->name(array('en' => 'Medical History', 'fr' => 'Ant&eacute;c&eacute;dents M&eacute;dicaux'));
$form->require_fields(array('en' => 'Fields are mandetory', 'fr' => 'Les champs sont requis'));
$form->title(array('en' => 'Patient Information', 'fr' => 'Information du patient'));
$form->text(array('en'	=>	'First name',  'fr'	=> 	'Pr&eacute;nom'), TYPE_TITLE);
$form->text(array('en'	=>	'Nick name',  'fr'	=> 	'Pr&eacute;nom'));
$form->text(array('en'	=>	'Last name',  'fr'	=> 	'Nom'),  TYPE_TITLE);
$form->text(array('en'	=>	'Name of physician',  'fr'	=> 	'Nom du m&eacute;decin'));
$form->title(array('en' =>  'HAVE YOU EVER HAD THE FOLLOWING', 'fr' => 'AVEZ-VOUS DÉJÀ EU CE QUI SUIT '));
$form->text(array('en'=>	'Reason for your last medical visit',  'fr'	=> 	'But'));
$form->select(array('en'=>	'What is your estimate of your general health?',  'fr'	=> 	'À votre avis, quel est votre &eacute;tat de sant&eacute; en g&eacute;n&eacute;ral?'), array('en' => array('Poor', 'Fair', 'Good'), 'fr' => array('Mauvais', 'Assez bon', 'Bon')), TYPE_SELECT);
$form->title(array('en' => 'Have you ever had the following', 'fr' => 'AVEZ-VOUS DÉJÀ EU CE QUI SUIT'), TYPE_TITLE);
$form->radio(array('en'=>	'1. hospitalization for illness or injury',  'fr'	=> 	'1. hospitalisation (pour maladie ou blessure)'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->checkbox(array('en'=>'2. allergic reaction to',  'fr'	=> 	'2. r&eacute;action allergique à ce qui suit'), 
	array('en' => array('aspirin, ibuprofen, acetaminophen', 'penicillin', 'erythromycin', 'tetracycline', 'codeine', 'local anaesthetic', 'fluoride', 'metals (gold, stainless steel)', 'latex', 'any other medications'),
	'fr' => array('aspirine, ibuprofène, ac&eacute;taminophène', 'p&eacute;nicilline', '&eacute;rythromycine', 't&eacute;tracycline', 'cod&eacute;ine', 'anesth&eacute;sique local', 'fluor', 'm&eacute;taux (or, acier inoxydable)', 'latex', 'autres m&eacute;dicaments')));
$form->radio(array('en'=>	'3. heart problem',  'fr'	=> 	'3. trouble cardiaque'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'4. heart murmur',  'fr'	=> 	'4. souffle cardiaque'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'5. rheumatic fever',  'fr'	=> 	'5. rhumatisme articulaire aigu'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'6. scarlet fever',  'fr'	=> 	'6. scarlatine'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'7. high blood pressure',  'fr'	=> 	'7. hypertension art&eacute;rielle'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'8. low blood pressure',  'fr'	=> 	'8. hypotension art&eacute;rielle'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'9. a stroke',  'fr'	=> 	'9. attaque d\'apoplexie'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'10. artificial prosthesis (heart valve or joints)',  'fr'	=> 	'10. prothèse valvulaire ou articulaire'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'11. anemia or other blood disorder',  'fr'	=> 	'11. an&eacute;mie ou autre trouble sanguin'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'12. prolonged bleeding due to a slight cut',  'fr'	=> 	'12. saignement prolong&eacute; (après une coupure)	'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'13. emphysema',  'fr'	=> 	'13. emphysème'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'14. tuberculosis',  'fr'	=> 	'14. tuberculose'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'15. asthma',  'fr'	=> 	'15. asthme'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'16. sinus problems',  'fr'	=> 	'16. sinusite'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'17. kidney disease',  'fr'	=> 	'17. maladie des reins'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'18. liver disease',  'fr'	=> 	'18. maladie du foie'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'19. jaundice',  'fr'	=> 	'19. jaunisse'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'20. thyroid or parathyroid disease',  'fr'	=> 	'20. maladie de la thyroïde ou des parathyroïdes'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'21. hormone deficiency',  'fr'	=> 	'21. insuffisance hormonale'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'22. high cholesterol',  'fr'	=> 	'22. hypercholest&eacute;rol&eacute;mie'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'23. diabetes',  'fr'	=> 	'23. diabète'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'24. stomach or duodenal ulcer',  'fr'	=> 	'24. ulcère gastrique ou duod&eacute;nal'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'25. digestive disorders',  'fr'	=> 	'25. troubles digestifs'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'26. arthritis',  'fr'	=> 	'26. arthrite'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'27. glaucoma',  'fr'	=> 	'27. glaucome'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'28. contact lenses',  'fr'	=> 	'28. verres de contact'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'29. head or neck injuries',  'fr'	=> 	'29. blessures à la tête ou au cou'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'30. epilepsy, convulsions (seizures)',  'fr'	=> 	'30. &eacute;pilepsie, convulsions (crises)'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'31. viral infections and cold sores',  'fr'	=> 	'31. infections virales ou boutons de fièvre'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'32. any lumps or swelling in the mouth',  'fr'	=> 	'32. grosseurs ou enflures dans la bouche'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'33. hives, skin rash, hay fever',  'fr'	=> 	'33. urticaire, &eacute;ruptions, rhume des foins'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'34. venereal disease',  'fr'	=> 	'34. maladie v&eacute;n&eacute;rienne'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'35. hepatitis ',  'fr'	=> 	'35. h&eacute;patite '), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'36. HIV / AIDS',  'fr'	=> 	'36. infection à VIH ou SIDA'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'37. tumor, abnormal growth',  'fr'	=> 	'37. tumeur, grosseur anormale'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'38. radiation therapy',  'fr'	=> 	'38. radioth&eacute;rapie'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'39. chemotherapy',  'fr'	=> 	'39. chimioth&eacute;rapie'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'40. emotional problems',  'fr'	=> 	'40. troubles &eacute;motionnels'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'41. psychiatric treatment',  'fr'	=> 	'41. traitement psychiatrique'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'42. antidepressant medication',  'fr'	=> 	'42. m&eacute;dicament antid&eacute;presseur'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'43. alcohol/drug dependency',  'fr'	=> 	'43. d&eacute;pendance à l\'alcool ou à une drogue'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'44. presently being treated for any illness',  'fr'	=> 	'44. sous traitement pour une maladie'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'45. aware of a change in your general health',  'fr'	=> 	'45. dans un &eacute;tat de sant&eacute; diff&eacute;rent'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'46. often exhausted or fatigued',  'fr'	=> 	'46. souvent &eacute;puis&eacute; ou fatigu&eacute;'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'47. subject to frequent headaches',  'fr'	=> 	'47. sujet à des maux de tête fr&eacute;quents'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'48. a heavy smoker (1 pack or more a day',  'fr'	=> 	'48. un gros fumeur (1 paquet ou plus par jour)'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'49. considered a touchy person',  'fr'	=> 	'49. consid&eacute;r&eacute; comme susceptible'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'50. often unhappy or depressed',  'fr'	=> 	'50. souvent malheureux ou d&eacute;prim&eacute;'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'51. easily upset or irritated',  'fr'	=> 	'51. facilement vex&eacute; ou irrit&eacute;'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'52. FEMALE - taking birth control pills',  'fr'	=> 	'52. FEMME – sous pilule contraceptive'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'53. FEMALE – pregnant',  'fr'	=> 	'53. FEMME – enceinte'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->radio(array('en'=>	'54. MALE - Prostate disorders',  'fr'	=> 	'54. HOMME – atteint d\'un trouble de la prostate	'), array('en' => array('Yes', 'No'),'fr' => array('Oui', 'Non')));
$form->textarea(array('en' => 'Please describe any current medical treatment, impending surgery, or other medical treatment', 'fr' => 'Si vous suivez un traitement ou que vous allez subir une op&eacute;ration ou suivre un traitement sous peu'));
$form->textarea(array('en' => 'List any medications, herbal supplements, and or vitamins taken within the last two years (Please bring list if have been prescribed by your doctor.)', 'fr' => 'Si vous avez pris des m&eacute;dicaments, des compl&eacute;ments à base de plantes ou des vitamines au cours des deux dernières ann&eacute;es, pr&eacute;cisez (et, s\'ils vous ont &eacute;t&eacute; prescrits par votre m&eacute;decin, apportez-en la liste)'));
$form->title(array('en' =>  'Most recent physical examination', 'fr' => 'Dernier examen physique'));
$form->fetch_form();


?>