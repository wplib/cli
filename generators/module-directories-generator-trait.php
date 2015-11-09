<?php
/**
 *
 */
namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Module_Directories_Generator_Trait
	 *
	 * @package WPLib_CLI
	 * @mixin Generator
	 *
	 * @property Object $name
	 * @property Object $object
	 * @property string $singular_class_name
	 * @property string $plural_class_name
	 *
	 * @property string $includes_dir
	 * @property string $modules_dir
	 * @property string $templates_dir
	 * @property string $assets_dir
	 * @property string $images_dir
	 * @property string $css_dir
	 * @property string $js_dir
	 * @property string $this_dir
	 *
	 */
	trait Module_Directories_Generator_Trait {


		function register_module_directories() {

			$this->register_dirs( array(
				$this->modules_dir,
				$this->includes_dir,
				$this->assets_dir,
				$this->images_dir,
				$this->css_dir,
				$this->js_dir,
			));

		}

		/**
		 * @return string
		 */
		function assets_dir() {

			return "{$this->this_dir}/assets";

		}

		/**
		 * @return string
		 */
		function includes_dir() {

			return "{$this->this_dir()}/includes";

		}

		/**
		 * @return string
		 */
		function templates_dir() {

			return "{$this->this_dir}/templates";

		}

		/**
		 * @return string
		 */
		function images_dir() {

			return "{$this->assets_dir}/images";

		}

		/**
		 * @return string
		 */
		function css_dir() {

			return "{$this->assets_dir}/css";

		}

		/**
		 * @return string
		 */
		function js_dir() {

			return "{$this->assets_dir}/js";

		}

	}

}
