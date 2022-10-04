# PHP REDIS

Manages local redis databases for each site or file. 

## Supports: 
- https://wordpress.org/plugins/redis-cache/
- https://wordpress.org/plugins/wp-redis/ 


### Example

in `wp-config.php` just require the file needed for the redis plugin used.

```
## https://wordpress.org/plugins/redis-cache/
require_once( 'php-redis/redis-cache.php' );
```
OR
```
## https://wordpress.org/plugins/wp-redis/
// require_once( 'php-redis/wp-redis.php' );
```