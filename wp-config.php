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
define('DB_NAME', 'neocart');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

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
define('AUTH_KEY',         '$R8G>m+~`:xf8@pV-)|}QPjb,j-w)G&)&3y0A3NJq=7p?xo0&E_KIWN;~|C&;pIV');
define('SECURE_AUTH_KEY',  ';tLKfqTGGg3>bo9RS=JA.mWJ@YE;tz;O5j{DV{u!tb?oPXjsW?%bUDzzr&EE2aDx');
define('LOGGED_IN_KEY',    'DAhX|P|&Brb>+ygd|;g.ZV_s%}z}cp>waAsx~+d>eK?%S?!/9kD1ilJa2LJ+`[80');
define('NONCE_KEY',        'J,7&QarbLyb~u5MFh`g}9fk$H7?j;U#j+]()llQ[)  ]3@N ASs?J@|EI_#`~#U]');
define('AUTH_SALT',        '&^$`Gcjgg_J%+jb5Qu^PK-nJ+Na=ivj[T+*(zf-FGDpg2XqHn]r9UCqx-P7RZ~TO');
define('SECURE_AUTH_SALT', 'Mw&-;4N(Wvj-g-2Sys=8u7P*J;|m@w}eOXO/Y}|-vXTmLnk+~Dd0,2=6UzA {|Iw');
define('LOGGED_IN_SALT',   'W?:K$hazT5o0QO=h/$~YO64_*g}jbavyVlf$8/~;dR]MLu+gJw_+Xh?y{#/TXRX{');
define('NONCE_SALT',       ')Va+dU*FRdmZD(/-L&n/#|5+tkee3<#A|Np5ptW/l[Nl7_mj+x0DcE,o4UFdmMt@');

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

define('FS_METHOD',direct);

