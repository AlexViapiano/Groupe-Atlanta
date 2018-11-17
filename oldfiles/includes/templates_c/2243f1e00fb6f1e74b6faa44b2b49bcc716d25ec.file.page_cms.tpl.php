<?php /* Smarty version Smarty-3.1.3, created on 2014-06-25 23:03:01
         compiled from ".\includes/templates\page_cms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52145374e1d33a4787-15003248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2243f1e00fb6f1e74b6faa44b2b49bcc716d25ec' => 
    array (
      0 => '.\\includes/templates\\page_cms.tpl',
      1 => 1400322780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52145374e1d33a4787-15003248',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_5374e1d348700',
  'variables' => 
  array (
    'popup' => 0,
    'ckeditor_selector' => 0,
    '_ROOT_URL' => 0,
    'current_link' => 0,
    'current_page' => 0,
    'static_page' => 0,
    'content_before' => 0,
    'add_content' => 0,
    'add_content_same' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5374e1d348700')) {function content_5374e1d348700($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['popup']->value['msg']){?>
	<?php echo $_smarty_tpl->getSubTemplate ("popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['ckeditor_selector']->value){?><div  class="clickable" ondblclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['current_link']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value['id'];?>
&amp;#page'" title="Double click to edit content" id="page"><?php }?>          
        	<?php ob_start(); ?>
	        	<?php echo $_smarty_tpl->tpl_vars['static_page']->value;?>

    	    <?php  Smarty::$_smarty_vars['capture']['page_content']=ob_get_clean();?>
            <?php if ($_smarty_tpl->tpl_vars['content_before']->value){?>
            	<?php echo $_smarty_tpl->tpl_vars['add_content']->value;?>

            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['add_content_same']->value){?>
			    <?php echo $_smarty_tpl->getSubTemplate ("admin/content_editor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('content'=>Smarty::$_smarty_vars['capture']['page_content'],'id'=>$_smarty_tpl->tpl_vars['current_page']->value['id'],'type'=>'page'), 0);?>

            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['content_before']->value){?>
            	<?php echo $_smarty_tpl->tpl_vars['add_content']->value;?>

            <?php }?>            
<?php if ($_smarty_tpl->tpl_vars['ckeditor_selector']->value){?></div><?php }?><?php }} ?>