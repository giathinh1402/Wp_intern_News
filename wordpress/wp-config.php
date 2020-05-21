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
define( 'DB_NAME', 'first_wp' );

/** MySQL database username */
define( 'DB_USER', 'giathinh' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ab123456789' );

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
define( 'AUTH_KEY',         '_&jDp*kS?VH+dN=UBS]_.ym{(HHlfH5fJGLP83E<Fe)ID!@P^]rPj9OQr/7esQ<y' );
define( 'SECURE_AUTH_KEY',  ' n_tefBulJnO00!~27Qg:cQMIw] .OZFue>:Ln:3vTP|wX|3}hs%TNaMZ3j4fEr8' );
define( 'LOGGED_IN_KEY',    '^_g1Zp<4{6920GW,KZ`fHkhlP)c=&m}If=^%DDD/h;<=i!iT6@j[Y|lwp?$eIk7B' );
define( 'NONCE_KEY',        '(pQ&UM(fNFv ,)VsjiA5aAsT6@v@D||CHCK.<E3@1_.F)|ITPohGdKg0&.q30l%-' );
define( 'AUTH_SALT',        '@lZsY~TUt*I<%HD@4/YJ{[)Zp$^yUidcT!CVN#]tKo{dh+}WHt5?bn5)g&&Q jxG' );
define( 'SECURE_AUTH_SALT', 'T{m#jE}c}L~_gZNzfM=9GBGga>X67-4.RpfA0)IZ_LSPt7/ks+?PCT>bp4oP-5U+' );
define( 'LOGGED_IN_SALT',   '.#zX<9>%^j7gB:*)8Fu?|j!0=|!p,yn],&R0Z{@j1/FJ#o-?eEU%Gq</YDgH<b|[' );
define( 'NONCE_SALT',       'AC*9WB;RWFZUbVvnJ~t2KH=`R&Txf#~y7M]gCt{&w<K*8AqjAc6B!3I/fc!`n_*Y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_first';

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
