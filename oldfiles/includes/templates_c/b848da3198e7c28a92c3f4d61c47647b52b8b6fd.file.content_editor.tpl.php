<?php /* Smarty version Smarty-3.1.3, created on 2014-05-15 11:48:35
         compiled from ".\includes/templates\admin\content_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:635374e1d357c4a8-87776667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b848da3198e7c28a92c3f4d61c47647b52b8b6fd' => 
    array (
      0 => '.\\includes/templates\\admin\\content_editor.tpl',
      1 => 1348545600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '635374e1d357c4a8-87776667',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_editor' => 0,
    'id' => 0,
    'pageid' => 0,
    'type' => 0,
    'link' => 0,
    'current_page' => 0,
    'multilingual' => 0,
    'lang_link' => 0,
    'lang_change_link' => 0,
    'current_language' => 0,
    'content' => 0,
    'height' => 0,
    'page_add' => 0,
    'languages' => 0,
    'lang' => 0,
    'page_id' => 0,
    'block_editor' => 0,
    'block_content' => 0,
    'data' => 0,
    'found' => 0,
    'enable_ckeditor' => 0,
    'ckeditor_visible' => 0,
    'ckeditor_type' => 0,
    'scriptpath' => 0,
    'userinfo' => 0,
    'page_content' => 0,
    'popup_notify' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5374e1d3bcb2f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374e1d3bcb2f')) {function content_5374e1d3bcb2f($_smarty_tpl) {?>  <?php ob_start(); ?>
  	<?php if ($_smarty_tpl->tpl_vars['page_editor']->value&&$_smarty_tpl->tpl_vars['id']->value==$_smarty_tpl->tpl_vars['pageid']->value&&$_smarty_tpl->tpl_vars['type']->value=='page'){?>
           <?php $_smarty_tpl->tpl_vars['found'] = new Smarty_variable(true, null, 0);?>
   		   <input type="hidden" name="do" value="save_page" />
           <div id="tabs-cms">
				<h2>Edit Page: <strong><?php echo $_smarty_tpl->tpl_vars['current_page']->value[$_smarty_tpl->tpl_vars['link']->value];?>
</strong></h2>
				<ul>
					<li><a href="#tabs-cms-1">Edit Page</a></li>
					<li><a href="#tabs-cms-2">Meta Tags</a></li>
					<li><a href="#tabs-cms-3">Page Options</a></li>
                    <?php if ($_smarty_tpl->tpl_vars['multilingual']->value){?>
					<li><a href="#tabs-cms-4" onclick="if (confirm('Any unsaved information will be lost! Continue?')) window.location.href='<?php echo $_smarty_tpl->tpl_vars['lang_link']->value;?>
?lang=<?php echo $_smarty_tpl->tpl_vars['lang_change_link']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'; return false;" 
                    		title="Make sure you have saved your changes before changing to a different language!">
                    		<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?>
			                    Version Fran&ccedil;aise
            				<?php }else{ ?>
				                English Version
				            <?php }?> 
                           </a>
                    </li>
                    <?php }?>       
				</ul>             
                <div id="tabs-cms-1">
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('content'=>$_smarty_tpl->tpl_vars['content']->value,'page_size'=>(($tmp = @$_smarty_tpl->tpl_vars['height']->value)===null||$tmp==='' ? 800 : $tmp),'id'=>"body_".($_smarty_tpl->tpl_vars['current_language']->value)), 0);?>

                </div>
				<div id="tabs-cms-2">
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['current_page']->value,'lang'=>$_smarty_tpl->tpl_vars['current_language']->value), 0);?>

				</div>
				<div id="tabs-cms-3">     
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['current_page']->value), 0);?>

                </div>
               <?php if ($_smarty_tpl->tpl_vars['multilingual']->value){?>
				<div id="tabs-cms-4">     
                	Go to the Edit Page and save your changes before going to another language.
                </div>                
                <?php }?>
		</div>            
  	<?php }elseif($_smarty_tpl->tpl_vars['page_add']->value&&$_GET['page']=='add'&&$_smarty_tpl->tpl_vars['type']->value=='page'){?>
           <?php $_smarty_tpl->tpl_vars['found'] = new Smarty_variable(true, null, 0);?> 
  			<input type="hidden" name="do" value="add_page" />
            <div id="tabs-cms">
            <h2> Add New Page</h2>
				<ul>
    	        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']++;
?>
					<li><a href="#tabs-cms-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['langs']['index']+1;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['title'];?>
</a></li>            
        	    <?php } ?>
				<li><a href="#tabs-cms-3">Page Options</a></li>                 
                </ul>
    	        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']++;
?>
                <?php $_smarty_tpl->tpl_vars['page_id'] = new Smarty_variable("body_".($_smarty_tpl->tpl_vars['lang']->value['id']), null, 0);?>
                <div id='tabs-cms-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['langs']['index']+1;?>
'>
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('lang'=>$_smarty_tpl->tpl_vars['lang']->value['id']), 0);?>
   
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('content'=>$_POST[$_smarty_tpl->tpl_vars['page_id']->value],'page_size'=>(($tmp = @$_smarty_tpl->tpl_vars['height']->value)===null||$tmp==='' ? 500 : $tmp),'id'=>$_smarty_tpl->tpl_vars['page_id']->value), 0);?>
                                     
                </div>
                <?php } ?>
				<div id="tabs-cms-3">     
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('data'=>$_smarty_tpl->tpl_vars['current_page']->value), 0);?>

                </div>                      
            </div>     
  	<?php }elseif($_smarty_tpl->tpl_vars['block_editor']->value&&$_smarty_tpl->tpl_vars['id']->value==$_GET['block']&&$_smarty_tpl->tpl_vars['type']->value=='block'){?>
           <?php $_smarty_tpl->tpl_vars['found'] = new Smarty_variable(true, null, 0);?>
    	   Edit: <strong>Block</strong>                
  			<input type="hidden" name="do" value="save_block" />
  			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />            
            <div id="tabs-cms">
				<ul>
    	        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']++;
?>
					<li><a href="#tabs-cms-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['langs']['index']+1;?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['title'];?>
</a></li>            
        	    <?php } ?>
                </ul>
    	        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value){
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['langs']['index']++;
?>
                <?php $_smarty_tpl->tpl_vars['block_content'] = new Smarty_variable("body_".($_smarty_tpl->tpl_vars['lang']->value['id']), null, 0);?>
                <div id="tabs-cms-<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['langs']['index']+1;?>
">
                	<?php echo $_smarty_tpl->getSubTemplate ("admin/page_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('content'=>$_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['block_content']->value],'page_size'=>(($tmp = @$_smarty_tpl->tpl_vars['height']->value)===null||$tmp==='' ? 250 : $tmp),'id'=>$_smarty_tpl->tpl_vars['block_content']->value,'type'=>'block'), 0);?>
                
                </div>
                <?php } ?>
            </div>       
  	<?php }?>
    <?php  $_smarty_tpl->assign('page_content', ob_get_contents()); Smarty::$_smarty_vars['capture']['default']=ob_get_clean();?>
    <?php if ($_smarty_tpl->tpl_vars['found']->value&&$_smarty_tpl->tpl_vars['enable_ckeditor']->value&&$_smarty_tpl->tpl_vars['ckeditor_visible']->value&&$_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['ckeditor_type']->value){?>
    <div style="z-index:1000; overflow:visible">
      <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['scriptpath']->value;?>
">
	  <input type='hidden' name='securitytoken' value='<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['securitytoken'];?>
' />
      <div style="text-align:right"> 
           <input type="submit" name="cancel" value="Cancel" style="background:none; border:none; color:#666" /> &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="submit" name="save" value="Save" style="background:none; border:none; color:#666" />
      </div>
        <?php echo $_smarty_tpl->tpl_vars['page_content']->value;?>

      <div style="text-align:right"> 
           <input type="submit" name="cancel" value="Cancel"style="background:none; border:none; color:#666" /> &nbsp;&nbsp;&nbsp;&nbsp;
           <input type="submit" name="save" value="Save" style="background:none; border:none; color:#666" />
      </div>
   	  </form>
      </div>
	   <?php if ($_smarty_tpl->tpl_vars['popup_notify']->value){?>
    	  <?php echo $_smarty_tpl->getSubTemplate ("admin/popup_notify.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	   <?php }?>
	<?php }else{ ?>
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

	<?php }?><?php }} ?>