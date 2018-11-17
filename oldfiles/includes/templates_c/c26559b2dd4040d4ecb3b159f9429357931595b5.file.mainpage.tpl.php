<?php /* Smarty version Smarty-3.1.3, created on 2016-08-04 08:48:54
         compiled from "./includes/templates/admin/mainpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:47570015757a339b65fd8a2-98344846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c26559b2dd4040d4ecb3b159f9429357931595b5' => 
    array (
      0 => './includes/templates/admin/mainpage.tpl',
      1 => 1470021953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47570015757a339b65fd8a2-98344846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_language' => 0,
    'encoding' => 0,
    'options' => 0,
    'is_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_57a339b68d99e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a339b68d99e')) {function content_57a339b68d99e($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8 ]> <html lang="<?php echo $_smarty_tpl->tpl_vars['current_language']->value;?>
" class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="<?php echo $_smarty_tpl->tpl_vars['current_language']->value;?>
" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="<?php echo $_smarty_tpl->tpl_vars['current_language']->value;?>
"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['encoding']->value;?>
" />
<meta http-equiv="Content-Language" content="<?php echo $_smarty_tpl->tpl_vars['current_language']->value;?>
">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<title>Admin Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['options']->value['encoding'];?>
" />
<link href="../includes/templates/css/controlpanel.css" rel="stylesheet" type="text/css">
<base href="https://www.cliniquedentaireileperrot.ca/" />
<?php echo $_smarty_tpl->getSubTemplate ("scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<?php if ($_smarty_tpl->tpl_vars['is_admin']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<p id="time" class="time"></p>
<?php }?>
<body >
	<?php echo $_smarty_tpl->getSubTemplate ("admin/".($_smarty_tpl->tpl_vars['file']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>