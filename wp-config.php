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
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', 'root' );
/** MySQL hostname */
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
define('AUTH_KEY',         'NqmGgvt4t6bmCw22+43QB06Og+FhFbxqdA69BK8HFY7Tnmq4iiLuDfGZfEZVEOMy8gwciUeHl0pNQb5mBhyI3Q==');
define('SECURE_AUTH_KEY',  'Gnez7No98BaWgqrPUXjKDaetcMJZJ4Z0HnvvEbiV8RXWI6g6QOIBpOSf2TBbWQnV+b4/FH2dySUF+gh0hPqwqQ==');
define('LOGGED_IN_KEY',    'FebX6qBJxizoIYkNSC9MVdOtjf0FrFlH31O5tKkwXz253qWA/t4QkNoXyPNrzDar7u+DPJ4K+wKiqRYyNtQgJg==');
define('NONCE_KEY',        'CyqwWH1/RYfvxsSiUbT80hlW4TYD4fTw/J2ZC7izUWe22MixbbduxeK43zKxfBbPk/s3vl1TJSNZI5LfYTfDxQ==');
define('AUTH_SALT',        'fUJ80fbIEDjEXHgF4PeQ3JPkILyy6YZgKh0g33ZyPYvr0ldv/M0fsosq2HPybg4r2INvFDKmVtOQ0WAYgrDytA==');
define('SECURE_AUTH_SALT', 'K2h5gEynRnMIBxnfDxt/T9SuCel0BzrhstC5VhkvaTRlu4kBDiwOEcn03mpie2V8WVeztb2Dw5YYfPL/Fxfxxg==');
define('LOGGED_IN_SALT',   'oGScWzLB6nGq0T3mIiN8OXHXkV/Z0MysP9d98LKVa3DKapRAPjHAZoUwFi8xBfHVPytoGTnj1PYVPntzEyTt4g==');
define('NONCE_SALT',       'G8IPWjMD1tLkSEvwK3g8Xc88ErlDkNXQYREkiXxhAibBV/vWDKHea2lYiaY2CNnfvB7BMfmD1iYGylP2u7vnNg==');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}
/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
