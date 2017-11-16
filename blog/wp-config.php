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
define('DB_NAME', 'expresse_wp_blog');

/** MySQL database username */
define('DB_USER', 'expresse_wp_blog');

/** MySQL database password */
define('DB_PASSWORD', 'exp@1234');

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
define('AUTH_KEY',         '>I^2. uWPDwt`DdV0#Nz0T}lyEoi?5CvF6noMJFKU~{BO.7*iVM,LF!7i:uHv|5(');
define('SECURE_AUTH_KEY',  'z%Log`bdh%8E~;@sj@l#<rP?[Rh(D D?pYW}mVx|kJW^X`i$un<ZO,&7NBn._TC=');
define('LOGGED_IN_KEY',    'L4A<RO`)!NdXl/VC;J5RWHqe#|[pJ`uP`E,m7>`6iwY11e#I2H!!~<FYTHi6}!Bu');
define('NONCE_KEY',        '5dUMsolEW#i%EuDD%3QQP =]Bx[#=J>rA4XAf$#tYqVQz)]lQY[#0++[Z!dre7pE');
define('AUTH_SALT',        '[Zm0Z=LN2-#9+Sk7g|9bZM<qmdFuYnWBu$WJ$P6I=3CHA,rt%q{O!^$?-?4+;0eB');
define('SECURE_AUTH_SALT', 'cI5H6D/CGj@nn<>doMq/~>ar]4[j&aRdXXkrGb]G?Q,MWL)@g@-fiiQh7~-(~WFG');
define('LOGGED_IN_SALT',   'lYw+u6T8Ef2kvDN7{hO60]Bl&%7e:Z9rv5z-t%`)C,_aHJr@WU9dcr-W;G,1`9h_');
define('NONCE_SALT',       '/>$JRV}dk;[F-TJbNIZLmLQmqN>?k`1b3@g.3j8f .]%@b_p]5$Fhl2LGyf~ZTr/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_expresse_';

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
