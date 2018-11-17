<?php

function export_to_excel($data)
{
	require_once 'includes/class/PHPExcel.php';	
	$objPHPExcel = new PHPExcel();
	
	$objPHPExcel->getProperties()->setCreator("Accenti CMS")
								 ->setTitle("Customer List")
								 ->setSubject("Customer List")
								 ->setDescription("Accenti Customer List (Subscription, Photo & Writting Contests")
								 ->setKeywords("Customer List")
								 ->setCategory("Customer List");

	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', "Customer Id");
	$objPHPExcel->getActiveSheet()->setCellValue('B1', "Firstname");
	$objPHPExcel->getActiveSheet()->setCellValue('C1', "Lastname");
	$objPHPExcel->getActiveSheet()->setCellValue('D1', "Address");	
	$objPHPExcel->getActiveSheet()->setCellValue('E1', "City");	
	$objPHPExcel->getActiveSheet()->setCellValue('F1', "Province");	
	$objPHPExcel->getActiveSheet()->setCellValue('G1', "Country");	
	$objPHPExcel->getActiveSheet()->setCellValue('H1', "Postal Code");	
	$objPHPExcel->getActiveSheet()->setCellValue('I1', "Phone");	
	$objPHPExcel->getActiveSheet()->setCellValue('J1', "Alt. Phone");	
	$objPHPExcel->getActiveSheet()->setCellValue('K1', "Email");	
	$objPHPExcel->getActiveSheet()->setCellValue('L1', "CC Type");	
	$objPHPExcel->getActiveSheet()->setCellValue('M1', "CC Number");	
	$objPHPExcel->getActiveSheet()->setCellValue('N1', "Name on CC");	
	$objPHPExcel->getActiveSheet()->setCellValue('O1', "Expiry Month");	
	$objPHPExcel->getActiveSheet()->setCellValue('P1', "Expiry Year");	
	$objPHPExcel->getActiveSheet()->setCellValue('Q1', "Type");	
	$objPHPExcel->getActiveSheet()->setCellValue('R1', "Total Amount");
	$objPHPExcel->getActiveSheet()->setCellValue('S1', "Transaction Id");
	$objPHPExcel->getActiveSheet()->setCellValue('T1', "Transaction Date");
	$objPHPExcel->getActiveSheet()->setCellValue('U1', "Gift Recipient 1");
	$objPHPExcel->getActiveSheet()->setCellValue('V1', "Gift Recipient 2");		
    
    for ($i=0; $i<count($data); $i++)
	{
		$j = $i+2;
		$gift = unserialize($data[$i]['data']);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$j, $data[$i]['id']);	
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$j, $data[$i]['firstname']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$j, $data[$i]['lastname']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$j, $data[$i]['address']);	
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$j, $data[$i]['city']);	
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$j, $data[$i]['prov']);	
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$j, $data[$i]['country']);	
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$j, $data[$i]['postal']);	
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$j, $data[$i]['telephone_main']);	
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$j, $data[$i]['telephpne_other']);	
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$j, $data[$i]['email']);				
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$j, $data[$i]['creditcard_type']);		
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$j, $data[$i]['creditcard_number']);		
		$objPHPExcel->getActiveSheet()->setCellValue('N'.$j, $data[$i]['name_on_card']);	
		$objPHPExcel->getActiveSheet()->setCellValue('O'.$j, $data[$i]['exp_month']);		
		$objPHPExcel->getActiveSheet()->setCellValue('P'.$j, $data[$i]['exp_year']);		
		$objPHPExcel->getActiveSheet()->setCellValue('Q'.$j, $data[$i]['type']);		
		$objPHPExcel->getActiveSheet()->setCellValue('R'.$j, $data[$i]['total_amount']);	
		$objPHPExcel->getActiveSheet()->setCellValue('S'.$j, $data[$i]['trans_id']);
		$objPHPExcel->getActiveSheet()->setCellValue('T'.$j, date('Y-m-d H:i', $data[$i]['trans_id']));
		if ($gift['gift'])
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$j, $gift['lastname1'].' '.$gift['firstname1'].' '.$gift['address1'].', '.$gift['city1'].' '.$gift['prov1'].$gift['country1'].' '.$gift['postal1'].', paid: '.$gift['amount1']);
		if ($gift['second_gift'])
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$j, $gift['lastname2'].' '.$gift['firstname2'].' '.$gift['address2'].', '.$gift['city2'].' '.$gift['prov2'].$gift['country2'].' '.$gift['postal2'].', paid: '.$gift['amount2']);		
	}
	$objPHPExcel->getActiveSheet()->setTitle('Customer List');
	$objPHPExcel->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.date('Y-m-d', TIMENOW).'accenti_customer_list.xls"');
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
}

function admin_features($action)
{
  global $extra, $Process, $current_module, $languages, $languageid;
  switch ($action)
  {
	  case '404':
	       $extra['page_404'] = query_first("select * from page_links where module = '404'");
		   $extra['admin_panel'] = '404';
	   	   if ($_POST['do'] == '404')
		      {
				   foreach ($languages as $lang)
					{
						$gpc['body_'.$lang['id']] 		= TYPE_STR;
				   		$require['body_'.$lang['id']] 	= TYPE_BODY;
						$lang_temp['body_'.$lang['id']] = $lang['title'];
				    }
				   $Process->input->clean_array_gpc('p', $gpc);
				   $Process->input->required($require);	
				   if (!count($Process->input->error_msg))
				       {
						  save_input(array('table'	=> 'page_links',
						  				   'action'	=> 'update',
										   'para'	=> "module = '404'"));
						  redirect(_BASE_URL);
					   }
			       else
				       {
				     	  foreach ($Process->input->error_msg as $error => $value)
						  	{
								$extra['popup_notify'][$error]['code'] = 'Body';
								$extra['popup_notify'][$error]['body'] = $value;
								$extra['popup_notify'][$error]['title'] = $lang_temp[$error].' : Body';								
							}
					   }
			  }		     
	  	break;
		
	  case 'del_event':
		   $Process->input->clean_array_gpc('g', array('id'	=> TYPE_INT));
		   $extra['event'] = query_first("select * from calendar where id = ".$Process->GPC['id']);
		   $extra['admin_panel'] = 'del_event';
		   if ($_POST['do'] == 'del_event')
		      {
				query("delete from calendar where id = ".$Process->GPC['id']);
				set_form_submitted(false, true);	   
			    redirect(_BASE_URL);				  
			  }
	  break;
	  
	  case 'add_event':
		   $extra['time'] = strtotime($_GET['date']);
		   $extra['admin_panel'] = 'add_event';	
		   if ($_POST['do'] == 'new_event')
		      {
				   $date = array('dateMonth'				=> TYPE_INT,
				   				'dateDay'					=> TYPE_INT,
								'dateYear'					=> TYPE_INT);
				   $Process->input->clean_array_gpc('p', $date);								
				   foreach ($languages as $lang)
					{
						$gpc['title_'.$lang['id']] 		= TYPE_STR;
						$gpc['desc_'.$lang['id']] 		= TYPE_STR;						
				    }
				   $Process->input->clean_array_gpc('p', $gpc);			  
				   save_input(array('table' 	=> 'calendar'),
							  array('date'		=> $Process->GPC['dateYear'].'-'.$Process->GPC['dateMonth'].'-'.$Process->GPC['dateDay']));
				  redirect(_BASE_URL);
			  }				     
	  break;
	  
	  case 'edit_event':
		   $Process->input->clean_array_gpc('g', array('id'	=> TYPE_INT));
		   $extra['event'] = query_first("select * from calendar where id = ".$Process->GPC['id']);
		   $extra['time'] = strtotime($extra['event']['date']);
		   $extra['admin_panel'] = 'edit_event';
		   if ($_POST['do'] == 'update_event')
		      {
				   $date = array('dateMonth'				=> TYPE_INT,
				   				'dateDay'					=> TYPE_INT,
								'dateYear'					=> TYPE_INT);
				   $Process->input->clean_array_gpc('p', $date);								
				   foreach ($languages as $lang)
					{
						$gpc['title_'.$lang['id']] 		= TYPE_STR;
						$gpc['desc_'.$lang['id']] 		= TYPE_STR;						
				    }
				   $Process->input->clean_array_gpc('p', $gpc);			  
				   save_input(array('table' 	=> 'calendar',
				   					'action'	=> 'update',
									'para'		=> 'id='.$Process->GPC['id']),
							  array('date'		=> $Process->GPC['dateYear'].'-'.$Process->GPC['dateMonth'].'-'.$Process->GPC['dateDay']));
				  redirect(_BASE_URL);
			  }		   		   
	  	break;
		
	  case 'customers':
	      $customers = query_array("select * from customer_db order by trans_id desc");
		  export_to_excel($customers);
	  	break;
	
	  case 'undo':
	      $extra['undo_data'] = query_first("select * from undo_record");
		  $extra['admin_panel'] = 'undo';	
		  if ($_POST['do'] == 'undo')
		      {
				  $Process->current_vars = '';
				  $data = unserialize($extra['undo_data']['query']);
				  $action = $data['action'];
				  $para = $data['para'];
				  $url = $extra['undo_data']['url'];
				  $data = (unserialize(stripslashes($data['data'])));
				  save_input(array(
				  			'table' 	=> 'page_links',
							'action'	=> $action,
							'para'		=> $para), $data);
				  query("update undo_record set msg =''");
				  redirect(_ROOT_URL.'/'.$url);
			  }
	  	break;
		
	  case 'add_user':
	  	   if (!$Process->userinfo['god'])
				redirect(_ROOT_URL);	  
		   $Process->input->clean_array_gpc('g', array('u'	=> TYPE_INT));
		   $extra['user'] = fetch_userinfo($Process->GPC['u']);	
		   $extra['usergroupid'] =  form_select('usergroupid', fetch_table('usergroup'), 'name', iif('usergroupid', $extra['user']['usergroupid']), false, false, false, false, $extra['user']['god'], $god_msg);
		   $extra['admin_panel'] = 'add_user';	
		   if ($_POST['do'] == 'add_user')
		       { 
				   $Process->input->clean_array_gpc('p', array(
		   					'firstname'		=> TYPE_STR,
							'lastname'		=> TYPE_STR,
							'email'			=> TYPE_STR,
							'usergroupid'	=> TYPE_INT));							
				   $Process->input->required(array(
		   					'firstname'		=> TYPE_NAME,
							'lastname'		=> TYPE_NAME,
							'email'			=> TYPE_EMAIL), array(), array('already_registered_email' => true));
				   if (!count($Process->input->error_msg))
					{
						$usergroup = query_first("select * from usergroup where id = ".$Process->GPC['usergroupid']);
						$Process->GPC['usergroup'] = $usergroup['usertitle'];
						$userid = save_input(array('table' 	=> 'user'));
						email_lostpassword(array('userid' => $userid, 
												 'email'  => $Process->GPC['email']), '', 'new_password_setup');						
					}			        
			   }
	  	break;
			  
	  case 'edit_user':
	  	   if (!$Process->userinfo['god'])
				redirect(_ROOT_URL);	  
		   $Process->input->clean_array_gpc('g', array('u'	=> TYPE_INT));
		   $extra['user'] = fetch_userinfo($Process->GPC['u']);	
		   if ($extra['user']['god'])
		   	   $god_msg = 'You can not edit access level if user is set as GOD!';
		   $extra['usergroupid'] =  form_select('usergroupid', fetch_table('usergroup'), 'name', iif('usergroupid', $extra['user']['usergroupid']), false, false, false, false, $extra['user']['god'], $god_msg);
		   $extra['admin_panel'] = 'edit_user';	
		   if ($_POST['do'] == 'update_user')
		       { 
				   $Process->input->clean_array_gpc('p', array(
		   					'firstname'		=> TYPE_STR,
							'lastname'		=> TYPE_STR,
							'email'			=> TYPE_STR,
							'usergroupid'	=> TYPE_INT));
				   $Process->input->required(array(
		   					'firstname'		=> TYPE_NAME,
							'lastname'		=> TYPE_NAME,
							'email'			=> TYPE_EMAIL));
				   if (!count($Process->input->error_msg))
					{
						save_input(array('table' 	=> 'user',
										 'action'	=> 'update',
										 'para'		=> 'userid = '.$extra['user']['userid']));
						redirect(_BASE_URL);
					}			        
			   }
	  	break;
	  case 'edit_link':
		    $Process->input->clean_array_gpc('g', array('l'	=> TYPE_INT));		  
	  		$extra['group'] = query_first("select * from groups where id = ".$Process->GPC['l']);
 		    $extra['admin_panel'] = 'edit_link';				
	  	break;
		
	  case 'template':
	  		$extra['groups'] = query_array("select * from groups order by name");
 		    $extra['admin_panel'] = 'template';	
		    $Process->input->clean_array_gpc('p', array('id'	=> TYPE_INT));			
		    if (isset($_POST['edit_link']))
			    redirect(_BASE_URL.'?action=edit_link&l='.$Process->GPC['id']);			
			if ($_POST['do'] == 'del_link')
			{
				   query("delete from groups where id = ".$Process->GPC['id']);
				   set_form_submitted();
				   redirect(_BASE_URL);
			}
			if ($_POST['do'] == 'add_link')
			{
				   $Process->input->clean_array_gpc('p', array(
		   					'name'		=> TYPE_STR,
							'active'	=> TYPE_STR));
				   $Process->input->required(array(
		   					'name'		=> TYPE_STR));
				   if (!count($Process->input->error_msg))
					{
						save_input(array('table' 	=> 'groups'),
								   array('active'	=> $Process->GPC['active'] == 'on'));
						redirect(_BASE_URL);
					}				
			}
	  	break;
		
	  case 'settings':
	  	   if (!$Process->userinfo['god'])
				redirect(_ROOT_URL);
		   $extra['captcha'] = fetch_settings('captcha');
		   $extra['logs'] = query_array("select * from log order by date desc");
	  	   $extra['all_languages'] = query_array("select * from language");
		   $extra['users'] = query_array("select * from user where usergroupid >= 6");
		   $extra['default_language'] = form_select('default_language', $languages, 'title', iif('default_language', $Process->options['default_language']));
		   $extra['email_msg'] = query_array("select * from email_templates");
		   $extra['error_msgs'] = query_array("select * from phrases where type = 'error_msg'");		   
		   $extra['phrases'] = query_array("select * from phrases where type = 'phrase'");		   		   
		   $extra['admin_panel'] = 'settings';
		   switch ($_POST['do'])
		   {
			   case 'save_msg':
				   $gpc = array('id'	=> TYPE_INT);
				   foreach ($languages as $lang)
						$gpc['name_'.$lang['id']] 		= TYPE_STR;		
 				    $Process->input->clean_array_gpc('p', $gpc);
					save_input(array('table' 				=> 'phrases',
									 'action'				=> 'update',
									 'para'					=> 'id = '.$Process->GPC['id']));
					redirect(_BASE_URL);										
			   	break;
							   
			   case 'save_email_msg':
				   $gpc = array('id'	=> TYPE_INT);
				   foreach ($languages as $lang)
					{
						$gpc['subject_'.$lang['id']] 		= TYPE_STR;
						$gpc['message_'.$lang['id']] 		= TYPE_STR;		
				    }			   
 				    $Process->input->clean_array_gpc('p', $gpc);
					save_input(array('table' 				=> 'email_templates',
									 'action'				=> 'update',
									 'para'					=> 'id = '.$Process->GPC['id']));
					redirect(_BASE_URL);										
			   	break;
			
			   case 'edit_phrases':
			   case 'edit_error_msg':
 				    $Process->input->clean_array_gpc('p', array('id' => TYPE_INT));
			   		$extra['msg'] = query_first("select * from phrases where id = ".$Process->GPC['id']);
					$extra['admin_panel'] = 'edit_msg';			   
			     break;
				 
			   case 'edit_email_message':
 				    $Process->input->clean_array_gpc('p', array('id' => TYPE_INT));
			   		$extra['email_msg'] = query_first("select * from email_templates where id = ".$Process->GPC['id']);
					$extra['admin_panel'] = 'edit_email_msg';
			   	break;
				
			   case 'update_website':
			   		$gpc = array('email_contact'       		=> TYPE_STR,
								 'cookietimeout'       		=> TYPE_INT,	
								 'change_password_timeout'  => TYPE_INT,
								 'default_language'			=> TYPE_STR);
				    foreach ($extra['all_languages'] as $lang)
				    {
						if ($lang['status'])
						  {
					   		$gpc['website_name_'.$lang['id']] 		= TYPE_STR;
					   		$require['website_name_'.$lang['id']] 	= TYPE_NAME;
						  }
				   		$gpc['lang_enable_'.$lang['id']] 		= TYPE_STR;
					}
				   $Process->input->clean_array_gpc('p', $gpc);
				   $Process->input->required(array_merge($require, array(
			   					'email_contact'        		=> TYPE_EMAIL,	
								'cookietimeout'	     		=> TYPE_INT,			
								'change_password_timeout'   => TYPE_INT)));
				   $default_lang = $Process->GPC['default_language'];
			   	   if ($Process->GPC['lang_enable_'.$default_lang] != 'on' && $Process->GPC['default_language'] != $Process->options['default_language'])
				   	   $Process->input->error_msg['default_language'] = 'The default language you have select must be activated first';
				   if (!count($Process->input->error_msg))
					{
						$Process->GPC['cookietimeout'] = $Process->GPC['cookietimeout'] * 60;
						save_input(array('table' => 'settings'), false, false, true);
						foreach ($extra['all_languages'] as $lang)
						{
							$enable_language = $Process->GPC['lang_enable_'.$lang['id']] == 'on' || $lang['id'] == $Process->options['default_language'];
							query("update language set status = ".intval($enable_language)." where id = '".$lang['id']."'");
						}
						redirect(_BASE_URL);
					}			        
			   	break;
				
				case 'user':
				   $Process->input->clean_array_gpc('p', array('userid'	=> TYPE_INT));
				   $user = fetch_userinfo($Process->GPC['userid']);
				   if (isset($_POST['reset_password']))
					   email_lostpassword($user, '');
				   if (isset($_POST['del_user']))
				   	   {
						   query("delete from user where userid = ".$user['userid']);
						   log_it($user);
						   set_form_submitted();
						   redirect(_BASE_URL);
					   }
				   if (isset($_POST['edit_user']))
					   redirect(_BASE_URL.'?action=edit_user&u='.$user['userid']);
				break;
		   }
	  	break;
		
	  case 'maintenance':
		   $extra['admin_panel'] = 'maintenance';
		   if ($_POST['do'] == 'maintenance')
		      {
				   $gpc = array('enable' => TYPE_STR);
				   foreach ($languages as $lang)
					{
						$gpc['body_'.$lang['id']] 		= TYPE_STR;
					    if ($_POST['enable'] == 'on')							
					   		$require['body_'.$lang['id']] 	= TYPE_BODY;
						$lang_temp['body_'.$lang['id']] = $lang['title'];
				    }
				   $Process->input->clean_array_gpc('p', $gpc);
				   if ($_POST['enable'] == 'on')
					   $Process->input->required($require);	
				   if (!count($Process->input->error_msg))
				       {
						  save_input(array(), array(), false, 'maintenance');
						  redirect(_BASE_URL);
					   }
			       else
				       {
				     	  foreach ($Process->input->error_msg as $error => $value)
						  	{
								$extra['popup_notify'][$error]['code'] = 'Body';
								$extra['popup_notify'][$error]['body'] = $value;
								$extra['popup_notify'][$error]['title'] = $lang_temp[$error].' : Body';								
							}
					   }
			  }
	  	break;
		
	  case 'intro':
		   $extra['admin_panel'] = 'intro_page';  
	  	break;
		
	  case 'index':
		   $extra['admin_panel'] = 'index_page';
		   $extra['sitemap'] = fetch_sitemap();
	  	break;
			  
	  case 'move':
		   $Process->input->clean_array_gpc('g', 
		   			array('page' 		=> TYPE_INT));
		   $source = $Process->GPC['page'];
		   $extra['admin_panel'] = 'move_page';
		   $extra['source_page'] = fetch_select('page_links', 0, $source, false, 'Root', true, 'Page to be moved!');
		   $extra['ignore_parent'] = $Process->GPC['page'];		   
		   $extra['destination_page'] = fetch_select('page_links', 0, false, false, 'Root', false, 'Destination page');
		   $extra['sub_pages'] = query_array("select * from page_links where parent_id = ".$Process->GPC['page']." and module != 'block' order by sort");
   		   $extra['sub_pages_found'] = count($extra['sub_pages']);
		   if ($_POST['do'] == 'move_page')
		   	   cms_move_page($Process->GPC['page']);
	  	break;
		
	  case 'order':
	       if (isset($_GET['position']))
		   {
		   		$Process->input->clean_array_gpc('g', array('position'	=> TYPE_INT));	
				$extra['links'] = $extra['group'][$Process->GPC['position']];
				$name = query_first("select name from groups where id = ".$Process->GPC['position']);
				$extra['parent_name'] = $name['name'];		   
		   }
		   else
		   {
		   		$Process->input->clean_array_gpc('g', array('parent'	=> TYPE_INT));
			    $active_header = $Process->GPC['parent'] == 0 ? ' and active_header = 1' : '';
			    $extra['links'] = query_array("select * from page_links where parent_id = ".$Process->GPC['parent']." and module != 'block' ".$active_header." order by sort");
				$extra['parent_name'] = $Process->GPC['parent'] == '0' ? 'Root' : $current_module['link_'._DEFAULT_LANG];
			    $extra['parent_root'] = true;
		   }
		   $extra['admin_panel'] = 'order_links';
		   $extra['max_cols'] = $extra['parent_root'] ? count($languages) + 3 : count($languages) + 1;
	  	break;
		
	  case 'del':
		   $Process->input->clean_array_gpc('g', 
		   			array('parent'	=> TYPE_INT));	  
		   $extra['sub_pages'] = query_array("select * from page_links where parent_id = ".$Process->GPC['parent']." and module != 'block' order by sort");
		   $extra['pages_found'] = count($extra['sub_pages']);
		   $extra['admin_panel'] = 'del_page';
		   if ($extra['is_home'])
		      {
		   	  	 $home_links = query_array("select * from page_links where active_header = 1 and parent_id = 0 and id != ".$Process->GPC['parent']." order by sort"); 
				 $extra['homepage_select'] = form_select('home', $home_links, 'link_'._DEFAULT_LANG);
			  }
		   if ($_POST['do'] == 'del_page')
		   	   cms_delete_page($Process->GPC['parent'], $extra['sub_pages']);
	  	break;		
  }
  return isset($extra['admin_panel']);
}

function enable_ckeditor($current_module)
{
   global $extra, $Process;
   $extra['block_editor'] = false;
   $extra['page_editor'] = false;
   $extra['page_add'] = false;   
   $extra['admin_panel'] = false;   
   $Process->input->clean_array_gpc('g', 
   			array('block' => TYPE_INT,
				  'page'  => TYPE_INT));
   if ($Process->GPC['block'])
   	   {
		  $extra['block_editor'] = true;
		  $extra['current_block'] = query_first("select * from page_links where id = ".$Process->GPC['block']);		  
	   }
   elseif ($Process->GPC['page'])
       {
		  $extra['page_editor'] = true;
	      $extra['pageid'] = $_GET['page'];
		  $extra['position'] = form_select('position', $extra['groups'], 'name', iif('position', $current_module['position']), false, 'Disabled');		  
		  $extra['active_header'] = form_select('active_header', fetch_YesNo(), false, iif('active_header', $current_module['active_header']), false, false, false, false, $current_module['parent_id'] != 0, 'Page must be in Root to be active in header link'); 		
		  if ($extra['is_home'])
			  $extra['home'] = form_select('home', fetch_YesNo(), false, iif('home', $current_module['home']), false, false, false, false, true, 
			  	'You cannot unset this page as your Homepage! You must set another page as Homepage instead').'<input type="hidden" name="home" value="1">';
		  else
			  $extra['home'] = form_select('home', fetch_YesNo(), false, iif('home', $current_module['home']), false, false, false, false, $current_module['parent_id'] != 0, 'Page must be in Root to be set as homepage');
		  $extra['parent_id'] = fetch_select('page_links', 0, iif('parent_id', $current_module['parent_id']), false, 'Root', true, 'Please use move page in the administration tools to change the page\'s location'); 
	   }
   elseif (isset($_GET['page_add']))
   	   {
		  $extra['page_add'] = true;
		  $extra['active_header'] = form_select('active_header', fetch_YesNo(), false, $_POST['active_header'], false, false, false, false, $current_module['parent_id'] != 0, 'New page must be in root to enable it in the header links'); 
		  $extra['home'] = form_select('home', fetch_YesNo(), false, $_POST['home'], false, false, false, false, $current_module['parent_id'] != 0, 'New page must be in root to enable it in as Home');
		  $extra['parent_id'] = fetch_select('page_links', 0, $current_module['parent_id']);
		  $extra['position'] = form_select('position', $extra['groups'], 'name', iif('position', $current_module['position']), false, 'Disabled');
	   }
   $extra['ckeditor_visible'] = ($extra['block_editor'] || $extra['page_editor'] || $extra['page_add']);
   $extra['ckeditor_type'] = $extra['block_editor'] ? 'block' : 'page';
   if (isset($_GET['action']) && !empty($_GET['action']))
   	   admin_features($_GET['action']);
   $extra['ckeditor_selector'] = !$extra['ckeditor_visible'] && !$extra['admin_panel'];
   return $extra['ckeditor_visible'] && !$extra['admin_panel'];
}

function cms_process()
{
   if (isset($_POST['cancel']))
   	   redirect(_BASE_URL);

   if (isset($_POST['save']) || isset($_POST['do']))
   	   switch ($_POST['do'])
	   {
		   case 'save_page':
				 cms_save_page();
		   break;
		
	   	   case 'save_block':
			  	 cms_save_block();
		   break;
		   
		   case 'add_page':
		   		cms_add_page();
		   break;	
		   
		   case 'order_links':
		   		cms_order_links();
		   break;	
	   }
}

function recursive_delete($id)
{
   query("delete from page_links where id = ".$id);
   $children = query_array("select * from page_links where parent_id = ".$id." order by sort");
   foreach ($children as $child)
	  recursive_delete($child['id']);
}

function cms_delete_page($id, $sub_pages)
{ 
   global $extra, $Process, $languageid, $current_module;
   $Process->GPC['delete_fullurl'] = fetch_url_link($id, $languageid);
   $Process->GPC['delete_link'] = $current_module['link_'.$languageid];
   recursive_delete($id);
   if ($extra['homepage_select'])
       {
		   $Process->input->clean_array_gpc('p', array('home'	=> TYPE_INT));
		   query("update page_links set home = 1 where id = ".$Process->GPC['home']);
	   }
   set_form_submitted(false, true);	   
   redirect(_ROOT_URL);
}

function cms_order_links()
{
  global $Process, $extra;
  if (isset($_GET['position']))
   {
  		$Process->input->clean_array_gpc('g', array('position'	=> TYPE_INT));	
		$links = $extra['group'][$Process->GPC['position']];  
   }
  else
  {
	   $Process->input->clean_array_gpc('g', array('parent_id'	=> TYPE_INT));
	   $links = query_array("select * from page_links where parent_id = ".$Process->GPC['parent']." and module != 'block' order by sort");
  }
  for ($i=0; $i<count($links); $i++)
      query("update page_links set sort = ".intval($_POST['link_'.$links[$i]['id']])." where id = ".$links[$i]['id']);
  set_form_submitted();
  redirect(_BASE_URL);
}

function cms_move_page($page)
{
  global $Process, $current_module, $languageid;
  $Process->input->clean_array_gpc('p', array('parent_id'	=> TYPE_INT));  
  query("update page_links set parent_id = ".$Process->GPC['parent_id'].", active_header = 0, home = 0 where id = ".$Process->GPC['page']);
  set_form_submitted(); 
  _CMS_PROCESS::set_undo();
  redirect(_ROOT_URL.'/'.fetch_url_link($Process->GPC['page'], $languageid));
}

function cms_add_page()
{
  global $Process;
  $Process->input->clean_array_gpc('p', array('parent_id'	=> TYPE_INT));
  $module = query_first("select * from page_links where id = ".$Process->GPC['parent_id']);
  $module = $module['module'] == 'treatment' && $module['parent_id'] == 0 ? 'treatment' : 'custom';
  $cms = new _CMS_PROCESS();
  $cms->table = 'page_links';
  $cms->curr_lang = false;
  $cms->seo = true;  
  $cms->addons = array('module' => $module, 'date_added' => TIMENOW, 'last_modified' => - 1, 'byuser' => intval($Process->userinfo['userid']));  
  $cms->process(array('body', 'meta_keywords', 'meta_descriptions', 'home', 'active_header', 'link', 'page_title', 'parent_id', 'position'));
}

function cms_save_block()
{
  global $Process, $current_module;
  $Process->GPC['page'] = $current_module;  
  $Process->input->clean_array_gpc('p', array('id'	=> TYPE_INT));
  $cms = new _CMS_PROCESS();
  $cms->table = 'page_links';
  $cms->action = 'update';
  $cms->para = 'id = '.$Process->GPC['id'];
  $cms->curr_lang = false;
  $cms->id = $current_module['id'];
  $cms->addons = array('date_added' => TIMENOW, 'last_modified' => - 1, 'byuser' => intval($Process->userinfo['userid']));
  $cms->process(array('body'));
}

function cms_save_page()
{
  global $current_module, $Process;
  $Process->GPC['page'] = $current_module;  
  $cms = new _CMS_PROCESS();
  $cms->table = 'page_links';
  $cms->action = 'update';
  $cms->seo = true;  
  $cms->id = $current_module['id'];
  $cms->para = 'id = '.$current_module['id'];
  $cms->addons = array('last_modified' => TIMENOW, 'byuser' => intval($Process->userinfo['userid']));  
  $cms->process(array('body', 'meta_keywords', 'meta_descriptions', 'home', 'active_header', 'link', 'page_title', 'position'));
}

class _CMS_PROCESS
{

  var $set_use_lang = array('body', 
  							'meta_keywords', 
							'meta_descriptions', 
							'link',
							'page_title');
							
  var $set_clean =    array('body'				=> TYPE_STR,
  							'meta_keywords'		=> TYPE_STR,
							'meta_descriptions'	=> TYPE_STR,
							'link'				=> TYPE_STR,
							'page_title'		=> TYPE_STR,
							'home'				=> TYPE_INT,
							'active_header'		=> TYPE_INT,
							'parent_id'			=> TYPE_INT,
							'position'			=> TYPE_INT);
								
  var $set_required = array('meta_descriptions'	=> TYPE_STR,
							'link'				=> TYPE_STR,
							'page_title'		=> TYPE_STR);
							
  var $action = 'insert';
  var $curr_lang = true;							
  var $clean_gpc = array();
  var $clean_gpc_exclude = array();
  var $required = array();
  
  function init()
  {
	 global $languageid, $languages;
	 $this->query = array(
	 		'table'		=> $this->table,
			'action'	=> $this->action,
			'para'		=> $this->para);
			
     foreach ($this->fields as $field)
	 {
		 $clean_type = $this->set_clean[$field];
		 if (in_array($field, $this->set_use_lang))
		   {
		      if ($this->curr_lang)
			      {
				  	$this->clean_gpc[$field.'_'.$languageid] = $clean_type;
				 	$this->required[$field.'_'.$languageid] = $this->set_required[$field];
				  }
			  else
			  	  foreach ($languages as $lang)
				   {
					  $this->clean_gpc[$field.'_'.$lang['id']] = $clean_type;
				 	  $this->required[$field.'_'.$lang['id']] = $this->set_required[$field];
				   }
		   }  
		 else  
		   {
			 $this->clean_gpc[$field] = $clean_type;
			 $this->required[$field] = $clean_type;
		   }
	 }
  }
  
  function fetch_error($key)
  { 
     $curr_key = $key;
//     if (!$this->curr_lang)
		 $key = substr($key, 0, -3);
     $error = query_first("select * from error_msg where code = '".$key."'");
	 $this->errors_found++;
     if (!$this->curr_lang)
		 {
		    global $languages;
			foreach ($languages as $lang)
			  if ($lang['id'] == substr($curr_key, -2))
			      $error['title'] = $lang['title'].' : '.$error['title'];
		 }
	 return $error;
  }
  
  function validate()
  {
  	global $Process; 
	$Process->input->clean_array_gpc('p', $this->clean_gpc, $this->clean_gpc_exclude);
	foreach ($this->required as $key => $value)
	{
		$input = $Process->GPC[$key];
		switch ($value)
		{
			case TYPE_STR:
					if (strlen($input) < 2)
						$this->errors[$key] = $this->fetch_error($key);
				break;
		}
	}
    return $this->errors_found < 1;
  }
  
  function set_seo_url()
  {
	global $languages, $Process;
	if ($this->seo)
	    foreach ($languages as $lang)
		{
		   $seo_url = MakeURLSafeString($Process->GPC['link_'.$lang['id']]);
		   if (!empty($seo_url))
			  $this->addons['seo_url_'.$lang['id']] = MakeURLSafeString($Process->GPC['link_'.$lang['id']]);
		}
  }

  function set_home()
  {
	global $Process, $current_module;
	if (($Process->GPC['parent_id'] == 0 && $_POST['do'] == 'add_page') || ($current_module['parent_id'] == 0 && $_POST['do'] == 'save_page'))
		query("update page_links set home = 0 where home = 1");
  }
  
  function set_undo()
  {
	  global $current_module, $Process, $languageid, $extra;
	  switch ($_POST['do'])
	  {
		   case 'save_page':
		   		$query['action'] = 'Page Edit';
				$query['msg'] = 'You are about to restore the page: <strong>'.$Process->GPC['link_'.$languageid].'</strong> to it\'s previous state' ;
				$query['query'] = serialize(array('action'	=> 'update',
									   'para'	=> 'id = '.$current_module['id'],
									   'data'	=> addslashes(serialize(
									   			array('meta_keywords_'.$languageid			=> $current_module['meta_keywords_'.$languageid],
													  'meta_descriptions_'.$languageid		=> $current_module['meta_descriptions_'.$languageid],
													  'active_header'						=> $current_module['active_header'],
													  'active_footer'						=> $current_module['active_footer'],
													  'link_'.$languageid					=> $current_module['link_'.$languageid],
													  'page_title_'.$languageid				=> $current_module['page_title_'.$languageid],
													  'body_'.$languageid					=> $current_module['body_'.$languageid],
													  'link_order'							=> $current_module['link_order'],
													  'seo_url_'.$languageid				=> $current_module['seo_url_'.$languageid],
													  'module'								=> $current_module['module'],
													  'sort'								=> $current_module['sort'],
													  'last_modified'						=> TIMENOW,
													  'byuser'								=> $Process->userinfo['userid'])))));
	     	break;		
			
		   case 'move_page':
		   		$query['action'] = 'Page Move';		   
				$source = query_first("select * from page_links where id = ".$Process->GPC['parent_id']);
				$source = $Process->GPC['parent_id'] == 0 ? 'Root' : $source['link_'.$languageid];
				$destination = query_first("select * from page_links where id = ".$current_module['parent_id']);
				$destination = $current_module['parent_id'] == 0 ? 'Root' : $destination['link_'.$languageid];
				$query['msg'] = 'You are about to move the page: <strong>'.$current_module['link_'.$languageid].'</strong> from: <strong>'.$source.'</strong> back to <strong>'.$destination.'</strong>';
				$query['query'] = serialize(array('action'	=> 'update',
									   'para'	=> 'id = '.$current_module['id'],
									   'data'	=> serialize(array('parent_id'	=> $current_module['parent_id']))));
		     break;			  
	  }
	$query['url'] = $extra['current_link'];
	$query['user'] = $Process->userinfo['firstname'].' '.$Process->userinfo['lastname'];
	$query['date'] = TIMENOW;
	$Process->db->perform('undo_record', $query, 'update');	  
  }
  
  function perform()
  {
	global $languageid, $extra, $Process;
	
	if ($this->validate())
	    {
		  $this->set_seo_url();
		  if ($Process->GPC['home'])
			  $this->set_home();		  
		  $this->insert_id = save_input($this->query, $this->addons, $this->msg, $this->serialize);
		  $goto_url = $this->action == 'insert' ? fetch_url_link($this->insert_id, $languageid) : fetch_url_link($this->id, $languageid);
		  $this->set_undo();		  
		  redirect(_ROOT_URL.'/'.$goto_url);
		}
	else 
	 	$extra['popup_notify'] = $this->errors;
  }

  function process($query_fields = array())
  {
	 if (empty($query_fields))
	 	return false;
	 $this->fields = $query_fields;
	 $this->init();
	 $this->perform();
  }
  
}

?>