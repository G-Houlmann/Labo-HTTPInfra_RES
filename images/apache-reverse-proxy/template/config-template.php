<?php
    $dynamicApp = getEnv('DYNAMIC_APP');
    $staticApp = getEnv('STATIC_APP');
?>

<VirtualHost *:80>
	ServerName demo.res.ch
	
	ProxyPass '/api/students/' 'http://<?php print "$dynamicApp"?>/'
	ProxyPassReverse '/api/students/' 'http://<?php print "$dynamicApp"?>/'
	
	ProxyPass '/' 'http://<?php print "$staticApp"?>/'
	ProxyPassReverse '/' 'http://<?php print "$staticApp"?>/'
</VirtualHost>

