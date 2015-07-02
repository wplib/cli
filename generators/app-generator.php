<?php

namespace WPLib_CLI {

	use \JSON_Loader\Util;

	/**
	 * Class App_Generator
	 *
	 * @property string $root_dir
	 * @property string $app_dir
	 * @property string $modules_dir
	 * @property string $app_file
	 * @property App $object
	 *
	 */
	class App_Generator extends Generator {

		const SLUG = App::SLUG;

		function register() {

			$this->register_dirs( $this->app_dir );

			$this->register_output_file( 'app', $this->app_file );

			$this->register_generator( 'post-types', $this->object->post_types, array(
				'element_slug'  => Post_Type::SLUG,
			));


		}

		/**
		 * @return string
		 */
		function app_file() {

			$root = Util::root();
			$app_file = "{$this->app_dir}/{$root->slug}-app.php";

			return $app_file;

		}

		/**
		 * @return string
		 */
		function app_dir() {

			$app_dir = "{$this->root_dir}/wplib-app";

			return $app_dir;

		}

		/**
		 * @return string
		 */
		function modules_dir() {

			return "{$this->app_dir}/modules";

		}


	}

}
