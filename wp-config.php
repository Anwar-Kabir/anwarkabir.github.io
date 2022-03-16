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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'anwarkabir' );

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
define( 'AUTH_KEY',         ' .e.^X;P&N|P1~$=$W_L+]=hCj`6^g vC4o&y,ef7@_%~i%o~ 2cN@3HSs`J{#!;' );
define( 'SECURE_AUTH_KEY',  '?Xj~|WyV$y|;  -7xoB&E:^WCZ$VaV?(P@MEFnu3yPK d)R<l$Jh|fOJWicTq2!w' );
define( 'LOGGED_IN_KEY',    'h}0GmNzY8FXxL)1DpC>Ize6:&U_Yn CHW%MATEe89ZMm^fYT$(|x_-eR[3-18zYh' );
define( 'NONCE_KEY',        'mLP=_kzZ%@j8 +^?YRT/LN[aM jG7bxs=rl-/0aBFyG2DXR&RM/P 5oo#F*$#u2C' );
define( 'AUTH_SALT',        'oq44+0BLBy=4PnTVKcmf~bmQd@qZ.CNL+Uj!4OId%MpS3&xNxibd9 &~Dfp<e] z' );
define( 'SECURE_AUTH_SALT', 'E(>Fd23$|T)EU>RCQOY2l%h$fq p@BK/zYxw8(2?}$iA `]+z4N),x*I*#GYB9<?' );
define( 'LOGGED_IN_SALT',   'F5I?P;AcQ|n:J<|H)!=q$wnlk^;7za!!,{i).4tR{~e&+Q24ID%gWS&zd;cU>b; ' );
define( 'NONCE_SALT',       'MzwE8y/vi%*(8|yO7XDQ{u|V:EM)q`47S.4Co8q*4wG7,qhO;;/ h>&LvRf1QL[x' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
