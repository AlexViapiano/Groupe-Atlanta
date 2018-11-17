
{literal}
<style type="text/css">
table td { 

	color:#000;
	font-weight:bold
}
input
{
	height:16px;
}
.form_error
{
	color:#F00
}
</style>
{/literal}
<form action="{$scriptpath}" method="post">
<input type="hidden" name="do" value="submitted">
{$content}
<input type="submit" value="&nbsp;&nbsp;Submit & Continue&nbsp; to next form&nbsp; " style="height:20px" />
</form>