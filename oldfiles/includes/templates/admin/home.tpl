
  {if $popup_msg}
	<div align="center" id="mydiv" style="text-align:center; position: absolute; float:inherit; width:100%;">
    <br><br><br><br><br><br><br><br><br><br><br>
<table class="tborder" cellpadding="0" cellspacing="0" border="0" width="300" align="center"><tr><td>
 
		<!-- header -->
		<div class="tcat" style="padding:4px; text-align:center"><b>Notifcation Window</b></div>
		<!-- /header -->
 
		<!-- logo and version -->
		<table cellpadding="4" cellspacing="0" border="0" width="100%" class="navbody">
		<tr valign="bottom">
			<td align="center"><br>{$msg}<br><br>
</td>
		</tr>
		<tr>
			<td align="center" class="logincontrols">
				<input type="button" class="button" value="Close" onClick="document.getElementById('mydiv').style.display = 'none';" />			
            </td>
		</tr>
	</table>
		<!-- /logo and version --></td></tr></table>
</div>
  {/if}
  {if $faq}
    <h3>FAQ</h3>
    {section name=info loop=$faq_questions}
      <a href="{$scriptpath}#{$smarty.section.info.index}" title="{$faq_questions[info]}">{$faq_questions[info]}</a><br />
    {/section}<br />
<br />
    {section name=info loop=$faq_answers}
     {$faq_answers[info]}<br /><hr /><br />
    {/section}
  {/if}
  {$page}