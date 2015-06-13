<?php

require( __DIR__ . '/includes/class-wplib-cli.php' );

$wplib = new WPLib_CLI();

echo "\n";

do {

	if ( ! is_file( $json_file = getcwd() . '/wplib.json' ) ) {

		echo "No wplib.json file.";
		break;

	}

	if ( ! $wplib->load_json( $json_file ) ) {

		break;

	}

	if ( 0 == $argc ) {

		echo "Action parameter required.";
		break;

	}

	switch ( $argv[1] ) {

		case 'generate':

			$wplib->generate( $argv );

	}

} while (false);

echo "\n\n";
