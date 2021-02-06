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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_tmdt' );

/** MySQL database username */
define( 'DB_USER', 'tmdt' );

/** MySQL database password */
define( 'DB_PASSWORD', 'tmdt' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',;=hT_+468>4qz[>@acINQ*gcfSHG_Bt/0^SUn#G$2Rc|9z+`W!aJ5%<s|juwn|q' );
define( 'SECURE_AUTH_KEY',  'MEfYpb/!)M^#]BH:SKcxVfsDLGd`syG]-97]wmK$2dUyd1)~$Xi%w(Q)@Oo@WdAT' );
define( 'LOGGED_IN_KEY',    'e=>xh!o=8~b^i$@b8alID=2Ox22,lKY=4 ?LHzhFl7O[oLtWLnZb?IsZ8$pP{jYK' );
define( 'NONCE_KEY',        'LubH!X^hu.4Q$)ER4qJ<0nEnS;&6OumiV8pxD$2plCJ#9.+f7o7,oZ%;0QcVe~f[' );
define( 'AUTH_SALT',        '2M,e6Qmt:(C}xe0Wq4?WP(|-B&|q@Hw271V1w&Qdt).iN#~@#Uvu*:cz.z$3f=o[' );
define( 'SECURE_AUTH_SALT', 'us3XbG-PzyU=w?CqGW7m2IER,solTH8D1/]&?CQ$3q<#$L+if7pcAo!F2xM] NP1' );
define( 'LOGGED_IN_SALT',   'm],*&}wdu,DRe!x)z^ig9OBwI^i*H6w-RF`TArk>s,fc MVgI96WE1|=V`]RsTV[' );
define( 'NONCE_SALT',       'TLy9<) 4iOmB1Fj,>1HM^u K7&VYqG,vs1.s~Kb9>6Sh?`^8%jc[q9}9~i`X?X5y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
