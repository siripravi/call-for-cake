<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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
error_reporting(0);
@ini_set('display_errors', 0);
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpyii1' );

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
define( 'AUTH_KEY',         'vae( b*Y!9/#R%R>JJi0^sY^SA!kFm$313GRm@qrp9JJ-0-zoP/YpxW)8!|P?mmv' );
define( 'SECURE_AUTH_KEY',  'zinagxG1oUl-IjZC0Xj0.Xr<.yk<5Ag1MBsy83_NuSQW^}D.`wFa`oB9KL(qx<]q' );
define( 'LOGGED_IN_KEY',    '7oCc3P;bK:bWhj`RHp[N-~zhiM|%4A19I=Rx6+2JkH#[(d,PFJ (0 78,NkgR-S]' );
define( 'NONCE_KEY',        'I{i8WRR&?9`F |9q:^IxsnF;G_vVt}^Qt>s2iASAfEjx<W#7o8XdE,FG/^<z408)' );
define( 'AUTH_SALT',        '2WmA/GBI V;+[ykJoD$ior[D0,_~6Aw4OvoSi>@V@N#eY?%9)(7_LV=er;PTf_Te' );
define( 'SECURE_AUTH_SALT', 'e>mj;<[v?sh3Gi8l;qnGPdNFN;id)uc5kH.{UN}P&ds44I}y/3<m=32u/(FXV?d}' );
define( 'LOGGED_IN_SALT',   'WB*R0*4&=4o/mel^h=Ah=pkE:B$32>Nf0$sfrX3P9X `_$>}gQcuGk<-Q3bH-%jt' );
define( 'NONCE_SALT',       's))]%FU_>u;7jP:i;ERK2d{~GHv.yTJL($~-rGxr9]^&_FG0%[4dKYj-tdW!_WU-' );

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
