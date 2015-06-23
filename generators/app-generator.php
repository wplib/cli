<?php

namespace WPLib_CLI {

	class App_Generator extends \JSON_Loader\Generator {

		const SLUG = 'app';

		function register() {

			/**
			 * @var App $app
			 */
			$app = $this->object;

			$this->register_subdirs( array(

				'{app->app_dir}',
				'{app_dir}/modules',
				'{app_dir}/assets',
				'{app_dir}/assets/images',
				'{app_dir}/assets/css',
				'{app_dir}/assets/js',

			));

			$this->register_output_file( '{theme->theme_dir}/wplib-app/{slug}-app.php' );

			self::register_generator( 'post_type', $app->post_types );


		}


	}

}
