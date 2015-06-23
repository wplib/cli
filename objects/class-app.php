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


	}

}

