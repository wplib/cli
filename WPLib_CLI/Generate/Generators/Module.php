<?php

namespace WPLib_CLI\Generate\Generators {

	use JSON_Loader\Util;
	use WPLib_CLI\Generate\Traits;
	use WPLib_CLI\Generate\Objects;
	use WPLib_CLI\Generate\Base;

	/**
	 * Class Module
	 *
	 * @property string $module_slug
	 * @property string $module_dir
	 * @property string $module_file
	 * @property Object $object
	 * @property Base\Object|Objects\App $object_parent
	 * @property Module $parent
	 *
	 * @see Generator_Directory_Trait
	 * @property string $this_dir
	 * @property string $includes_dir
	 * @property string $modules_dir
	 * @property string $templates_dir
	 * @property string $assets_dir
	 * @property string $images_dir
	 * @property string $css_dir
	 * @property string $js_dir
	 *
	 */
	abstract class Module extends Base\Generator {

		use Traits\Module_Directories;

		const SLUG = 'module-generator';

		/**
		 *
		 */
		function register() {

			/**
			 * Call Module_Directories->register_module_directories()
			 */
			self::register_module_directories();

			$this->register_dir( $this->module_dir );


			$this->register_output_file(
				$this->filenameify( 'module' ),
				$this->module_file()
			);


		}

		/**
		 * @return string
		 */
		function object_unique_id() {

			return Util::strip_prefix( parent::object_unique_id(), $this->this_prefix() );

		}

		/**
		 * @return string
		 */
		function module_slug() {

			return $this->filenameify( $this->object_unique_id() );

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
			return "{$this->modules_dir()}/{$this->module_slug()}";

		}

		/**
		 * @return string
		 */
		function module_file() {
			$module_file = "{$this->module_dir()}/{$this->module_slug()}.php";
			return $module_file;

		}

		/**
		 * @return string
		 */
		function this_dir() {

			return $this->module_dir();

		}

	}

}

