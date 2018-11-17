
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; " />
<title>{$pagetitle}</title>
<base href="http://www.groupeatlanta.ca/" />
<meta name="author" content="Divergence Marketing client@divergencemarketing.com">
<meta name="Description" content="{$description}" />
<link rel="stylesheet" type="text/css" href="includes/templates/css/style.css" />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <script type="text/javascript" src="includes/scripts/custom.js"></script>
	<link href='includes/templates/css/overlaypopup.css' rel='stylesheet' type='text/css'>
</head>
{if $is_admin}
	{include file="admin/admin_tools.tpl"}
{/if}
<body>

<div class="page_container">
{if $admin_panel}
	{include file="admin/panel_format.tpl" content=$admin_panel}
{/if}
	<div style="margin:0px 0px 12px 15px;position:relative;height:65px">       
            <div style="font-size:12px;position:absolute;top:5px;right:0;padding:5px 0px ;text-transform:uppercase;text-align:right;">
             <div style="margin-bottom:10px">
            	<a href="mailto:contact@groupeatlanta.ca" style=";text-decoration:none"><span style="color:#666666;font-weight:bold;text-transform:none;font-size:14px">contact@groupeatlanta.ca</span></a> 
                <span style="color:#8c0043;font-weight:bold">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span> <span style="color:#0054a4;font-size:14px;font-weight:bold">514-326-7888</span>
            </div>
           
        	   	{if $current_language == 'en'}<a href="{$link_fr}?lang=fr" style="color:#627dbc;text-decoration:none;font-size:14px;font-weight:bold">FRAN&Ccedil;AIS</a>
                {else}<a href="{$link_en}?lang=en" style="color:#627dbc;text-decoration:none;font-size:14px;font-weight:bold">ENGLISH</a>{/if}
                <p style="margin-top:15px"><span style="font-size:10px"> Membre de L'APCHQ &#8226; LIC. RBQ: 1750-6148-39</span></p>
            </div>
        <div style="margin-top:5px;margin-left:0px;position:relative;overflow:hidden;width:600px">
	            <a href="{$home_link}"><img src="includes/templates/images/group-atlanta-logo.jpg" style="float:left;margin-right:15px;" /></a>
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
            {section  loop=$header_links name=info}  
            {if $header_links[info].$seo_url eq 'products' || $header_links[info].$seo_url eq 'produits'}
            	<li id="dropmenu" style="font-size:12px;line-height:14px" {if $current_page.parent_id eq 53}class="selected"{/if}>{$header_links[info].$link}
            	<ul class="subMenu">
                  {foreach $pages[68].child as $child name=submenu}
                	<li {if $smarty.foreach.submenu.first}class="first"{elseif $smarty.foreach.submenu.last}class="last"{/if}>
                    	<a href="{$header_links[info].$seo_url}/{$child.$seo_url}">{$child.$link}</a>
                    </li>
                  {/foreach}
                </ul>
            	</li>
              {else} 
            	<li class="{if $current_link eq $header_links[info].$seo_url}selected {/if}{if $smarty.section.info.last}last{/if}">
                	<a href="{$header_links[info].$seo_url}">{$header_links[info].$link}</a>
                </li>
              {/if}     
            {/section}
        	 </ul>
    </div>
</div>
<div  style="background:#bdbcbe;">
    <table width="960" align="center" bgcolor="#FFFFFF">
    <tr valign="top">
    	<td width="752">
            {if $current_page.id eq 60}
            <link rel="stylesheet" href="includes/templates/css/themes/default/default.css" type="text/css" media="screen" />
    		<link rel="stylesheet" href="includes/templates/css/nivo-slider.css" type="text/css" media="screen" />
            <div class="slider-wrapper theme-default">
            	<div id="slider" class="nivoSlider" style="height:550px">
                	{foreach from=$gallery item=g}
                    	<img src="{$g}" />
                    {/foreach}
            	</div>
         	</div>
            {literal}
            <script src="includes/scripts/slider.js"></script>
			<script type="text/javascript">
   				 $(window).load(function() {
      				  $('#slider').nivoSlider();
    			});
    		</script>{/literal}
           {else}
           
           
           
  
  
  
    
   












           	{include file="page_cms.tpl"}
           {/if}
        </td>
        <td width="207" style="background:#fff;position:relative;height:100%;padding:0;color:#fff;min-height:417px"  > 
        <a href="mailto:contact@groupeatlanta.ca"><img src="includes/templates/images/{if $current_language eq 'en'}request-quote{else}demandez-estimation{/if}.jpg" style="margin-bottom:20px" /></a> 
        {if $current_page.id eq 59}
        	{if $current_language eq 'en'}
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
            {else}
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
				{/if}
            {elseif $current_page.id eq 52}
        		{include file="entry-doors-{$current_language}.tpl"}
            {elseif $current_page.id eq 53 || $current_page.parent_id eq 53}
        		{include file="windows-{$current_language}.tpl"}
            {else}
      
            <div style="width:190px;border-top:4px solid #0054a4;margin:0 auto">
				<ul class="side_menu">
				{foreach $pages[68].child as $child name=submenu}
                	<li {if $smarty.foreach.submenu.first}class="first"{elseif $smarty.foreach.submenu.last}class="last"{/if}>
                    	<a href="{$pages[68].$seo_url}/{$child.$seo_url}">{$child.$link}</a>
                    </li>
                  {/foreach}
                 </ul> 
                 {if $is_home}
                 	{if $current_language eq 'en'}
                 		<img src="includes/templates/images/our-partners.jpg" usemap="partners" />
                        <map name="partners">
           <area alt="Royal Patio Doors" coords="60,92,190,132" href="http://www.royalplast.ca/en/" shape="rect"target="_blank" />		
           <area alt="Garaga" coords="62,61,190,87" href="http://www.garaga.com/ca/" shape="rect" target="_blank"  />
           <area alt="Alumican" coords="62,27,190,53" href="http://www.alumican.ca/index_eng.html" shape="rect" target="_blank"  /> </map>
                   {else}
                   		<img src="includes/templates/images/nos-partenaires.jpg" usemap="partners" />
                        <map name="partners">
           <area alt="Royal Patio Doors" coords="60,92,190,132" href="http://www.royalplast.ca/portes-patio.php" shape="rect" target="_blank"  />		
           <area alt="Garaga" coords="62,61,190,87" href="http://www.garaga.com/ca/fr/" shape="rect" target="_blank"  />
           <area alt="Alumican" coords="62,27,190,53" href="http://www.alumican.ca/" shape="rect" target="_blank"  /> </map>
                   {/if}
                 {/if}
                 <div style="margin-top:5px;padding-top:5px;{if $is_home}border-top:1px solid #97a6d4;{/if}position:absolute;bottom:0">
                 {if $current_language eq 'en'}
        			<a href="http://www.nrcan.gc.ca/energy/products/energystar/about/12529" target="_blank">
                    	<img src="includes/templates/images/energy-star.jpg"  style="float:left;margin-right:15px" /></a>
        			<a href="http://www.revenuquebec.ca/en/citoyen/credits/ecorenov/default.aspx?CLR=-1" target="_blank">
                    	<img src="includes/templates/images/ecorenov.jpg"/></a>    
                 {else}
                 	<a href="http://www.rncan.gc.ca/energie/produits/categories/fenetrage/13742" target="_blank">
                    	<img src="includes/templates/images/energy-star.jpg"  style="float:left;margin-right:15px" /></a>
        			<a href="http://www.nrcan.gc.ca/energy/products/categories/fenestration/13739" target="_blank">
                    	<img src="includes/templates/images/ecorenov.jpg"/></a> 
                 {/if}         
            	</div>
            </div>
        {/if}
        </td>
    </tr>
    </table>
    </div>
	<div class="footer_links">
      <div style="margin-top:5px;padding:15px 0 20px 0;background:#7e7d82;color:#fff">
    	{section  loop=$header_links name=info}
        	<a href="{$pages[info].$seo_url}"><span style="color:#fff">{$header_links[info].$link}</span></a>
           &nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp; 
        {/section}
        <a href="mailto:contact@groupeatlanta.ca"><span style="color:#fff">{if $current_language eq 'en'}Request a quote{else}Demandez une estimation{/if}</span></a>
                  <div style="font-size:9px;height:26px;text-align:center;color:#000;padding-top:20px;text-transform:none">
      	Powered by <a href="http://www.divergencemarketing.com" target="_blank" style="color:#000;text-decoration:none">Divergence Marketing</a>
        	&nbsp;&#8226;&nbsp;Concept by <a href="http://www.cusmano.com" target="_blank" style="color:#000;text-decoration:none">cusmano.com</a>
    </div>
      </div>
	</div>
	</div>
 
<div class="overlay-bg" id="id">
	<div class="overlay-content">
		<img src="includes/templates/images/balconies-textures{if $current_language eq 'fr'}-fr{/if}.jpg"  class="close-btn" />
	</div>
</div>

<div class="overlay-bg" id="id2">
	<div class="overlay-content">
		<img src="includes/templates/images/banisters{if $current_language eq 'fr'}-fr{/if}.jpg"  class="close-btn" />
	</div>
</div>

    {literal}
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
{/literal}    
</body>
</html>
