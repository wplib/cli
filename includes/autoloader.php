<?php

namespace WPLib_CLI;

/**
 * Autoloads classes from the /classes subdirectory.
 *
 * Class WPPM_Foo_Bar_Baz should be found in class-foo-bar-baz.php
 *
 * @param string $class_name
 *
 */
class Autoloader {

	static function autoload( $class_name ) {

		$class_name = preg_match( '#^(\\\\)?WPLib_CLI\\\\(.*)$#', $class_name, $match ) ? $match[2] : $class_name;

		if ( preg_match( '#^[_a-zA-Z][_a-zA-Z0-9]*_Generator$#', $class_name ) ) {

			$class_file = strtolower( str_replace( '_', '-', "/../generators/{$class_name}.php" ) );

			if ( is_file( $file_to_load = realpath( __DIR__ . $class_file ) ) ) {

				require( $file_to_load );

			}

		} else {

			$class_file = strtolower( str_replace( '_', '-', "/class-{$class_name}.php" ) );

			if ( is_file( $file_to_load = realpath( __DIR__ . "/../objects{$class_file}" ) ) ) {

				require( $file_to_load );

			} else if ( is_file( $file_to_load = __DIR__ . $class_file ) ) {

				require( $file_to_load );

			}

		}

	}

}
spl_autoload_register( array( '\WPLib_CLI\AutoLoader', 'autoload' ) );

