<?php

require( __DIR__ . '/includes/autoloader.php' );
require( __DIR__ . '/vendor/json-loader/json-loader.php' );

$wplib = new WPLib_CLI();
$wplib->execute( $argv );

