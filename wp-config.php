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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //

if (file_exists(dirname(__FILE__) . '/local.php')) {
	// Local database settings
	define( 'DB_NAME', 'local' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
} else {
	// Live database settings
	define( 'DB_NAME', 'mares665_universitydata' );
	define( 'DB_USER', 'mares665_wp864' );
	define( 'DB_PASSWORD', 'hlg037' );
	define( 'DB_HOST', 'localhost' );
}

define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'uz9[7Afe[R6N9-ob>/[8<C,?-Cu~[c*>g_Q?zF%C40;j!ZkT9J#k=)a1&``+oJ.[');
define('SECURE_AUTH_KEY',  'B?OUcAfzxurZvbymp3K,rj32 v/_T?MX85H|{M[U)0i/Dc/Uwj$CAoB|@E9oM!:r');
define('LOGGED_IN_KEY',    'Wp&0=-i4=D^-:`GQi-1@4-:_I]yFxf+BX]6 DOt)U=x!,7_-++@b^t&3%!vBLLgU');
define('NONCE_KEY',        '^h]-*[~ip|_a<8~VmGtwtG]oF&+jF_.,(N`;,+ ~iE50z~USoK;2UbgI;H^ODX&a');
define('AUTH_SALT',        'ybTgE5|+s=Ac$l&ittu?D_qs-M.pkH>;r!}gz,_^dA+l,m*8qCufB=NNW?_%*c#/');
define('SECURE_AUTH_SALT', '&sCq)H36*  </!&j3[m8wETGjKE)S@k=+`.nLXzEoC3tX-.)S@D|94M}2]w~ii|U');
define('LOGGED_IN_SALT',   '3fQA`EXNr7SO/;YS6%~Odr=/;Ne:1!DsW^Aw<Bpj|9N{>O>[K+VXMG]KkC_h8{nn');
define('NONCE_SALT',       ')g;6&KnmY@C+fC_q6m|f!kBqxzE-uS{Q]5$^<]I,d|Wth/W-{DNkr`GaUF9b:Xzn');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
