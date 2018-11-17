<meta http-equiv="Content-Type" content="text/html; charset={$encoding}" />
<meta http-equiv="Content-Language" content="{$current_language}">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
{if $canonical}
	<link rel="canonical" href="{$_BASE_URL}" />
{/if}
<title>{$pagetitle}</title>
<meta name="author" content="Divergence Marketing client@divergencemarketing.com">
<meta name="Keywords" content="{$keywords}" />
<meta name="Description" content="{$description}" />
<base href="http://www.cliniquedentaireileperrot.ca/" />
<link  href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" href="includes/templates/css/style.css?v={$TIMENOW}" media="all" type="text/css" />

{if $add_css}
  {section loop=$add_css name=info}
	<link rel="stylesheet" href="includes/templates/css/{$add_css[info]}.css" {if $is_mobile}media="handheld, screen" {else} media="all" {/if} type="text/css" />  
  {/section}
{/if}
