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
define( 'DB_NAME', 'wordpress_demo1' );

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
define( 'AUTH_KEY',         'Twm2:<bfOhRwa-Pa}H_`I0kXE7h|=ZS}(3QCO]|o*W#nJ=8bvham9vI_;s&?2qlr' );
define( 'SECURE_AUTH_KEY',  'zlg@tt@HB:Ve-5&~_7M.CxSE?fin3ev!C7&KoC*S|V=)S Xg,_GgX5X;yRiO fG$' );
define( 'LOGGED_IN_KEY',    ';C+CDAFT+&C(e.#H8D]s_>U3mbZ)d74zA_ttVzL|;H8ra8`;S^9u?kYdv0m C&ma' );
define( 'NONCE_KEY',        'Az{AsY/k1Wu|8=YUO4^mNCz}9BH#CPLY=,k%@0?Gs,A2(QOiAtkoaQ?<TE-/c-g5' );
define( 'AUTH_SALT',        '}SN9Tj}&5.`|.EV^!){BLxB`bJ-[6vmC^VW?0|{+Fl?rI:&6vK3.O{{.zpz+Obib' );
define( 'SECURE_AUTH_SALT', '/g?DYaTq{[z@e@3-Z:a3Z9Ij&ho7Nzc$5.wAERLqF79ADve||6OlVa}v=69h`%ge' );
define( 'LOGGED_IN_SALT',   '^d:mrgWjD#9mmemO`71Lei;A?25wo7iBV2=~!3&Bx;hl*#W|>Mk8]=h0W6gEBi7*' );
define( 'NONCE_SALT',       'b#dXRqfT0VI^c*:u#eu>gd7-X`f#9~pN.[=+k&osZ-mYG&i(4z[,i?im,!qdgL*n' );

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
