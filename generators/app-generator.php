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

			$this->register_output_file( 'app', '{app_dir}/{slug}-app.php' );

			$this->register_generator( 'post_types', $this->object->post_types, array(
				'element_slug'  => 'post-type',
			));


		}


	}

}
