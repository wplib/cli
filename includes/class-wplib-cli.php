<?php

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

			$root = \JSON_Loader\Loader::load( '\WPLib_CLI\Root', $json_file );

			if ( \JSON_Loader\Validator::validate( $root ) ) {

				switch ( $args[1] ) {

					case 'generate':

						\JSON_Loader\Generator::generate( $root );
						break;

					case 'show-data':
						\JSON_Loader\Output::show_data( $root );
						break;

				}

			}

		} while (false);

		echo "\n\n";

	}

}
