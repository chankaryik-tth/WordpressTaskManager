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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'task_manager');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~/yQxhNqr=1UL5TPhX_M&l?6?_0=#, n^&}{USo6SpE?Np{zU^89Tn`R?%w2hd^W');
define('SECURE_AUTH_KEY',  ' :$,}+EOjhhOAcrzT)C <pFnXRx5?eE-:$0A[P+VjNrUN3LKX^VF,]Q9~`Q9>CPF');
define('LOGGED_IN_KEY',    'GS%mS7Ax{u2Ag~:x1,a=K[}g&Gf0!R1b>io*~qo.F[cb:#tTt9J!>O@Wa|!VPMq,');
define('NONCE_KEY',        '(ppCP>o9R+HA Q=6Bz>35x&,NRqbpqvW{VVwqp^p%-K#)<olTRWToJ(N $t*l[i`');
define('AUTH_SALT',        ' {9eFnX9}7|HsNH68BIa~z$E6$K]K.A]7k3A<sVehs8kb!=3f&OkGo7fKUju}/ew');
define('SECURE_AUTH_SALT', 'Jp,^q :7%uu3hsnHw[sGFS17=pf i<-AkF^nW^QmGEvR1*e!},?8n=lw=,hRM/Kf');
define('LOGGED_IN_SALT',   '2H1L$V*Sy(zBUqyyS[nbF-iYL$&XJ$e,Z5!.=19O~AEds}Z7gV1Uz)~N.*IvJKE-');
define('NONCE_SALT',       '%Q6iKL:pyPFL8M<=W2Y>/@iO2tcu[Co1+{@l=[gwFwmXlits^%)ABy$Yrvf90dY^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
