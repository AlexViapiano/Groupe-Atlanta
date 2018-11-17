<script type="text/javascript" src="includes/templates/css/maxheight.js"></script>
<script type="text/javascript" src="includes/templates/css/cufon-yui.js"></script>

<div class="container_24 container">
<div class="grid_7">
<br />
{if $current_language == 'en'}
<p>Our dental practice offers a broad range  of treatment options. We strongly believe in clearly informing our patients  about the treatments we recommend. The information in this section provides  valuable information that can serve as the starting point for understanding  these options. Dental care should be <em>personalised  and based on individual needs</em>; we recommend that you contact us if you have  any questions or want to know more. We will be happy to answer all your  questions.</p>
{else}
<p>Notre pratique dentaire offre toute une gamme de traitements. Nous croyons fermement en l'importance d'informer clairement nos patients des traitements que nous recommandons. Cette section comporte des renseignements qui peuvent servir de point de départ pour comprendre ces options. Les soins dentaires doivent être  <em>personnalisés selon les besoins individuels</em>; nous vous suggérons de communiquer avec nous si vous souhaitez en apprendre davantage. Nous nous ferons un plaisir de répondre à toutes vos questions.</p>
{/if}
<ul class="tabs">
  {section loop=$treatment_options name=info}
  <li {if $first_active && $smarty.section.info.first} class="active" {/if} {if $treatment_options[info].$seo_url == $is_selected} class="active"{/if}>
  		<a href="{$parent_path}/{$treatment_options[info].$seo_url}">{$treatment_options[info].$link}</a>
  </li>
{/section}
</ul>
</div>
<div class="grid_17">
<div class="tab_container">
{include file="admin/content_editor.tpl" content=$view_page id=$current_page.id type=page }
{literal}
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="padding-left:19px">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_pinterest_share"></a>
<a class="addthis_button_google_plusone_share"></a>
<a class="addthis_button_email"></a>
<a class="addthis_button_print"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-503e28e9199168ba"></script>
<!-- AddThis Button END -->
{/literal}
</div>
</div>
</div>