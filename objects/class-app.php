<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class App
	 *
	 * @property string $app_dir
	 * @property string $app_file
	 * @property Post_Type[] $post_types
	 * @property Taxonomy[] $taxonomies
	 * @property User_Role[] $user_roles
	 *
	 */
	class App extends JSON_Loader\Object {

		const SLUG = 'app';


		function app_dir( $app_dir ) {

			return $app_dir ? $app_dir : "{$this->__parent__->theme->theme_dir}/wplib-app";

		}

		function app_file( $app_file ) {

			return $app_file ? $app_file : "{$this->app_dir}/{$this->__parent__->slug}-app.php";

		}


	}

}

