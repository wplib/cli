<?php

namespace WPLib_CLI;

use JSON_Loader\Util;

/**
 * Autoloads classes from the /classes subdirectory.
 *
 * Class WPPM_Foo_Bar_Baz should be found in class-foo-bar-baz.php
 *
 * @param string $class_name
 *
 */
class Autoloader {

	private static $_class_files = array();

	static function autoload( $declaration_name ) {

		do {

			$namespace_regex = preg_quote( __NAMESPACE__ . '\\' );

			if ( ! preg_match( "#^{$namespace_regex}(.+)$#", $declaration_name, $match ) ) {
				/*
				 * We are only autoloading for our own namespace
				 */
				break;
			}

			$root_dir = \WPLib_CLI::root_dir();

			$base_name = Util::dashify( $match[1] );

			$path = preg_match( '#^.*_?Generator(_Trait)?$#', $declaration_name )
				? 'generators'
				: 'objects';

			$filepath = "{$root_dir}/{$path}/{$base_name}.php";

			if ( ! is_file( $filepath ) ) {
				/*
				 * Not a file for us to handle.
				 */
				break;
			}

			require( $filepath );

			if ( class_exists( $declaration_name ) ) {

				$declarations = get_declared_classes();
				$type_loaded = 'class';

			} else if ( trait_exists( $declaration_name ) ) {

				$declarations = get_declared_traits();
				$type_loaded  = 'trait';

			} else {
				$err_msg = 'Attempt to load %s but it is neither a Class nor a Trait.';
				Util::log_error( sprintf( $err_msg, $declaration_name, $loaded_class ) );
			}

			$loaded = array_pop( $declarations );

			if ( $loaded !== $declaration_name ) {

				$err_msg = 'Attempt to load %s %s; %s %s loaded instead.';
				Util::log_error( sprintf( $err_msg, $type_loaded, $declaration_name, $type_loaded, $loaded ) );

			}

			self::$_class_files[ $declaration_name ] = $filepath;


		} while ( false );

	}

}
spl_autoload_register( array( '\WPLib_CLI\AutoLoader', 'autoload' ), true, true );

