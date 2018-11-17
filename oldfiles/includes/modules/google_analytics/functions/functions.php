<?php

function generate_google_tracking_script()
{
  global $extra; 
  $settings = fetch_settings('google_analytics');
  if ($settings['enable'])
  	 $extra['google_analytics'] = '
	        <!-- Google analytics start script -->
			<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try{
				var pageTracker = _gat._getTracker("'.$settings['id'].'");
				pageTracker._trackPageview();
			} catch(err) {}
			</script>
	        <!-- Google analytics end script -->				';
}

?>