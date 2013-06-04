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
define('WP_SITEURL', 'http://117.6.129.197/biquyet');
define('WP_HOME','http://117.6.129.197/biquyet');

define('DB_NAME', 'biquyet');

/** MySQL database username */
define('DB_USER', 'dolphin');

/** MySQL database password */
define('DB_PASSWORD', '18052011');

/** MySQL hostname */
define('DB_HOST', '117.6.129.197');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'zfc4kaWHFtIik#qulaE)h+(t(*[16?Lg)zxz-YcQ^|G=OH>XB,8[Y_>$0Qj4|-d=');
define('SECURE_AUTH_KEY',  'ck-cS=6acP9?R3u3[ui]tPVa4ODkQ#3QS9S*[<vHfekT-vjK[9f`59]5h#cw9jm&');
define('LOGGED_IN_KEY',    '}45rb[6bm&,(hX}@32,gAPo|R_HfNL 5Gbi1y/zf%yHsi&rvnuw)[KG:H$M=h.:Q');
define('NONCE_KEY',        '?>sB)_&~$.TLuFzmYEH=)M<Biv4moH{c@1Jyi+0(Xp?px5MqcD{l~]ZZTPWH$`yp');
define('AUTH_SALT',        'q:GuMn*Y8A{&MzfIJlZdq!ssnPhUn^mj_]Sc&quzj?Hln^#hnmL6aMZL7>}-K}s ');
define('SECURE_AUTH_SALT', 'cl.mPxBnbs8-wfcCa{:{kr/f&W<$5X*tpU9iWVeBD$b5<hY0M 6fyx:@#+jNK;a&');
define('LOGGED_IN_SALT',   'Bh;mf2?nfMgZ g}0wEw;x`wu|LG%E0gR1>&lgIBu?o>u8?0(~}/<<oxR{%(-bNn0');
define('NONCE_SALT',       ',r|57k6fl,OwUc>sDu7T<L_a5M_(Spo$R`Aff~>M-C((G6QvHudf^1N?kdxvMq[A');

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
