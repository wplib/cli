<?php

namespace WPLib_CLI {

	use \JSON_Loader\Generator;

	/**
	 * Class Post_Type_Generator
	 *
	 * @property Post_Type $object
	 */
	class Post_Type_Generator extends Generator {

		const SLUG = 'post-type';

		function register() {

			$this->register_dirs( array(

				'{module_dir}',
				'{includes_dir}',

			));

			$this->register_output_file( 'post-type-module', '{module_file}' );
			$this->register_output_file( 'post-type-item',   '{includes_dir}/class-{singular_slug}.php' );
			$this->register_output_file( 'post-type-model',  '{includes_dir}/class-{singular_slug}-model.php' );
			$this->register_output_file( 'post-type-view',   '{includes_dir}/class-{singular_slug}-view.php' );

			$this->register_generator( 'post_type', $this->object );

		}

		/**
		 * @return App
		 */
		function app() {

		 	return $this->object->__parent__->app;

		}

		/**
		 * @return string
		 */
		function generated_args() {

			$post_type = $this->object;

			$args = $post_type->post_type_args();

			$args = $post_type->filter_default_values( $args );

			$args = $post_type->explode_args( $args );

			return trim( $this->get_generated_args( $args ) );

		}

	}

}
