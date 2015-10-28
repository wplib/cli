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

		use Generator_Directory_Trait;

		function register() {

			/**
			 * Call Generator_Directory_Trait->register()
			 */
			parent::register();

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

			return "{$this->app_dir}/{$this->app_slug}.php";

		}

		/**
		 * @return string
		 */
		function modules_dir() {

			return "{$this->app_dir}/modules";

		}

		/**
		 * @return string
		 */
		function app_dir() {

			return $this->root_dir;

		}

		/**
		 * @return string
		 */
		function app_slug() {

			return Util::dashify( strtolower( $this->object->name ));

		}

	}

}
