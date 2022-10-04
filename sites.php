<?php

function wp_redis_get_site() {
    $site_file  = __DIR__ . '/sites.json';

    if ( ! file_exists( $site_file ) ) {
        touch( $site_file );
    }

    $data       = file_get_contents( $site_file );
    $sites      = json_decode( $data, true ) ?? [];
    $trace      = debug_backtrace( 1, 2 );
    $file       = $trace[1]['file'] ?? __FILE__;
    $site       = $file;

    if ( defined( 'WP_SITEURL' ) ) {
        $site = WP_SITEURL;
    }
    
    if ( empty( $sites[ $site ] ) ) {
        $sites[ $site ] = ! empty( $sites ) ? max( $sites ) + 1 : 10;
        $json = json_encode( $sites );
        file_put_contents( $site_file, $json );
    }

    return $sites[ $site ];

}

