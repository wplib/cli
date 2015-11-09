<?php

namespace WPLib_CLI {

	use \JSON_Loader\Util;

	/**
	 * Class App_Generator
	 *
	 * @property App    $object
	 * @property string $app_file
	 * @property string $app_dir
	 * @property string $app_slug
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
	 */
	class App_Generator extends Generator {

		const SLUG = App::SLUG;

		use Module_Directories_Generator_Trait;

		function register() {

			/**
			 * Call Module_Directories_Generator_Trait->register_module_directories()
			 * Apps have the same directory structure
			 */
			self::register_module_directories();

			$this->register_output_file( 'app', $this->app_file() );

			$this->register_generator( 'post-types', $this->object->post_types, array(
				'element_slug'  => Post_Type::SLUG,
			));

			$this->register_generator( 'taxonomies', $this->object->taxonomies, array(
				'element_slug'  => Taxonomy::SLUG,
			));

		}

		/**
		 * @return string
		 */
		function app_file() {

			return "{$this->this_dir()}/{$this->this_slug()}.php";

		}

		/**
		 * @return string
		 */
		function modules_dir() {

			return "{$this->this_dir()}/modules";

		}

	}

}
