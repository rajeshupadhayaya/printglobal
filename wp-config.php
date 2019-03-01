<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('DB_NAME', 'prinolvd_printglobal');
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\wp-content\plugins\wp-super-cache/' );
define('DB_NAME', 'printglobal');

/** MySQL database username */
// define('DB_USER', 'prinolvd_printGlobal');
define('DB_USER', 'root');

/** MySQL database password */
// define('DB_PASSWORD', 'Pr|nt@g|oba|981');
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>gh?2%,x<Q]H1#JU`!(1KWs#X2U:5zM6<h6M&gC}D.(Yz1d,qZ/Rpz{cLzun/w1u');
define('SECURE_AUTH_KEY',  'qVwx9&TT}p;e+tm]v&ehROc+7*Rd[M>aL?Zmsdl!~[R1WscD#gAoh2&G5> |1bdE');
define('LOGGED_IN_KEY',    '/ ]:]x{}$U xtV}8|>>?26I#NUw|yo;MQt`-v})f=JuXleh6*<-gdkrlTV6ks@B4');
define('NONCE_KEY',        's)W.%5=a5g]^YGY}@>D@xJpkPaX`E~g7Jy4Da~=L7XjZ&|:DMMlQm 1$<WzSSN~l');
define('AUTH_SALT',        'jDC|/g#BKmw+[4RZTbDSf<4B/7CoXWzo1bf}kVEW08)C8fQ$88EKj_g[(kn<hec4');
define('SECURE_AUTH_SALT', '=8Z??9[aId9?9(VZhdJaoo%gqo;=z09VrdzCOuC;=QvRR>M0oJ@ix%|@)kOz*Kf~');
define('LOGGED_IN_SALT',   'mOR`H;1,LTG0*yfmW/|0k Pt*8=OU&:aL$%YVE`I/z)G?4[^&^4?>|GB V79nPvc');
define('NONCE_SALT',       'E}u~@Q_*?..{XtNW][5bf?.!6&B*+CBz`Hk]jwJ&&/sD]^zMe/G1d0?GhMEZ<!})');


define( 'SMTP_HOST', 'smtp.sendgrid.net' );  // A2 Hosting server name. For example, "a2ss10.a2hosting.com"
define( 'SMTP_AUTH', true );
define( 'SMTP_PORT', '587' );
define( 'SMTP_SECURE', 'ssl' );
define( 'SMTP_USERNAME', 'info@createonlineexam.com' );  // Username for SMTP authentication
define( 'SMTP_PASSWORD', 'Mailme@1990' );          // Password for SMTP authentication
define( 'SMTP_FROM',     'info@printglobal.com' );  // SMTP From address
define( 'SMTP_FROMNAME', 'Order' );  

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
