<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;
	use JSON_Loader\Object_List;

	/**
	 * Class App
	 *
	 * @property string $singular
	 * @property Post_Type[] $post_types
	 * @property Taxonomy[] $taxonomies
	 * @property User_Role[] $user_roles
	 *
	 */
	class App extends Object {

		const SLUG = 'app';

		use Meta_Properties_Trait;

		/**
		 * @param string $singular
		 * @return string
		 */
		function singular( $singular ) {

			return $singular ? $singular : $this->meta_name();

		}

		/**
		 * @param Post_Type[] $post_types
		 * @return Post_Type[]
		 */
		function post_types( $post_types ) {

			/**
			 * @var Post_Type $post_type
			 */
			foreach ( $post_types as $index => $post_type ) {

				unset( $post_types[ $index ] );
				$post_types[ $post_type->post_type ] = $post_type;

			}

			return $post_types;

		}

		/**
		 * @param Taxonomy[] $taxonomies
		 * @return Taxonomy[]
		 */
		function taxonomies( $taxonomies ) {

			/**
			 * @var taxonomy $taxonomy
			 */
			foreach ( $taxonomies as $index => $taxonomy ) {

				unset( $taxonomies[ $index ] );
				$taxonomies[ $taxonomy->taxonomy ] = $taxonomy;

			}

			return $taxonomies;

		}

		/**
		 * @return Object_List
		 */
		function module_list() {

			return new Object_List( $this->modules() );

		}

		/**
		 * @return string[]
		 */
		function modules() {

			$modules = array();

			/**
			 * @var Post_Type $post_type
			 */
			foreach ( $this->post_types as $post_type => $post_type_object ) {

				$modules[] = "post-type-{$post_type}";

			}
			/**
			 * @var Taxonomy $taxonomy
			 */
			foreach ( $this->taxonomies as $taxonomy => $taxonomy_object ) {

				$modules[] = "taxonomy-{$taxonomy}";

			}

			return $modules;

		}

	}

}

