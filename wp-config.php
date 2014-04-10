<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'biquyet');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'DcnmCbJNHCUuchLg');

/** MySQL hostname */
define('DB_HOST', 'ucanmydb.cjppdbmw8vde.ap-southeast-1.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','http://www.ucan.vn/bi-quyet');
define('WP_SITEURL','http://www.ucan.vn/bi-quyet');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6TVeF. v,#r{kZ6 A#<ZiO<lXs) ?mTh{5sf]`rrpPyk|uOC_a4axx`&a%y/BhiQ');
define('SECURE_AUTH_KEY',  'F>Oq?JKCVFoF $=+*spSI8mR&8(EpGlQK2v5}4&MSimq,OfSTv@oe@`37F5X>V1f');
define('LOGGED_IN_KEY',    'U*:$zSn0pj2w^faP?TT0Q!*8Hjv1]U=;2:J&->IQ:I&>{fy#!VSUzH%>{S(/F%?z');
define('NONCE_KEY',        '<?QEr,{jd!e:e+qo.5<.j:s5s`]7ncEkKzbXuF^Wq%WfwuwQR*^&t}+`]FcbBwCn');
define('AUTH_SALT',        '?lkV&B4fid6PA})Rv&g]B(v<|ND_`Q_*Z>[^%w:&ix$x=6[{sY4*U<$/ylT|y5Yc');
define('SECURE_AUTH_SALT', '11gB@`ziGMX,]1}E.`j1%D#fD@s2?%7>=6*Gqo#/QidKkL!brLA <#3A<RmwX2q&');
define('LOGGED_IN_SALT',   '=_:&&TmZ&~q>*U.}!TA_OLJ9mGz2jGod!]`+ C:DwXEUj-SE?N@mNEU#@^a:G7|J');
define('NONCE_SALT',       '*}?-S{7I{)6d]zDc)4Ofmf7&H&RpbSC_jehuu*$88XX_=Ne:WUB,kC3$}iPnhX L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
