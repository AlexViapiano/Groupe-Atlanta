		<h2>
					New Patient Forms</h2>
                    {if $completed}
                    <p style="color:#F00">
                       {$completed}
                    </p>
                    {/if}
				<p>Welcome to the Clinique Dentaire Ile  Perrot&nbsp;<em>secure</em><strong>&nbsp;&ldquo;New Patient Forms&quot; section.</strong>  For new patients, this is an excellent online  resource that allows you, from the comfort of your home or work, to complete  all the necessary forms&nbsp;<em>before</em>&nbsp;your appointment. When you  arrive at the clinic for your scheduled appointment, we will have you sign and  date them. This allows us to serve you faster and more efficiently.</p>
<strong>In this step-by-step process you will be asked to fill out 3 forms:</strong>
                <ul class="list2 txt2">
                {foreach from=$forms key=k item=v}
			<li {if $k == $smarty.get.fill}class="active"{/if}>
				{$v}</li>
          {/foreach}
                
                </ul><br />
				<p>Once each form is filled,  please press the&nbsp;<u>Submit Button</u> at the bottom of the page,  your information will be automatically sent to us, and you will automatically  be directed  to next  form.</p>
				<table><tr valign="middle"><td><strong><br />
			    To begin, press &nbsp;</strong></td><td> <a href="new-patient-forms?fill=confidential-information"><img src="includes/modules/forms/templates/starthere.png" align="absmiddle" alt="" width="103" height="47"  title="Click to start"/></a></td></tr></table>
             
<br />
<p>Thank you.&nbsp;</p>
