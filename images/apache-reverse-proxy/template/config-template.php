<?php
	$dynamicApp1 = getEnv('DYNAMIC_APP_1');
	$dynamicApp2 = getEnv('DYNAMIC_APP_2');
	$staticApp1 = getEnv('STATIC_APP_1');
	$staticApp2 = getEnv('STATIC_APP_2');
?>

<VirtualHost *:80>
	ServerName demo.res.ch

	<Proxy "balancer://dynamicServers">
		BalancerMember 'http://<?php print "$dynamicApp1"; ?>'
		BalancerMember 'http://<?php print "$dynamicApp2"; ?>'
	</Proxy>

	<Proxy "balancer://staticServers">
		BalancerMember 'http://<?php print "$staticApp1"; ?>'
		BalancerMember 'http://<?php print "$staticApp2"; ?>'
	</Proxy>
	
	
	ProxyPass '/api/students/' 'balancer://dynamicServers/'
	ProxyPassReverse '/api/students/' 'balancer://dynamicServers/'
	
	ProxyPass '/' 'balancer://staticServers/'
	ProxyPassReverse '/' 'balancer://staticServers/'
</VirtualHost>

