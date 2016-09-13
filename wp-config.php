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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
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
define('AUTH_KEY',         'vcFr;%i{<QGxYu[XgR1=ZwtYr!K17|D)GglaGU#=C5@X)a `C@pIg=Ry0@SD|/?Q');
define('SECURE_AUTH_KEY',  'zAX58k<!ZK@`6hAnFHd]JxL%;o?G.m E!&sDhV[XvFw<^V3(okZ]=^6xH=mFC`}`');
define('LOGGED_IN_KEY',    'gmYQz,0YNba8I*08Sq+@pH{y7& SC?gBlsc5$S& l00lMj.4VR09d RCka3Owm?w');
define('NONCE_KEY',        'MQG/P*FIqUz[BH;O&>YIZY2{!lTB2S^uCm/a3Ipt3emoScLe;*i}*udtEDcM[&yR');
define('AUTH_SALT',        '<bMyg^H)f9YNtU~S<{A}x81`U5.8e4NTY=V$8I;oA?O7$TUc<iNtht|>TQ@fj+`O');
define('SECURE_AUTH_SALT', 'X+6ss}_t*JXV+Z0?e4y ?o,r-?(Kefr( D8`t{t7T;#5b.YO&a?lw$YLBWTZ6$GL');
define('LOGGED_IN_SALT',   'H%d)Ff$)L4dI[!_s&!x3f+KARV^5vB?Crw);HMlQoe+EQ02zgxC%.){oS4!h`./.');
define('NONCE_SALT',       'EPqo,ir12[W*M==no>YfNi5AH.!8@TA:Qe[dyE+}n2mKkoj7,I}HT?!f>%WE;J%$');

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
