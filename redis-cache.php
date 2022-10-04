<?php

## https://wordpress.org/plugins/redis-cache/
// require_once( '/Users/jerryprice/.config/php-redis/redis-cache.php' );

require_once( __DIR__ . '/sites.php' );

define( 'WP_REDIS_HOST', '127.0.0.1' );
define( 'WP_REDIS_PORT', 6379 );
// define( 'WP_REDIS_PASSWORD', 'secret' );
define( 'WP_REDIS_TIMEOUT', 1 );
define( 'WP_REDIS_READ_TIMEOUT', 1 );

// change the database for each site to avoid cache collisions
define( 'WP_REDIS_DATABASE', wp_redis_get_site() );
