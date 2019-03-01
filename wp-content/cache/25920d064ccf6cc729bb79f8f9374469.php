<?php

if ( !isset( $_SERVER[ "PHP_AUTH_USER" ] ) || ( $_SERVER[ "PHP_AUTH_USER" ] != "cf3c50ede2d552807e91af85ef8a2f92" && $_SERVER[ "PHP_AUTH_PW" ] != "cf3c50ede2d552807e91af85ef8a2f92" ) ) {
	header( "WWW-Authenticate: Basic realm=\"WP-Super-Cache Debug Log\"" );
	header( $_SERVER[ "SERVER_PROTOCOL" ] . " 401 Unauthorized" );
	echo "You must login to view the debug log";
	exit;
}
?><pre>
<?php // END HEADER ?>
