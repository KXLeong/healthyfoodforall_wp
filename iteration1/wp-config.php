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
define( 'DB_NAME', 'nomisite_wp824' );

/** Database username */
define( 'DB_USER', 'nomisite_wp824' );

/** Database password */
define( 'DB_PASSWORD', '74BpSo8]T!' );

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
define( 'AUTH_KEY',         'puwjiobcnzw7y1rdmkuyjlficekcxzkunwugn81otrayotqhlojnaecmen9dzd1p' );
define( 'SECURE_AUTH_KEY',  'o3q3esubjruucxyihmhyr9clhkee2be2jjv9reddfwpryt7lejf3fas9a0ctttas' );
define( 'LOGGED_IN_KEY',    'm2nj2flgvhocuavtpf1aq1kgmkjyhc2ctfmxzhuo1vdlx1vlgaumoybuzhclcpbf' );
define( 'NONCE_KEY',        'bedlbdyfcthoxrzndmgcwhkapkg0zp8xonhjrydkoobzx5jmaa7qndlsmdlkpxxq' );
define( 'AUTH_SALT',        'zzjlwqfmto8ngfmmibrh5nuqq3t4oteu3thqzppw2ugvn4mxjedarqs5tkuypjsi' );
define( 'SECURE_AUTH_SALT', 't0yrfwegd30ogugll6bgxqfctiwmdfebcwg0gn86fvdxul7muq4zxjog5zd2uai3' );
define( 'LOGGED_IN_SALT',   'sib3r5fbyvqifzkbvlq2aprkgsk0synutl927n7ufydyedjfqy6egs1vz85dmrhw' );
define( 'NONCE_SALT',       'r3vche9h9zl29zcady6mukzuwulldmy8i1y7kr0ahq3l3wx8eby5xhmt330l1lwc' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpstg0_'; // Changed by WP Staging

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
define('UPLOADS', 'wp-content/uploads'); 
define('WP_PLUGIN_DIR', __DIR__ . "/wp-content/plugins"); 
define('WP_PLUGIN_URL', 'https://healthyfoodforall.tk/iteration1/wp-content/plugins'); 
define('WP_LANG_DIR', __DIR__ . "/wp-content/languages"); 
define('WP_HOME', 'https://healthyfoodforall.tk/iteration1'); 
define('WP_SITEURL', 'https://healthyfoodforall.tk/iteration1'); 
define('WP_CACHE', false); 
define('WP_ENVIRONMENT_TYPE', 'staging'); 
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
