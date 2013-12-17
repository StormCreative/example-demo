<?php
/*
|----------------------------------------------------------------
| Application Database Settings
|----------------------------------------------------------------
|
| These are all the settings that are associated
| to anything to do with the database
|
*/

/**
 * Sets the production or development database settings
 * 
 * @param string database host
 * @param string database name
 * @param string database username
 * @param string database password
 */
if ($settings['LIVE']) {

    $settings[ 'DB_HOST' ] = 'localhost';
    $settings[ 'DB_NAME' ] = 'example_demo';
    $settings[ 'DB_USER' ] = 'root';
    $settings[ 'DB_PASS' ] = 'root';

} else {

    $settings[ 'DB_HOST' ] = 'localhost';
    $settings[ 'DB_NAME' ] = 'example_demo';
    $settings[ 'DB_USER' ] = 'root';
    $settings[ 'DB_PASS' ] = 'root';
}

//If we are trying to access the database from the command line we need to use the IP not localhost
if( php_sapi_name() == 'cli' ) {
    $settings[ 'DB_HOST' ] = '127.0.0.1:8889';
}

/**
 * The database suffix - all tables are prepended with the name
 * of the application.
 * 
 * This is optional and can be changed
 */
$settings[ 'DB_SUFFIX' ] = 'example_demo';


/**
 * Controls connection of the database - boolean
 * 
 * If a site is a static site, there is no
 * requirement for a database so this ensures
 * no unneccessary connection is made if false
 */
$settings[ 'USE_DB' ] = TRUE;