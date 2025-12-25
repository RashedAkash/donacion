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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'donacion' );

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
define( 'AUTH_KEY',         '(EcpL100:eU=,rmHV v@s}kP@kR)Vv%@^9&5_vo,5o1YNXr{ 4r3}V~N%c9a|Asj' );
define( 'SECURE_AUTH_KEY',  'dAzBcV.W%a6zsd~hVv~d~1XICYo$y;Bm{Oj]Fi[Ig|M:idejZXGakh>wf5fUHh(E' );
define( 'LOGGED_IN_KEY',    'L?m94x@A)Uey3_2TR3..P-n{.HzZ^!3-vhd8IV%.n%:!Q]xHvwTg}o&^|a$dl8/%' );
define( 'NONCE_KEY',        'BzR-;rFVQ5 .5$N>XAl`rW9H0C}~(C3Bl<X>PiZ6SG^Lj?>dH7D{uGP~Pp_K_|c@' );
define( 'AUTH_SALT',        '=idQNoKt@6>:Hn3Em/N3ukgv``>$oq12Gg8Nds|?u%F~,$C?jRYd{T$Ab)pl=?34' );
define( 'SECURE_AUTH_SALT', 'WBAE2o-+%=(p.nfxSR pUx|_30AZj;y!q@%0,I.PJi~5Sk6J)%8NTl-F$S I[,!f' );
define( 'LOGGED_IN_SALT',   '<iJ-.d^QHZ#A(y1Br;M~[/t@<uk8)c=E;[hPC1F)$Ps{3ju)e`&0G%.r~z2cA5bj' );
define( 'NONCE_SALT',       '#J7r3jpMPQzEg9%lyp^9{s N31#6)zB$u6ACTJ)As6_EkHU;2){K)_2T6S_q#=*V' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
