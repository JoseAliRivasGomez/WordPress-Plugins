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
define( 'DB_NAME', 'wordpresspluginsdb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'myrootpassword' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'FS_METHOD', 'direct' );

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
define( 'AUTH_KEY',         '`_2mWan#hpSV48/n7}c-`(`>*;NOO03Dcvj2f$hzrZ3~NCpsnJA$6qZ!q}3D&J2h' );
define( 'SECURE_AUTH_KEY',  '|N^se4i-3p2_:O?obX[,0TAZ(<lPyc=ZLTmQd{^uB41c2gek5o*)](jt.qw>fs3-' );
define( 'LOGGED_IN_KEY',    '@H~8{A/cTdVbPYpAL= h~N@8&k-*LC+~]1 z=aN@eOxTU3j:bE|==9h3)J,O;L#X' );
define( 'NONCE_KEY',        'SippOwCB2V+wM0>l0M=;EFVti~pS= @u3{iEa,g-A@Nz6uAM@4#,*Fv(G3k`iE}=' );
define( 'AUTH_SALT',        '9A.X)m5rK5F`bv9[7A8ttOx8]D..Q8|PWACWj1p>v6[P.%|,y/+Or|8Qw4Li&mdO' );
define( 'SECURE_AUTH_SALT', 'PbVET3j[Gw=$m(`brveyAwG!(gmT?kzex!O,qv$OCm>-V@9T8@#=[;Z`R&,_3LOW' );
define( 'LOGGED_IN_SALT',   'Ew%Ox[mEs^:(@0$f:H_2yQg,|-rvb!ce&Z%OOC=W=x*U`:iAwSrU@%T1)G.<v[Et' );
define( 'NONCE_SALT',       '05uPu-Z*?zW`G5!Z|J}f>&k~;IS.@E0]v&V8n_(jDg`5@gZhp;4KjgT+CpRGoRAT' );

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
