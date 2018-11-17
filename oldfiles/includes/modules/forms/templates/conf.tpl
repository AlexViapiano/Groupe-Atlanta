<h2>Confidental Information</h2>
<small>* Fields are mandetory</small>
<h3>Information</h3>
<form method="post" action="{$scriptpath}">
<table>
{section loop=13 name=i start=1}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>Other Information</h3>
<table>
{section loop=18 name=i start=13}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>Spouse Information</h3>
<table>
{section loop=24 name=i start=18}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>Person to contact in case of emergency</h3>
<table>
{section loop=28 name=i start=24}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<h3>Our Survey</h3>
<table>
{section loop=30 name=i start=28}
<tr><td  class="contact">{$info[i]}</td><td  class="contact">{$input[i]}</td></tr>
{/section}
</table>
<input type="hidden" name="do" value="confidential-information" />
<input type="submit" value="sub">
</form>