<!DOCTYPE html>
<!--[if IE 8 ]> <html lang="{$current_language}" class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="{$current_language}" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{$current_language}"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset={$encoding}" />
<meta http-equiv="Content-Language" content="{$current_language}">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<title>Admin Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset={$options.encoding}" />
<link href="../includes/templates/css/controlpanel.css" rel="stylesheet" type="text/css">
<base href="https://www.cliniquedentaireileperrot.ca/" />
{include file="scripts.tpl"}
</head>
{if $is_admin}
	{include file="admin/admin_tools.tpl"}
	<p id="time" class="time"></p>
{/if}
<body >
	{include file="admin/$file.tpl"}
</body>
</html>
