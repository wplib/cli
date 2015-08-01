<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;
	/**
	 * Class Taxonomy_Generator
	 *
	 * @property Object|Taxonomy $object
	 * @property string $object_type_php
	 *
	 */
	class Taxonomy_Generator extends Model_View_Generator {

		use Generator_Naming_Trait;

		const SLUG = Taxonomy::SLUG;

		/**
		 * @return string
		 */
		function object_type_php() {

			$class_names = array();

			foreach( $this->_get_post_types( $this->object->object_type ) as $post_type ) {

				$generator = new Post_Type_Generator( $post_type, Util::root()->app );

				$class_names[] = $generator->singular_class_name;

			}
			if ( 1 == count( $class_names ) ) {

				$object_type_php = "{$class_names[ 0 ]}::POST_TYPE";

			} else {

				$object_type_php =
					'array( ' .
					implode( '::POST_TYPE, ', $class_names ) .
					'::POST_TYPE )';
			}

			return $object_type_php;

		}


		/**
		 * @param string[] $slugs
		 *
		 * @return Post_Type[]
		 */
		private function _get_post_types( $slugs ) {

			if ( is_string( $slugs ) ) {

				$slugs = array( $slugs );

			}

			$root = Util::root();

			$post_types = $root->app->post_types;

			foreach( $post_types as $post_type_slug => $post_type ) {

				$slug = Util::strip_prefix( $post_type_slug, $root->short_prefix );

				if ( ! in_array( $slug, $slugs ) ) {

					unset( $post_types[ $post_type_slug ] );

				}

			}

			return $post_types;

		}

	}

}
