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
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'F*8YST:ZM#V6!4v8FtW.E:C%?tr ,Qdu0Oyf9r)xpZ}t<F98}1zKruy9I%}B(ZDO');
define('SECURE_AUTH_KEY',  '4mEc}P.y#}Qzs!#=5P|: @rPvnz^!A5.a0Q=-(mCCPX%4f`,25NG4wm`91JixnFU');
define('LOGGED_IN_KEY',    'qyafTZo[]ER#~`JtaWpK4!Ic3qf5otRAUoo(M@X!*$f*N:~##C,IJ&AN^NDr0`7q');
define('NONCE_KEY',        '~w|^aPkUM@2+G;tXEi[]QSKt(e/(S$|*1L7uBj+ fh7nt_>*X)lVD>(Sau|byp<J');
define('AUTH_SALT',        ']heiqHuvX_qk<RS}dAzBS>6kD(sz3mRQ-osc]PYd2(5<t4c85kFPZ}E7Ir!UqK+#');
define('SECURE_AUTH_SALT', '-hyW)ZGE|?ye$pl/gP2:MNX}}&/A+^PxzoMeLw/51 yFxEiw| 0}Vn6=Wm^9eOlu');
define('LOGGED_IN_SALT',   '>LhXL%N$N>V+U%oeQ*Gu^[oxcdk80&t%F_53{/j-?I {0$ FoCuaW#}^1o*<EmlN');
define('NONCE_SALT',       'by,oL_Q`ePYS5y/(SX<[1$R0>8(6-}bX!)$d}IdC*,`w8QUw??;JR>[ozzs{>O`M');

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
