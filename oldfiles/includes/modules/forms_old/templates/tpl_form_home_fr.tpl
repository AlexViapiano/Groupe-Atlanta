		<h2>
					Formulaires nouveau patient</h2>
                    {if $completed}
<p style="color:#F00">
                       {$completed}
                    </p>
                    {/if}
				<p>Bienvenue à la&nbsp;section de&nbsp;<strong>«&nbsp;Formulaires  Nouveau Patient&nbsp;»</strong>&nbsp;<em>sécurisés</em>. Pour les  nouveaux patients, c'est une&nbsp;excellente ressource en ligne qui vous  permet, dans le confort de&nbsp;votre maison&nbsp;ou au travail, de remplir  tous les formulaires&nbsp;<em>avant </em>votre rendez-vous. Lorsque vous&nbsp;arrivez à&nbsp;la clinique  pour&nbsp;le rendez-vous, &nbsp;nous allons&nbsp;vous faire signer&nbsp;et les  dater. &nbsp;Cela nous permet de&nbsp;vous servir plus rapidement&nbsp;et plus  efficacement.</p>
<strong>Dans ce processus, étape par étape on va vous demander de compléter ces 3 formulaires:</strong>
                <ul class="list2 txt2">
                {foreach from=$forms key=k item=v}
			<li {if $k == $smarty.get.fill}class="active"{/if}>
				{$v}</li>
          {/foreach}
                
</ul><br />
				<p>Une fois que chaque formulaire est rempli, ne pas oublier d'appuyer sur le bouton Soumettre au bas de la page, vos informations seront automatiquement envoyées à nous, et et vous serez automatiquement dirigé vers la forme suivante.</p>
				<table><tr valign="middle"><td><strong><br />
			    Pour commencer  &nbsp;</strong></td><td> <a href="formulaires-en-ligne?fill=confidential-information"><img src="includes/modules/forms/templates/cliquezici.png" align="absmiddle" alt="" width="103" height="47"  title="Cliquez ici pour commencer"/></a></td></tr></table>
             
<br />
<p>Merci.&nbsp;</p>
