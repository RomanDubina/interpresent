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

define( 'DB_NAME', "db-interpresent" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         '#g8@kUpxO5@^/]z |7BN>M?xT6DNSZ+||C9lKS0Fw)q}VZH^CMz&!k>o$J!pcQ,U' );

define( 'SECURE_AUTH_KEY',  'A[TCx%%ATob!Yr3Ie213hvmNUl3~SkA0E.;}q6S~)~-0R$eqCxV$8I|hW@1;%YXC' );

define( 'LOGGED_IN_KEY',    'uKGq(0?#1UziyH5WaEH&|}mk`NmY+.mDAG[C>qe3}uU,T1(Ke>4x$2S0k4@n@8:/' );

define( 'NONCE_KEY',        '=KH8By%%qS*?kGmm4`,~F&Sx>};<{MrG)m9.,yULQw@i1epx]J/U?AA $T1/J*eP' );

define( 'AUTH_SALT',        ' Z-LFYgG`1k p+ujSj@|:tbc/sdv|GVwoAhnWYbs^1kIpqz3$.ZF<~a80?A!}xun' );

define( 'SECURE_AUTH_SALT', 'jJmQh=mR@lA,CcD$/^I,RmXIC=-S@-Sl1.ngAEwR3Z]3x4JCGH~*&@3 *<8aw=T&' );

define( 'LOGGED_IN_SALT',   '* <6<JC6m4gP(bE9M4&VD]Ml0~gw$) >Ql`hx A$O_Xt+e?3B,k8F*P/5ID1  hC' );

define( 'NONCE_SALT',       'PJ~}l&Ck/,gV~.MFK{.y[CB_,cehAgb]ZccD0ND2(?T3(3z`p#,u].edWC3~N^;K' );


/**#@-*/


/**

 * WordPress Database Table prefix.

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


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

