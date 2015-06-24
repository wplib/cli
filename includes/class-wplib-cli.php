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
	 * @param \WPLib_CLI\Root $root
	 * @param string $identifier
	 * @return string
	 */
	static function get_prefixed_identifier( $root, $identifier ) {

		/**
		 * Convert all identifiers to using lowercase and underscores
		 */
		$identifier = str_replace( '-', '_', strtolower( $identifier ) );

		$regex = '#^' . preg_quote( "{$root->short_prefix}_" ) . '#';

		if ( ! preg_match( $regex, $identifier ) ) {
			/**
			 * If the post types are not prefixed with short post type, prefix them
			 */
			$identifier = "{$root->short_prefix}{$identifier}";

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

}
