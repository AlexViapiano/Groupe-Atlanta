<?php

  $tpl->script('color');
  $tpl->openform();
  $tpl->required = array(
				  'image_width' 					=> TYPE_INT,
				  'image_height'					=> TYPE_INT,
				  'perturbation'					=> TYPE_DECIMAL,
				  'text_transparency_percentage'	=> TYPE_PERCENT,
				  'num_lines'						=> TYPE_INT);
				  
  $captcha = fetch_settings('captcha');			    
  $tpl->openwindow('Human Verification Settings');
  $tpl->title('Dimensions');
  $tpl->input(TYPE_INT, 'Width', 'image_width', iif('image_width', $captcha['image_width']));
  $tpl->input(TYPE_INT, 'Height', 'image_height', iif('image_height', $captcha['image_height']));
  $tpl->title('Color');  
  $tpl->input_color(TYPE_STR, 'Background color', 'image_bg_color', iif('image_bg_color', $captcha['image_bg_color']));
  $tpl->input_color(TYPE_STR, 'Text color', 'text_color', iif('text_color',  $captcha['text_color']));
  $tpl->input_color(TYPE_STR, 'Line color', 'line_color', iif('line_color',  $captcha['line_color']));  
  $tpl->title('Visual');    
  $tpl->input(TYPE_NUM, 'Perturbation (between 0 and 1)', 'perturbation', iif('perturbation',  $captcha['perturbation']));
  $tpl->input(TYPE_INT, 'Transparency (in %)', 'text_transparency_percentage', iif('text_transparency_percentage',  $captcha['text_transparency_percentage'])); 
  $tpl->input(TYPE_INT, 'Number of lines', 'num_lines', iif('num_lines',  $captcha['num_lines']));
  $tpl->setdo('save_settings');
  $tpl->closewindow('Save');
  $tpl->closeform();  
  
  if ($tpl->submitted())
  {
	$tpl->serialize = 'captcha';
  	$tpl->process_form();

  	if ($tpl->success)
		$tpl->redirect();
  }

?>
