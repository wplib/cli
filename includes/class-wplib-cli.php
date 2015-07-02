<?php

use JSON_Loader\Loader;
use JSON_Loader\Validator;
use JSON_Loader\Generator;
use JSON_Loader\Output;

/**
 * Class WPLib_CLI
 */
class WPLib_CLI {

	/**
	 * @param array $args
	 */
	function execute( $args ) {

		echo "\n";

		do {

			if ( 0 == count( $args ) ) {

				echo "Action parameter required.";
				break;

			}

			if ( ! is_file( $json_file = getcwd() . '/wplib.json' ) ) {

				echo "No wplib.json file.";
				break;

			}

			$root = Loader::load( '\WPLib_CLI\Root', $json_file );

			if ( Validator::validate( $root ) ) {

				switch ( $args[1] ) {

					case 'generate':

						Generator::generate( $root );
						break;

					case 'show-data':
						Output::show_data( $root );
						break;

				}

			}

		} while (false);

		echo "Generated.\n\n";

	}

}
