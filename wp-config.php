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
define('DB_NAME', 'wp_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'GF`3wN(5>]7p:|l t-iz~!okt?YSqD7<TZk_GF/j[IZXXld_?kcQN:I Td;K=N^6');
define('SECURE_AUTH_KEY',  'N(am|K+F|_YK|sL[` U;j.~~N804LyXl=4.8_:=plfc+4.sihd2sq4b?Rm&gwRDo');
define('LOGGED_IN_KEY',    'KbC4o?8MScs0) tNVre$HXkP,E|t[2][4H3D/!ESQa{~C~m/&h$PcNSWja_2Y-EV');
define('NONCE_KEY',        '(T^^HdumS,+[?g]GD(lCYGKV =[+!fkb{P%j%s+f%jx9HsQQEsS`sB!9L-m|)fHc');
define('AUTH_SALT',        'Kfv[4o:MinvX):?4[To&b9#HaF1v=iG/&D@+<)Mf=]tncRHrvv+^2$^yD#{b93*,');
define('SECURE_AUTH_SALT', 'Cw-/p#I#S|F}<d/O_cV>hIrE+vpCUNnjit| MqRO#rFvq+mW`XIy-4t,RdDb;-{`');
define('LOGGED_IN_SALT',   ']qn+~Wfm(|2pzaY74!X<n#7ZlR!av=,_D|S)R+yTK|Ig{~SwOn9i9[Oo=Z` fB7b');
define('NONCE_SALT',       '%E9^+qbwYR:Rf-`||?m,jZ~!)Xzi<|[}G291laZIYWCTFK^uK*^aA.hS=(8pL(6S');
// define ('WPLANG', 'sv_SE');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
