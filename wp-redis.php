<?php

## https://wordpress.org/plugins/wp-redis/
// require_once( '/Users/jerryprice/.config/php-redis/wp-redis.php' );

require_once( __DIR__ . '/sites.php' );

$redis_server = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => wp_redis_get_site(), // Optionally use a specific numeric Redis database. Default is 0.
);
