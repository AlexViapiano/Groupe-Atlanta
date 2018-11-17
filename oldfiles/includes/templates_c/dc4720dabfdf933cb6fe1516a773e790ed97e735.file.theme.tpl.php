<?php /* Smarty version Smarty-3.1.3, created on 2016-07-31 23:31:18
         compiled from "./includes/templates/theme.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1412530440579ec28649b013-69699693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc4720dabfdf933cb6fe1516a773e790ed97e735' => 
    array (
      0 => './includes/templates/theme.tpl',
      1 => 1470021819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1412530440579ec28649b013-69699693',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagetitle' => 0,
    'description' => 0,
    'is_admin' => 0,
    'admin_panel' => 0,
    'current_language' => 0,
    'link_fr' => 0,
    'link_en' => 0,
    'home_link' => 0,
    'header_links' => 0,
    'seo_url' => 0,
    'current_page' => 0,
    'link' => 0,
    'pages' => 0,
    'child' => 0,
    'current_link' => 0,
    'gallery' => 0,
    'g' => 0,
    'is_home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_579ec2869b6bf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579ec2869b6bf')) {function content_579ec2869b6bf($_smarty_tpl) {?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; " />
<title><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
<base href="http://www.groupeatlanta.ca/" />
<meta name="author" content="Divergence Marketing client@divergencemarketing.com">
<meta name="Description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<link rel="stylesheet" type="text/css" href="includes/templates/css/style.css" />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <script type="text/javascript" src="includes/scripts/custom.js"></script>
	<link href='includes/templates/css/overlaypopup.css' rel='stylesheet' type='text/css'>
</head>
<?php if ($_smarty_tpl->tpl_vars['is_admin']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/admin_tools.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<body>

<div class="page_container">
<?php if ($_smarty_tpl->tpl_vars['admin_panel']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate ("admin/panel_format.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('content'=>$_smarty_tpl->tpl_vars['admin_panel']->value), 0);?>

<?php }?>
	<div style="margin:0px 0px 12px 15px;position:relative;height:65px">       
            <div style="font-size:12px;position:absolute;top:5px;right:0;padding:5px 0px ;text-transform:uppercase;text-align:right;">
             <div style="margin-bottom:10px">
            	<a href="mailto:contact@groupeatlanta.ca" style=";text-decoration:none"><span style="color:#666666;font-weight:bold;text-transform:none;font-size:14px">contact@groupeatlanta.ca</span></a> 
                <span style="color:#8c0043;font-weight:bold">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span> <span style="color:#0054a4;font-size:14px;font-weight:bold">514-326-7888</span>
            </div>
           
        	   	<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?><a href="<?php echo $_smarty_tpl->tpl_vars['link_fr']->value;?>
?lang=fr" style="color:#627dbc;text-decoration:none;font-size:14px;font-weight:bold">FRAN&Ccedil;AIS</a>
                <?php }else{ ?><a href="<?php echo $_smarty_tpl->tpl_vars['link_en']->value;?>
?lang=en" style="color:#627dbc;text-decoration:none;font-size:14px;font-weight:bold">ENGLISH</a><?php }?>
                <p style="margin-top:15px"><span style="font-size:10px"> Membre de L'APCHQ &#8226; LIC. RBQ: 1750-6148-39</span></p>
            </div>
        <div style="margin-top:5px;margin-left:0px;position:relative;overflow:hidden;width:600px">
	            <a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value;?>
"><img src="includes/templates/images/group-atlanta-logo.jpg" style="float:left;margin-right:15px;" /></a>
                <img src="includes/templates/images/aluminum-atlanta.jpg" style="float:left;margin-right:15px;" />
	            <img src="includes/templates/images/fenesco-logo.jpg" style="float:left;margin-right:15px" />
	            <img src="includes/templates/images/ra-logo.jpg" style="float:left" />
        </div>
    </div>
</div>
<div style="margin:0 0px 20px 0;background:#99a3c6;position:relative">
    <div style="margin:0 auto;width:960px;background:#487aac;height:34px;position:relative">
      <!--<a href="#"><img src="includes/templates/images/google-icon.jpg" style="position:absolute;right:20px;top:5px" /></a>-->
        	<ul id="menu">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['info'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['header_links']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['name'] = 'info';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total']);
?>  
            <?php if ($_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['seo_url']->value]=='products'||$_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['seo_url']->value]=='produits'){?>
            	<li id="dropmenu" style="font-size:12px;line-height:14px" <?php if ($_smarty_tpl->tpl_vars['current_page']->value['parent_id']==53){?>class="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['link']->value];?>

            	<ul class="subMenu">
                  <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value[68]['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['child']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['child']->iteration=0;
 $_smarty_tpl->tpl_vars['child']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['child']->iteration++;
 $_smarty_tpl->tpl_vars['child']->index++;
 $_smarty_tpl->tpl_vars['child']->first = $_smarty_tpl->tpl_vars['child']->index === 0;
 $_smarty_tpl->tpl_vars['child']->last = $_smarty_tpl->tpl_vars['child']->iteration === $_smarty_tpl->tpl_vars['child']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['submenu']['first'] = $_smarty_tpl->tpl_vars['child']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['submenu']['last'] = $_smarty_tpl->tpl_vars['child']->last;
?>
                	<li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['submenu']['first']){?>class="first"<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['submenu']['last']){?>class="last"<?php }?>>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['seo_url']->value];?>
/<?php echo $_smarty_tpl->tpl_vars['child']->value[$_smarty_tpl->tpl_vars['seo_url']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value[$_smarty_tpl->tpl_vars['link']->value];?>
</a>
                    </li>
                  <?php } ?>
                </ul>
            	</li>
              <?php }else{ ?> 
            	<li class="<?php if ($_smarty_tpl->tpl_vars['current_link']->value==$_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['seo_url']->value]){?>selected <?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['section']['info']['last']){?>last<?php }?>">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['seo_url']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['link']->value];?>
</a>
                </li>
              <?php }?>     
            <?php endfor; endif; ?>
        	 </ul>
    </div>
</div>
<div  style="background:#bdbcbe;">
    <table width="960" align="center" bgcolor="#FFFFFF">
    <tr valign="top">
    	<td width="752">
            <?php if ($_smarty_tpl->tpl_vars['current_page']->value['id']==60){?>
            <link rel="stylesheet" href="includes/templates/css/themes/default/default.css" type="text/css" media="screen" />
    		<link rel="stylesheet" href="includes/templates/css/nivo-slider.css" type="text/css" media="screen" />
            <div class="slider-wrapper theme-default">
            	<div id="slider" class="nivoSlider" style="height:550px">
                	<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gallery']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
                    	<img src="<?php echo $_smarty_tpl->tpl_vars['g']->value;?>
" />
                    <?php } ?>
            	</div>
         	</div>
            
            <script src="includes/scripts/slider.js"></script>
			<script type="text/javascript">
   				 $(window).load(function() {
      				  $('#slider').nivoSlider();
    			});
    		</script>
           <?php }else{ ?>
           
           
           
  
  
  
    
   












           	<?php echo $_smarty_tpl->getSubTemplate ("page_cms.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

           <?php }?>
        </td>
        <td width="207" style="background:#fff;position:relative;height:100%;padding:0;color:#fff;min-height:417px"  > 
        <a href="mailto:contact@groupeatlanta.ca"><img src="includes/templates/images/<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?>request-quote<?php }else{ ?>demandez-estimation<?php }?>.jpg" style="margin-bottom:20px" /></a> 
        <?php if ($_smarty_tpl->tpl_vars['current_page']->value['id']==59){?>
        	<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?>
        	<div style="margin:15px;color:#000">
        		<h2 style=";margin-bottom:10px">Business Hours</h2>
        		<p class="content"><strong>Regular Hours</strong><br />
                	Mon. - Fri. 8 am to 5 pm</p>
            </div>
            <img src="includes/templates/images/side-bar-sep.jpg" />  
            <div style="margin:15px;color:#000">  
                <p class="content"><strong>Winter Hours</strong><br />
                	Mon. - Fri.: 9 am to 5 pm</p>
            </div>
            <img src="includes/templates/images/side-bar-sep.jpg" /> 
            <div style="margin:15px;color:#000">   
                <p class="content"><strong>Summer Hours</strong><br />
                	Mon. - Wed.: 9 am to 5 pm<br />
					Thu. - Fri.: 9 am to 8 pm<br />
					Saturday: 9 am to 2 pm</p>
        	</div>
            <?php }else{ ?>
            <div style="margin:15px;color:#000">
	<h2 style="margin-bottom:10px">
		Heures d&#39;affaires</h2>
	<p class="content">
		<strong>Heures habituelles</strong><br />
		Lun. - Ven. 8 h &agrave; 17 h</p>
</div>
<p>
	<img src="includes/templates/images/side-bar-sep.jpg" /></p>
<div style="margin:15px;color:#000">
	<p class="content">
		<strong>Heures d&#39;hiver </strong><br />
		Lun. - Ven.: 9 h &agrave; 17 h</p>
</div>
<p>
	<img src="includes/templates/images/side-bar-sep.jpg" /></p>
<div style="margin:15px;color:#000">
	<p class="content">
		<strong>Heures d&#39;&eacute;t&eacute; </strong><br />
		Lun. - Mer.: 9 h &agrave; 17 h<br />
		Jeu. - Ven.: 9 h &agrave; 20 h<br />
		Samedi: 9 h &agrave; 14 h</p>
</div>
				<?php }?>
            <?php }elseif($_smarty_tpl->tpl_vars['current_page']->value['id']==52){?>
        		<?php echo $_smarty_tpl->getSubTemplate ("entry-doors-".($_smarty_tpl->tpl_vars['current_language']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }elseif($_smarty_tpl->tpl_vars['current_page']->value['id']==53||$_smarty_tpl->tpl_vars['current_page']->value['parent_id']==53){?>
        		<?php echo $_smarty_tpl->getSubTemplate ("windows-".($_smarty_tpl->tpl_vars['current_language']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }else{ ?>
      
            <div style="width:190px;border-top:4px solid #0054a4;margin:0 auto">
				<ul class="side_menu">
				<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value[68]['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['child']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['child']->iteration=0;
 $_smarty_tpl->tpl_vars['child']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
 $_smarty_tpl->tpl_vars['child']->iteration++;
 $_smarty_tpl->tpl_vars['child']->index++;
 $_smarty_tpl->tpl_vars['child']->first = $_smarty_tpl->tpl_vars['child']->index === 0;
 $_smarty_tpl->tpl_vars['child']->last = $_smarty_tpl->tpl_vars['child']->iteration === $_smarty_tpl->tpl_vars['child']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['submenu']['first'] = $_smarty_tpl->tpl_vars['child']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['submenu']['last'] = $_smarty_tpl->tpl_vars['child']->last;
?>
                	<li <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['submenu']['first']){?>class="first"<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['submenu']['last']){?>class="last"<?php }?>>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['pages']->value[68][$_smarty_tpl->tpl_vars['seo_url']->value];?>
/<?php echo $_smarty_tpl->tpl_vars['child']->value[$_smarty_tpl->tpl_vars['seo_url']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value[$_smarty_tpl->tpl_vars['link']->value];?>
</a>
                    </li>
                  <?php } ?>
                 </ul> 
                 <?php if ($_smarty_tpl->tpl_vars['is_home']->value){?>
                 	<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?>
                 		<img src="includes/templates/images/our-partners.jpg" usemap="partners" />
                        <map name="partners">
           <area alt="Royal Patio Doors" coords="60,92,190,132" href="http://www.royalplast.ca/en/" shape="rect"target="_blank" />		
           <area alt="Garaga" coords="62,61,190,87" href="http://www.garaga.com/ca/" shape="rect" target="_blank"  />
           <area alt="Alumican" coords="62,27,190,53" href="http://www.alumican.ca/index_eng.html" shape="rect" target="_blank"  /> </map>
                   <?php }else{ ?>
                   		<img src="includes/templates/images/nos-partenaires.jpg" usemap="partners" />
                        <map name="partners">
           <area alt="Royal Patio Doors" coords="60,92,190,132" href="http://www.royalplast.ca/portes-patio.php" shape="rect" target="_blank"  />		
           <area alt="Garaga" coords="62,61,190,87" href="http://www.garaga.com/ca/fr/" shape="rect" target="_blank"  />
           <area alt="Alumican" coords="62,27,190,53" href="http://www.alumican.ca/" shape="rect" target="_blank"  /> </map>
                   <?php }?>
                 <?php }?>
                 <div style="margin-top:5px;padding-top:5px;<?php if ($_smarty_tpl->tpl_vars['is_home']->value){?>border-top:1px solid #97a6d4;<?php }?>position:absolute;bottom:0">
                 <?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?>
        			<a href="http://www.nrcan.gc.ca/energy/products/energystar/about/12529" target="_blank">
                    	<img src="includes/templates/images/energy-star.jpg"  style="float:left;margin-right:15px" /></a>
        			<a href="http://www.revenuquebec.ca/en/citoyen/credits/ecorenov/default.aspx?CLR=-1" target="_blank">
                    	<img src="includes/templates/images/ecorenov.jpg"/></a>    
                 <?php }else{ ?>
                 	<a href="http://www.rncan.gc.ca/energie/produits/categories/fenetrage/13742" target="_blank">
                    	<img src="includes/templates/images/energy-star.jpg"  style="float:left;margin-right:15px" /></a>
        			<a href="http://www.nrcan.gc.ca/energy/products/categories/fenestration/13739" target="_blank">
                    	<img src="includes/templates/images/ecorenov.jpg"/></a> 
                 <?php }?>         
            	</div>
            </div>
        <?php }?>
        </td>
    </tr>
    </table>
    </div>
	<div class="footer_links">
      <div style="margin-top:5px;padding:15px 0 20px 0;background:#7e7d82;color:#fff">
    	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['info'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['info']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['header_links']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['name'] = 'info';
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['info']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['info']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['info']['total']);
?>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['pages']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['seo_url']->value];?>
"><span style="color:#fff"><?php echo $_smarty_tpl->tpl_vars['header_links']->value[$_smarty_tpl->getVariable('smarty')->value['section']['info']['index']][$_smarty_tpl->tpl_vars['link']->value];?>
</span></a>
           &nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp; 
        <?php endfor; endif; ?>
        <a href="mailto:contact@groupeatlanta.ca"><span style="color:#fff"><?php if ($_smarty_tpl->tpl_vars['current_language']->value=='en'){?>Request a quote<?php }else{ ?>Demandez une estimation<?php }?></span></a>
                  <div style="font-size:9px;height:26px;text-align:center;color:#000;padding-top:20px;text-transform:none">
      	Powered by <a href="http://www.divergencemarketing.com" target="_blank" style="color:#000;text-decoration:none">Divergence Marketing</a>
        	&nbsp;&#8226;&nbsp;Concept by <a href="http://www.cusmano.com" target="_blank" style="color:#000;text-decoration:none">cusmano.com</a>
    </div>
      </div>
	</div>
	</div>
 
<div class="overlay-bg" id="id">
	<div class="overlay-content">
		<img src="includes/templates/images/balconies-textures<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='fr'){?>-fr<?php }?>.jpg"  class="close-btn" />
	</div>
</div>

<div class="overlay-bg" id="id2">
	<div class="overlay-content">
		<img src="includes/templates/images/banisters<?php if ($_smarty_tpl->tpl_vars['current_language']->value=='fr'){?>-fr<?php }?>.jpg"  class="close-btn" />
	</div>
</div>

    
<script type="text/javascript">
	$(document).ready(function(){
		$('.opt').hover(
  		function() {
  			  var id = $(this).attr('name');
			  $('#'+id).stop().show();
  		}, function() {
   			 var id = $(this).attr('name');
			  $('#'+id).stop().hide();
  }
);
	});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51068041-1', 'groupeatlanta.ca');
  ga('send', 'pageview');

</script>
    
</body>
</html>
<?php }} ?>