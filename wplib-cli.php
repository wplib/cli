<?php

require( __DIR__ . '/includes/autoloader.php' );
require( __DIR__ . '/vendor/typed-config/typed-config.php' );

$wplib = new WPLib_CLI();
$wplib->execute( $argv );

