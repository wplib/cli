<?php

namespace WPLib_CLI {

	class App_Generator extends \JSON_Loader\Generator {

		const SLUG = 'app';

		function register() {

			$this->register_dirs( array(

				'{app->app_dir}',
				'{app_dir}/modules',
				'{app_dir}/assets',
				'{app_dir}/assets/images',
				'{app_dir}/assets/css',
				'{app_dir}/assets/js',

			));

			$this->register_output_file( '{app_dir}/{slug}-app.php' );

			self::register_generator( 'post_type', $this->object->post_types, array(
				'property_name' => 'post_types'
			));


		}


	}

}
