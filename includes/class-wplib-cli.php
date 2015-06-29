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

		echo "Generated.\n\n";

	}

	/**
	 * @param string $identifier
	 * @param string $short_prefix
	 * @return string
	 */
	static function get_prefixed_identifier( $identifier, $short_prefix ) {

		/**
		 * Convert all identifiers to using lowercase and underscores
		 */
		$identifier = \JSON_Loader::underscorify( strtolower( $identifier ) );

		$regex = '#^' . preg_quote( "{$short_prefix}_" ) . '#';

		if ( ! preg_match( $regex, $identifier ) ) {
			/**
			 * If the post type was not prefixed with short prefix, prefix it.
			 */
			$identifier = "{$short_prefix}_{$identifier}";

		}

		return $identifier;

	}

	/**
	 * @param string $identifier
	 * @param string $short_prefix
	 * @return string
	 */
	static function get_non_prefixed_identifier( $identifier, $short_prefix ) {

		/**
		 * Convert all identifiers to using lowercase and underscores
		 */
		$identifier = \JSON_Loader::underscorify( strtolower( $identifier ) );

		$regex = '#^' . preg_quote( "{$short_prefix}_" ) . '(.*)$#';

		if ( preg_match( $regex, $identifier, $match ) ) {
			/**
			 * If the post type was prefixed with short prefix, strip it.
			 */
			$identifier = $match[ 1 ];

		}

		return $identifier;

	}

	/**
	 * @param string|string[] $comma_string
	 * @return array
	 */
	static function comma_string_to_array( $comma_string ) {

		return is_string( $comma_string )
			? array_map( 'trim', explode( ',', $comma_string ) )
			: $comma_string;

	}

	/**
	 * @param string $filename
	 * @return string
	 */
	static function get_template_filepath( $filename ) {

		if ( is_dir( dirname( $filename ) ) && is_file( $filename ) ) {

			$filepath = $filename;

		} else {

			$filename = trim( $filename, '/' );

			$filepath = dirname( __DIR__ ) . "/templates/{$filename}";

		}

		return $filepath;

	}
}
