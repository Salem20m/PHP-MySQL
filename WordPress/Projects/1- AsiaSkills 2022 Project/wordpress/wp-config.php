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
define( 'DB_NAME', 'wordpress_asiaskills_2022' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '!3B!oNH=[XqVbdTK[4tVH5|CIq w8wrXV:? t,sg3a=p!xy(5oVw6#+hOqv*>Z_G' );
define( 'SECURE_AUTH_KEY',  'iKudxzhjKd#&,q6x>j=_M_q43;Q29io+Q|>SDL_+^p$tviF..$V%c#De#;=apC!M' );
define( 'LOGGED_IN_KEY',    'QPXYmH V3,IfUWiFZ2 mcV?q9.jiC=(_u/G>:t*~YL3gh%}<jPg5qBiA6{?5,c3b' );
define( 'NONCE_KEY',        'nu0)L&Kp*5y~_T9-*|l|c-G57,*vLh!P9?e~/L>m(*9&fA(Y[%qm>&?OI!cwl}0W' );
define( 'AUTH_SALT',        '~n$wLHPsrNlAe8y>j`R+13zyi}*TO>?HuB7V7fLg.3Xc#.!7e.!3,`soxnDXI2X5' );
define( 'SECURE_AUTH_SALT', 'yN3X,_#p75dg!PjN{]_[mu5Cc#2I$=CdAD757Eo]*D}+!xKK04kX@.<HcZIGT[|Y' );
define( 'LOGGED_IN_SALT',   'mgI,)^yT$]Lz:oT@Mk&a{78u);=UxjUz`0Z>vM_.z|()i0adm*{3Cs%ar30mz}W:' );
define( 'NONCE_SALT',       '*V6#.lZQL)}sy&IH&#I~i~?wovFNI*Eg/+?I4!c_0/e!978I]i{Tl!<;Hf{L(Z-%' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_AUTO_UPDATE_CORE', false );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
