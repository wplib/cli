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
	 * @property Object $object
	 * @property Object|App $object_parent
	 * @property Module_Generator $parent
	 *
	 * @see Generator_Directory_Trait
	 * @property string $root_dir
	 * @property string $includes_dir
	 * @property string $modules_dir
	 * @property string $templates_dir
	 * @property string $assets_dir
	 * @property string $images_dir
	 * @property string $css_dir
	 * @property string $js_dir
	 *
	 */
	abstract class Module_Generator extends Generator {

		use Generator_Directory_Trait;

		const SLUG = 'module-generator';

		/**
		 *
		 */
		function register() {

			/**
			 * Call Generator_Directory_Trait->register()
			 */
			parent::register();

			$this->register_output_file(
				$this->filenameify( 'module' ),
				$this->module_file()
			);


		}

		/**
		 * @return string
		 */
		function unique_id() {

			$prefix = $this->prefix;
			return Util::strip_prefix( parent::unique_id(), $prefix );

		}

		/**
		 * @return string
		 */
		function module_name() {

			return $this->name;
			//return $this->filenameify( $this->unique_id() );

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

//		/**
//		 * @return string
//		 */
//		function modules_dir() {
//
//			return $this->parent->modules_dir();
//
//		}

	}

}

