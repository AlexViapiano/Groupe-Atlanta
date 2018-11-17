<?php

define('ADD_DIR', '');
$config['website_link'] = 'www.groupeatlanta.ca';	

$config['Database']['dbname'] = 'groupeatlanta';
$config['MasterServer']['servername'] = 'groupeatlanta.db.8502785.hostedresource.com';
$config['MasterServer']['username'] = 'groupeatlanta';
$config['MasterServer']['password'] = 'Lmhost99!';

$config['encoding'] = 'UTF-8';
$config['Database']['technicalemail'] = 'dbmaster@example.com';

$config['misc']['enable_mobile'] = false;

$config['Database']['dbtype'] = 'mysql';
$config['Database']['tableprefix'] = '';
$config['Database']['force_sql_mode'] = false;
$config['MasterServer']['port'] = 3306;
$config['MasterServer']['usepconnect'] = 0;
$config['SlaveServer']['servername'] = '';
$config['SlaveServer']['port'] = 3306;
$config['SlaveServer']['username'] = '';
$config['SlaveServer']['password'] = '';
$config['SlaveServer']['usepconnect'] = 0;
$config['Misc']['cookieprefix'] = $config['Database']['dbname'].'_';
$config['Misc']['forumpath'] = '';
$config['Misc']['template'] = 'includes/templates';
$config['Misc']['email_template_path'] = $config['Misc']['template'].'/email';
$config['Misc']['email_template'] = $config['Misc']['email_template_path'].'/email_template.tpl';
$config['SpecialUsers']['canviewadminlog'] = '1';
$config['SpecialUsers']['canpruneadminlog'] = '1';
$config['SpecialUsers']['canrunqueries'] = '';
$config['SpecialUsers']['undeletableusers'] = '';
$config['SpecialUsers']['superadministrators'] = '1';
$config['Mysqli']['ini_file'] = '';
$config['Misc']['maxwidth'] = 2592;
$config['Misc']['maxheight'] = 1944;
