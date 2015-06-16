<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class App
	 *
	 * @package WPLib_CLI
	 */
	class App extends JSON_Loader\Data_Object {

		var $namespace = 'WPLib_CLI';

		var $schema = array(

			'app_dir'    => 'required=1',
			'app_file'   => 'required=1',
			'post_types' => 'type=array[Post_Type]',
			'taxonomies' => 'type=array[Taxonomy]',
			'user_roles' => 'type=array[User_Role]',

		);


	}

}

