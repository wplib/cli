<?php

namespace WPLib_CLI {

	use JsonLoader\Util;
	/**
	 * Class Taxonomy_Generator
	 *
	 * @property Object|Taxonomy $object
	 * @property string $object_type_php
	 *
	 */
	class Taxonomy_Generator extends Model_View_Generator {

		const SLUG = Taxonomy::SLUG;

		/**
		 * @return string
		 */
		function object_type_php() {

			$class_names = array();

			foreach( $this->get_post_type_objects() as $post_type ) {

				$class_names[] = $post_type->singular_class_name;

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
		 * @return Post_Type[]
		 */
		private function get_post_type_objects() {

			$post_types = $this->object->post_types;

			foreach( $post_types as $index => $post_type ) {
				/**
				 * @var App $app
				 */
				$app = $this->parent;

				foreach( $app->post_types as $post_type_object ) {

					$object_post_type =  Util::strip_prefix(
						$post_type_object->post_type,
						$this->this_prefix()
					);

					if ( $object_post_type === $post_type ) {

						$post_types[ $index ] = $post_type_object;

					}

				}

			}

			return $post_types;

		}

	}

}
