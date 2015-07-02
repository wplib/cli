<?php

namespace WPLib_CLI {

	use JSON_Loader\Property;
	use JSON_Loader\Util;

	/**
	 * Class Module_Generator
	 *
	 * @property string $module_name
	 * @property string $module_dir
	 * @property string $module_file
	 * @property string $includes_dir
	 * @property string $assets_dir
	 * @property string $images_dir
	 * @property string $css_dir
	 * @property string $js_dir
	 * @property Object $object
	 * @property Object|App $parent
	 *
	 *
	 */
	abstract class Module_Generator extends Generator {

		const SLUG = 'module-generator';

		/**
		 *
		 */
		function register() {

			parent::register();

			$this->register_dirs( array(

				$this->module_dir,
				$this->includes_dir,
				$this->assets_dir,
				$this->images_dir,
				$this->css_dir,
				$this->js_dir,

			) );

			$this->register_output_file(
				$this->filenameify( 'module' ),
				$this->module_file()
			);


		}

		/**
		 * @param Property[] $properties
		 * @param array $args {
		 *      @type int|null $tab_count
		 *      @type string $trim
		 * }
		 *
		 * @return bool|string
		 */
		function get_initializers( $properties = array(), $args = array() ) {

			$args = Util::parse_args( $args, array(
				'trim'      => 'trim',
			));

			if ( 0 === count( $properties ) ) {

				$properties = Util::get_initializers( $this->object );

			}

			$properties = Util::filter_default_values( $properties, 'wp_default' );

			$properties = Util::explode_args( $this->object, $properties );

			$initializers = parent::get_initializers( $properties, $args );

			return 'trim' === $args[ 'trim' ] ? ltrim( $initializers ) : $initializers;

		}

		/**
		 * @return string
		 */
		function module_name() {

			return $this->filenameify( $this->unique_id() );

		}

		/**
		 * @return string
		 */
		function modules_dir() {

			return $this->parent->modules_dir();

		}

		/**
		 * @return string
		 */
		function module_dir() {

			return "{$this->modules_dir()}/{$this->module_name()}";

		}

		/**
		 * @return string
		 */
		function module_file() {

			return "{$this->module_dir()}/{$this->module_name()}.php";

		}

		/**
		 * @return string
		 */
		function includes_dir() {

			return "{$this->module_dir()}/includes";

		}

		/**
		 * @return string
		 */
		function assets_dir() {

			return "{$this->module_dir()}/assets";

		}

		/**
		 * @return string
		 */
		function images_dir() {

			return "{$this->assets_dir()}/images";

		}

		/**
		 * @return string
		 */
		function css_dir() {

			return "{$this->assets_dir()}/css";

		}

		/**
		 * @return string
		 */
		function js_dir() {

			return "{$this->assets_dir()}/js";

		}



	}

}

