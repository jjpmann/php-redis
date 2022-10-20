<?php

// require_once( '/Users/jerryprice/.config/php-redis/load.php' );

require_once( __DIR__ . '/sites.php' );

// determine which CMS and Plugin/Module is running

$trace  = debug_backtrace( 1 ,3 );
$files  = array_column( $trace, 'file' );
$_is_wp = array_filter( 
    $files,
    function( $file ){
        if ( ! defined( 'ABSPATH' ) ) {
            return false;
        }
        foreach ( ['wp-config.php', 'wp-load.php'] as $base ) {
            if ( strpos( $file, $base ) !== 0 ) {
                return true;
            }
        }
        return false;
    } 
);


if ( $_is_wp ) {

    require_once( __DIR__ . '/sites.php' );

    if ( file_exists( ABSPATH . 'wp-content/plugins/redis-cache/redis-cache.php' ) ) {

        define( 'WP_REDIS_HOST', '127.0.0.1' );
        define( 'WP_REDIS_PORT', 6379 );
        // define( 'WP_REDIS_PASSWORD', 'secret' );
        define( 'WP_REDIS_TIMEOUT', 1 );
        define( 'WP_REDIS_READ_TIMEOUT', 1 );

        // change the database for each site to avoid cache collisions
        define( 'WP_REDIS_DATABASE', wp_redis_get_site() );

    }
    if ( file_exists( ABSPATH . 'wp-content/plugins/wp-redis/wp-redis.php' ) ) {
        $redis_server = array(
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'database' => wp_redis_get_site(), // Optionally use a specific numeric Redis database. Default is 0.
        );
    }
}
