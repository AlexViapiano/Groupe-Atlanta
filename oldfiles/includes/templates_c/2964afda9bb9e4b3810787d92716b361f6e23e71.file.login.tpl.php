<?php /* Smarty version Smarty-3.1.3, created on 2016-08-04 08:48:54
         compiled from "./includes/templates/admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53129173257a339b69922d1-87577053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2964afda9bb9e4b3810787d92716b361f6e23e71' => 
    array (
      0 => './includes/templates/admin/login.tpl',
      1 => 1470021952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53129173257a339b69922d1-87577053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'scriptpath' => 0,
    'error_msg' => 0,
    'phrase' => 0,
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_57a339b6a6178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a339b6a6178')) {function content_57a339b6a6178($_smarty_tpl) {?><br><br><br><br><br>
<table width="496" border="0" align="center" class="tborder" cellpadding="0" cellspacing="0">
  <tr>
    <td>
		<script type='text/javascript' src='includes/scripts/core/md5.js'></script>
 		<form action='<?php echo $_smarty_tpl->tpl_vars['scriptpath']->value;?>
' method='post' onsubmit='md5hash(login_password, login_md5password, login_md5password_utf)'>    
    <div class="tcat" style="padding:4px; text-align:center"><b>Log in</b></div>
		<!-- /header -->
 
		<!-- logo and version -->
		<table cellpadding="4" cellspacing="0" border="0" width="100%" class="navbody">
		<tr valign="top" style="background:#FFF">
			<td><img src="includes/templates/images/admin/logo_admin.png" alt="Divergence Marketing" title="Divergence Marketing &copy;2011" border="0" width="40" /></td>
			<td>
			  Content Managment System (CMS)
				&nbsp;
			</td>
		</tr>
		</table>
		<table width="100%"  class="logincontrols" align="center">
        <tr><td colspan="2" align="center"><div class=error><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['login_email'];?>
<?php echo $_smarty_tpl->tpl_vars['error_msg']->value['email'];?>
<?php echo $_smarty_tpl->tpl_vars['error_msg']->value['cp_denied'];?>
<?php echo $_smarty_tpl->tpl_vars['error_msg']->value['login_md5password'];?>
</div></td></tr>
		<tr>
			<td class='text'><div align="right"><?php echo $_smarty_tpl->tpl_vars['phrase']->value['email'];?>
</div></td>
			<td>
            	<input type='text' name='login_email' size='40' value="<?php echo $_POST['login_email'];?>
" class="form" />
			</td>
			<td class='text'>&nbsp;</td>
		</tr>
		<tr>
		  <td class='text'><div align="right"><?php echo $_smarty_tpl->tpl_vars['phrase']->value['password'];?>
</div></td>
		  <td><input type='password' name='login_password' id='navbar_password' size='40' class="form" /></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		<tr>
		  <td></td>
		  <td><a href="admin/lostpassword.php" title="Lost your password?">Lost your password?</a></td>
		  <td></td>                    
 	    </tr>        
		<tr>
		  <td colspan="3" height="20"></td>
 	    </tr>        
		<tr>
		  <td colspan="3" class='text' align="center">
          <?php if ($_smarty_tpl->tpl_vars['error_msg']->value['license']){?>
           <div style="color:#F00"><strong><?php echo $_smarty_tpl->tpl_vars['error_msg']->value['license'];?>
</strong></div>
           <?php }?>
           I have read and accepted the 
          <a href="includes/license.php" target="_blank" title="Terms & agreements">License Agreement</a> 
<!--          <input type="checkbox" value="checked" name="license" />--></td>
		  </tr>
		<tr>        
			<td class='text' colspan="2" align="center"><input type='submit' value='<?php echo $_smarty_tpl->tpl_vars['phrase']->value['login'];?>
' class="form" accesskey='s' /></td>
			<td>&nbsp;</td>
		</tr>
		</table>
		<input type='hidden' name='securitytoken' value='<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['securitytoken'];?>
' />
		<input type='hidden' name='do' value='login' />
		<input type='hidden' name='logintype' value='cplogin' />        
		<input type='hidden' name='login_md5password' />
		<input type='hidden' name='login_md5password_utf' />
		</form>
    </td>
  </tr>
</table><?php }} ?>