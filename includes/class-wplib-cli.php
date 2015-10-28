<?php

use JSON_Loader\Loader;
use JSON_Loader\Validator;
use JSON_Loader\Generator;
use JSON_Loader\Output;
use JSON_Loader\Util;

/**
 * Class WPLib_CLI
 */
class WPLib_CLI {

	static $template;

	/**
	 * @param array $args
	 */
	function execute( $args ) {

		echo "\n";

		do {

			if ( 1 == count( $args ) ) {

				$error = "Action parameter required.";
				break;

			}

			if ( ! is_file( $json_file = getcwd() . '/wplib.json' ) ) {

				$error = "No wplib.json file.";
				break;

			}

			switch ( $args[1] ) {

				case 'generate':

					if ( empty( $args[2] ) ) {
						$error = "generate requires an argument,i.e. 'app', etc.";
					} else if ( !( $root_class = self::get_object_class( $args[2] ) ) ) {
						$error = sprintf( "generate argument '%s' is not a valid object type.", $args[2] );
					} else {
						$root = Loader::load( $root_class, $json_file );
						if ( Validator::validate( $root ) ) {

							Generator::generate( $root, "{$root_class}_Generator" );
						}
					}
					break;

				case 'show-data':
					//Output::show_data( $root );
					break;

			}


		} while (false);

		if ( isset( $error ) ) {

			echo "{$error}\n\n";
			exit;

		}

		echo "\nDone.\n\n";

	}

	static function get_object_class( $type ) {
		do {

			$object_class = null;

			$object_file = self::get_object_file( $type );
			if ( ! is_file( $object_file ) ) {
				$error = sprintf( 'The source file %s does not exist for object type %s.', $object_file, $type );
				break;
			}

			$source_code = file_get_contents( $object_file );
			if ( ! preg_match( '#class\s+([^\s]+)\s+extends#', $source_code, $match ) ) {
				$error = sprintf( 'The source file %s does not contain a PHP class.', $object_file );
				break;
			}

			$object_class = "\\WPLib_CLI\\{$match[1]}";

		} while ( false );

		return $object_class;

	}


	static function get_object_file( $type ) {

		$class_file = strtolower( Util::dashify( "/{$type}.php" ) );

		return realpath( __DIR__ . "/../objects{$class_file}" );

	}
	static function load( $template, $args ) {

		extract( $args, EXTR_OVERWRITE );

		unset( $args );

		require( Util::get_template_filepath( "{$template}.php", __CLASS__ ) );


	}

}
