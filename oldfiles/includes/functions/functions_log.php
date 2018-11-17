<?php

function page_edit($all=true)
{
   global $Process, $languageid;
   $fields =  array('body'				=> 'Body Text',
  					'meta_keywords'		=> 'Meta Keywords',
					'meta_descriptions'	=> 'Meta Descriptions',
					'link'				=> 'Link name',
					'page_title'		=> 'Page Title');
   $options = array('home'				=> 'Home Page',
					'active_header'		=> 'Active Header',
					'active_footer'		=> 'Active Footer');
   if ($all)
   {
	   foreach ($fields as $key => $value)
    	 if ($Process->GPC['page'][$key.'_'.$languageid] != $Process->GPC[$key.'_'.$languageid] && isset($Process->GPC[$key.'_'.$languageid]))
			 $modified[] = $value;
   } 
   foreach ($options as $key => $value)
     if (($Process->GPC['page'][$key] != $Process->GPC[$key]) && isset($Process->GPC[$key]) || $all==false)
		 $modified[] = $Process->GPC[$key] ? $value.'(enabled)' : $value.'(disabled)';
   return !empty($modified) ? $Process->GPC['link_'.$languageid].': '.implode(', ', $modified) : false;
}
							
function log_it($data=false)
{
   global $Process, $languageid, $extra, $current_module;
   $query = false;
   
   if (empty($_POST['do']) or !isset($_POST['do']))
   	   return false;
   
   if (!$data)
	   $data = $Process->GPC;
	   
   switch ($_POST['do'])
   {
	   case 'maintenance':
	   	   if (!$data['affected_rows'])
			   return false;
		   
		   if ($data['enable'] == $extra['maintenance']['enable'])
		   	   return false;
			   
	       $query['type'] = 'Site Maintenance';
		   $query['msg'] = $data['enable'] ? 'Activated' : 'Disactivated';
	     break;
		 
	   case 'move_page':
	   	   if (!$data['affected_rows'])
			   return false;
					   
	       $query['type'] = 'Move Page';
		   $source = $current_module['parent_id'] == 0 ? 'Root' : fetch_url_link($current_module['parent_id'], $languageid);
		   $dest = $data['parent_id'] == 0 ? 'Root' : fetch_url_link($data['parent_id'], $languageid);		   
		   $query['msg'] = '<strong>'.$current_module['link_'.$languageid].'</strong> - From: <strong>'.$source.'</strong> - To: <strong>'.$dest.'</strong> - Sub Pages: <strong>'.$extra['sub_pages_found'].'</strong>';
	     break;
		 
	   case 'save_page':
	   	   if (!$data['affected_rows'])
			   return false;
					   
	       $query['type'] = 'Update Page';
		   $query['msg'] = page_edit().' - URL: '.fetch_url_link($data['page']['id'], $languageid);
		   if (!$query['msg'])
		   		return false;
	     break;
		 
	   case 'save_block':
	   	   if (!$data['affected_rows'])
			   return false;
			   	   
	       $block = query_first("select * from page_links where id = ".$data['id']." and module = 'block'");
		   if (empty($block))
		   	   return false;
			   
	       $query['type'] = 'Update Block';	
		   $query['msg'] = $block['name'];  
	     break;
		 
	   case 'add_page': 
	   	   if (!$data['insert_id'])
			   return false;
					   
	       $query['type'] = 'Add Page';
		   $query['msg'] = page_edit(false).' - URL: '.fetch_url_link($data['insert_id'], $languageid);
		   if (!$query['msg'])
		   		return false;	   
	     break;
		 
	   case 'order_links':
	   	   if (!$data['affected_rows'])
			   return false;
			   	   
	       $query['type'] = 'Order Links';
		   $parent = $current_module['parent_id'] == 0 ? 'Root' : $current_module['link_'.$languageid];
		   $query['msg'] = 'Parent: <strong>'.$parent.'</strong>';
	     break;
		 
	   case 'del_page':
	       $query['type'] = 'Delete Page';	
		   $query['msg'] = '<strong>'.$data['delete_link'].'</strong> - URL: <strong>'.$data['delete_fullurl'].'</strong> - Sub Pages: <strong>'.$extra['pages_found'].'</strong>';		      
	     break;
		 
	   
	   case 'add_user':
	   		if (!$data['insert_id'])
				return false;	   
				
			$query['type'] = 'Add Moderator';
			$query['msg'] = '<strong>'.$data['firstname'].' '.$data['lastname'].' - '.$data['usergroup'].'</strong>';
   		break;
	
	   case 'update_user':
	   		if (!$data['affected_rows'])
				return false;
				
			$query['type'] = 'Update Moderator';
		    $group = query_first("select usertitle from usergroup where id = ".$data['usergroupid']);
			$query['msg'] = '<strong>'.$data['firstname'].' '.$data['lastname'].' - '.$group['usertitle'].'</strong>';
	    break;
		
	   case 'user':
			if (isset($_POST['reset_password']))
			   {
				  $query['type'] = 'Password Reset';
				  $user = fetch_userinfo($data['userid']);
				  $data['firstname'] = $user['firstname'];
  				  $data['lastname'] = $user['lastname'];
				  $data['usergroupid'] = $user['usergroupid'];
			   }
			else if (isset($_POST['del_user']))
				  $query['type'] = 'Delete Moderator';
			else 
				return false;
		    $group = query_first("select usertitle from usergroup where id = ".$data['usergroupid']);
		    $data['usergroup'] = $group['usertitle'];
			$query['msg'] = '<strong>'.$data['firstname'].' '.$data['lastname'].' - '.$data['usergroup'].'</strong>';
   		break;		
   }
   
   if (!$query)
   	    return false;
   
   $query = array_merge(array('date'	=> TIMENOW,
   							  'user'	=> $Process->userinfo['firstname'].' '.$Process->userinfo['lastname']),
							  $query);
   query_process('log', $query);
 }


?>