<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '<b#DC^AUSqX,]0Ve(J$%oZPv9jF!dh1d]S9PnnCxH}vJo^Q[SfuM|3ZE&qm$oePQ' );
define( 'SECURE_AUTH_KEY',  'o2^fY+nl&Y)$5J%.!nGuCZAEXj%t1oHSGwYo>XND>fRoVBjHM,.!-qBES0fv| {3' );
define( 'LOGGED_IN_KEY',    '9S~2#TbF<FW>*{7;XW!xggEDzoFWD3KYUEJKKz+ImFW93HBs&UM>rlH:[dxt{5fC' );
define( 'NONCE_KEY',        '7vTcsRkL^)~9/^xo-]T:GZ0yGWN!|Fw#@#k!>SqqkA1WW^2j;^4kuo&!6],5^KyC' );
define( 'AUTH_SALT',        'h(z&lo/(6!=8ZI&]Wl`yuVy7eQY7hGGnd:&_v_jbTy`xJB1KH#mzyztHpK@$<BD2' );
define( 'SECURE_AUTH_SALT', 'YU9:1o,gz<i9@4toE2Q|r;=V#_[*:+?Bg%J)T!J<(QR+ggJeE9[3D?O/ WVmg3D}' );
define( 'LOGGED_IN_SALT',   'c>:^qz?J^OoDb:Vt(#LL<T~M(eTD)Tvq)/F8Gf@~/92GhEv%xH;m`Mj` 4K&b&!C' );
define( 'NONCE_SALT',       '((m !x=;>H]1nUK&UU6J]VZ!U#jQ4veKlDOrqmbQ2Q9J+h]z)4V@*zk-#EWg#0[l' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
