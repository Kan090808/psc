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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'kan');

/** MySQL database password */
define('DB_PASSWORD', '151102');

/** MySQL hostname */
define('DB_HOST', 'localhost/wordpress-4.9.6');

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
define('AUTH_KEY',         '8f,0p}f% S:Z!pC6T=}ZV#0W68J&RYFRGj><jebMiSoQ/<#pMbLw?sO%E/sbEKA#');
define('SECURE_AUTH_KEY',  '-fBqYB<zrG7>]4 m?~H&Lwm>}v.ZSa0X<_WQ2{k@$=893Uabg~Cs]C|o-bQ!,vm[');
define('LOGGED_IN_KEY',    'eh2v$5`.YJ:?t]=x:u>L-zr6|.hV++BAF.ybJgT&eL1RkE%Hf)X0)u:7CWp(|j+-');
define('NONCE_KEY',        '>_cl-z9X/6u%Z s4*H&rZ*9oJS~)yP2sJR&Dd:i mys}xLOJWJ{b/|dcMfm9&*o3');
define('AUTH_SALT',        '_Y,RBXi;Q|.Xa+`POcs=RE5|Y%%AadRA[Gxm.; KWvUcpZVTSR<~t(Av1P9K)~00');
define('SECURE_AUTH_SALT', '9<o(Mz7`=IG5#@K{Ke5,o5?,gGne:lMU{jk(oOW^2L!;I2Ds/I@peOjmL!Bg=Yx0');
define('LOGGED_IN_SALT',   'XBDW:Grzs224_K[r;7m1 >^uGV#-sVSsibNBq@. >!Ke48[Nt7.X}t 1pSIfJf!%');
define('NONCE_SALT',       'LsW!i7% {AmIX@a0^Q5EN# Cks$kyLMJk%*IkXkh*7#{45))qAt=W/!z@?=S:U2V');

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
