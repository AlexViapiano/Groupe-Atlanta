<?php /* Smarty version Smarty-3.1.3, created on 2016-07-31 23:31:18
         compiled from "./includes/templates/page_cms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2126788203579ec286a10fe1-06736071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '440f71cb9d743816343bab95086ae38beb12a3f5' => 
    array (
      0 => './includes/templates/page_cms.tpl',
      1 => 1470021817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2126788203579ec286a10fe1-06736071',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_579ec286ac80b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579ec286ac80b')) {function content_579ec286ac80b($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['popup']->value['msg']){?>
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