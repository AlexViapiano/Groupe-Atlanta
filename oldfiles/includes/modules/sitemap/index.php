<?php

define('MODULE', 'sitemap');
$extra['sitemap'] = fetch_sitemap();

function generate_links($sitemap, &$xml, $lang='en')
{
   global $Process;
   for ($j=0; $j<count($sitemap); $j++)
     {
        $xml .=  '<url><loc>'.$Process->options['website_link'].ADD_DIR.'/'.fetch_url_link($sitemap[$j]['id'], $lang).'</loc></url>'."\n";
		if (count($sitemap[$j]['children']))
			 generate_links($sitemap[$j]['children'], $xml, $lang);
	 }
   return $xml;
}

if ($_GET['do'] == 'generate')
    {
		$sitemap = $extra['sitemap'];
		for ($i=0; $i<count($languages); $i++)
		{
		  if ($languages[$i]['status'] )
			 generate_links($sitemap, $xml, $languages[$i]['id']);
		}
		$xml = '<?xml version="1.0" encoding="UTF-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\n".$xml."\n".'</urlset>';						
		$sitemap_file = "sitemap.xml";
		$fh = fopen($sitemap_file, 'w') or die("can't open file");
		fwrite($fh, $xml);
		fclose($fh);
	}
else
	redirect(_ROOT_URL);

redirect(_ROOT_URL);    
?>