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
define('DB_PASSWORD', 'usbw');

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
define('AUTH_KEY',         'Rc2h:`{gfHLenK;l?8W<{d[LJx:F|M/x{_XXYw+&g@j =b7wqbE#MVxx]6eLPLDa');
define('SECURE_AUTH_KEY',  'FtxHnbiLc)J53<J_1!CBNEhw (9=rA?4_B,2e&CgT@1$TQrMUenD+!DqM78/7U27');
define('LOGGED_IN_KEY',    '?z>{-.|3+VU%Z`}2.QU+`ZnF,H}V/#Cyr|!kqf<{:p)=).0<S*_.!ZUGn|qoXxW4');
define('NONCE_KEY',        'y,@10?o,Y?&rX#)gkitjW4iVh%x!x/FsSV lve5=m4LIF/8{<!^`.r)$:nvrpZob');
define('AUTH_SALT',        'bUxC3;5Yd=y<wtb|%Y-f*<S?5) 7@qMa`_xO;e/,# Pm0Rl_eLb;+geio&AwjxYK');
define('SECURE_AUTH_SALT', '1IF;#Y07Zy*Y2Y)^WM5_FD7!LtG+^S^68e `j|Qwj-L#-:juuzZwXZ`7|}vT,x:3');
define('LOGGED_IN_SALT',   '-~NLqn0 .u],>K.M?KyPq3TIt(I0Qwl+IbUtXc2!hfPiu)E6CD5]U^:ZETlmkWNb');
define('NONCE_SALT',       '&D5b{DAr<f8Y[YBal4M,[rjDJ</q6CM`gy$b#uT65,-D!S#Ox~43F3x_VM;c[[-H');

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
