<?php
require( __DIR__ . '/includes/autoloader.php' );
require( __DIR__ . '/vendor/json-loader/json-loader.php' );
require( __DIR__ . '/includes/class-wplib-cli.php' );

$wplib = new WPLib_CLI();
$wplib->execute( $argv );

