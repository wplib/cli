<?php

use JsonLoader\Loader;
use JsonLoader\Validator;
use JsonLoader\Generator;
use JsonLoader\Output;
use JsonLoader\Util;

/**
 * Class WPLib_CLI
 */
class WPLib_CLI {

	static $CLASS_FACTORY =  array( __CLASS__, 'make_new' );

	static $template;

	/**
	 * @var self
	 */
	static $instance;

	/**
	 * @return self
	 */
    static function get_instance() {

		return self::$instance;

    }

	/**
	 * @return string
	 */
    static function project_dir() {

		return dirname( __DIR__ );

    }

	/**
	 * @param array $args
	 */
	function execute( $args ) {

		echo "\n";

		$this->show_banner();

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

					do {

						$project = $this->load( $json_file, self::$CLASS_FACTORY );

						if ( $this->validate( $project ) ) {

							$this->generate( $project );

						}

					} while ( false );

					break;

				case 'show-data':
					//Output::show_data( $meta );
					break;

			}


		} while (false);

		if ( isset( $error ) ) {

			echo "{$error}\n\n";
			exit;

		}

		echo "\nDone.\n\n";

	}

	/**
	 * @param string $filepath
	 * @param callable $class_factory
	 * @param array $args {
     *
*@type boolean|\JsonLoader\Logger $logger
	 * }
	 * @return \JsonLoader\Object
	 */
	function load( $filepath, $class_factory, $args = array() ) {

		$object = Loader::instance()->load( $filepath, $class_factory, $args );

		return $object;

	}

	/**
	 * @param \JsonLoader\Object $object
	 * @param array $args
	 *
*@return \JsonLoader\Object
	 */
	function validate( $object, $args = array() ) {

		return Validator::instance()->validate( $object, $args );

	}

	/**
	 * @param \JsonLoader\Object $object
	 *
*@return \JsonLoader\Object
	 */
	function generate( $object ) {

		return Generator::generate( $object );

	}

	/**
	 * Object factory to return one of the (currently) four valid object type: 'meta', 'site', 'app' or 'theme'.
	 *
	 * @param stdClass $data
	 * @param string $filepath Filepath for the wplib.json file
	 * @param array $args {
	 *      @type Object|boolean $parent
	 * }
	 * @return \JsonLoader\Object
	 */
	static function make_new( $data, $filepath, $args ) {

		do {

			$args = Util::parse_args( $args, array(
				'parent' => false,
			));

			$object = null;
			$err_msg = false;

			$object_type = property_exists( $data, '@type' )
					? $data->{'@type'}
					: '\\WPLib_CLI\\Project';

			$object_class = self::get_object_class( $object_type );

			if ( ! class_exists( $object_class ) ) {
				$err_msg = "@type=%s from wplib.json does not represent a valid class.";
				break;
			}

			/**
			 * @var Object $object
			 */
			$object = new $object_class( $data, $args[ 'parent' ], array(
				'filepath' => dirname( $filepath ),
			));

			if ( ! $object instanceof \JsonLoader\Object ) {
				$err_msg = "@type=%s from wplib.json is not an instance of \\JSON_Loader\\Object.";
				break;
			}

			foreach( $object->get_loadable_properties() as $property_name => $property ) {

				if ( ! is_string( $value = $object->get_value( $property_name ) ) ) {

					continue;

				}

				/*
				 * Strip off the /wplib.json from the containING filepath.
				 * Remove the trailing slash too.
				 */
				$dir = preg_replace( '#^(.+)/wplib.json$#', '$1', $filepath );

				/*
				 * Strip off the ~/ prefix, if exists from the containED filepath.
				 * Concatonate $dir, '/' and everything after ~/
				 */
				$child_filepath = preg_replace( '#^~/(.*)$#', "{$dir}/$1", $value );

				/*
				 * Ensure we have /wplib.json on the filepath
				 */
				$child_filepath = preg_replace( '#^(.*?)(/?)(wplib.json)?$#', "$1/wplib.json", $child_filepath );

				/*
				 * Check to see if the containED wplib.json exists.
				 */
				if ( ! is_file( $child_filepath ) ) {

					$err_msg = 'The file %s specified for the property `%s` as %s resolved to %s but does not exist.';
					Util::log_error( sprintf( $err_msg, $value, $property_name, $filepath, $child_filepath ) );

				}

				/*
				 * Now load everything that referenced and not included.
				 */
				$value = self::get_instance()->load( $child_filepath, static::$CLASS_FACTORY, array(
					'parent'   => $object,
					'filepath' => dirname( $child_filepath ),
				));

				$object->set_value( $property_name, $value );


			}

		} while ( false );

		if ( $err_msg ) {
			Util::log_error( sprintf( $err_msg, $object_type ) );
		}

		return $object;

	}

	/**
	 *
	 */
	function show_banner() {

		echo <<<ASCII_ART
__      _____ _    _ _       ___ _    ___
\ \    / / _ \ |  (_) |__   / __| |  |_ _|
 \ \/\/ /|  _/ |__| | '_ \ | (__| |__ | |
  \_/\_/ |_| |____|_|_.__/  \___|____|___|

    Copyright 2015 The WPLib Team

ASCII_ART;

	}

	/**
	 * @param string $object_type
	 *
	 * @return null|string
	 */
	static function get_object_class( $object_type ) {

		do {

			$object_class = null;

			if ( class_exists( $object_type ) ) {
				$object_class = $object_type;
				break;
			}

			$try_class = "\\WPLib_CLI\\{$object_type}";

			if ( class_exists( $try_class ) ) {
				$object_class = $try_class;
				break;
			}

			if ( class_exists( $try_class = "\\WPLib_CLI\\" . Util::underscorify( ucwords( $object_type ) ) ) ) {
				$object_class = $try_class;
				break;
			}

		} while ( false );

		return $object_class;

	}


	static function get_object_file( $type ) {

		$class_file = strtolower( Util::dashify( "/{$type}.php" ) );

		return realpath( __DIR__ . "/../objects{$class_file}" );

	}
	static function load_template( $template, $args ) {

		extract( $args, EXTR_OVERWRITE );

		unset( $args );

		require( Util::get_template_filepath( "{$template}.php", __CLASS__ ) );


	}

}
WPLib_CLI::$instance = new WPLib_CLI();
