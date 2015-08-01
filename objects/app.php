<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class App
	 *
	 * @property Post_Type[] $post_types
	 * @property Taxonomy[] $taxonomies
	 * @property User_Role[] $user_roles
	 *
	 */
	class App extends Object {

		const SLUG = 'app';

		/**
		 * @param Post_Type[] $post_types
		 * @return Post_Type[]
		 */
		function post_types( $post_types = null ) {

			if ( ! is_array( $post_types ) ) {

				$post_types = Util::root()->app->post_types;

			}

			/**
			 * @var Post_Type $post_type
			 */
			foreach ( $post_types as $index => $post_type ) {

				unset( $post_types[ $index ] );
				$post_types[ $post_type->post_type() ] = $post_type;

			}

			return $post_types;

		}

	}

}

