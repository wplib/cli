<?php

/**
 * Namespace WPLib_CLI\Generate\Objects
 */
namespace WPLib_CLI\Generate\Objects {

	use JSON_Loader\Object_List;
	use WPLib_CLI\generate\Base;
	use WPLib_CLI\generate\Traits;

	/**
	 * Class App
	 *
	 * @property string $singular
	 * @property Post_Type[] $post_types
	 * @property Taxonomy[] $taxonomies
	 * @property User_Role[] $user_roles
	 *
	 */
	class App extends Base\Object {

		const SLUG = 'app';

		use Traits\Meta_Properties;

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
		function get_module_list() {

			return new Object_List( $this->get_modules() );

		}

		/**
		 * @return string[]
		 */
		private function get_modules() {

			$modules = array();

			/**
			 * @var Post_Type $post_type
			 */
			foreach ( $this->post_types as $post_type_object ) {

				$modules[] = new Base\Module( array(
					"slug" => "post-type-{$post_type_object->slug}",
					"object" => $post_type_object,
				), $this );

			}
			/**
			 * @var Taxonomy $taxonomy
			 */
			foreach ( $this->taxonomies as $taxonomy_object ) {

				$modules[] = new Base\Module( array(
					"slug" => "taxonomy-{$taxonomy_object->slug}",
					"object" => $taxonomy_object,
				), $this );

			}

			return $modules;

		}

	}

}

