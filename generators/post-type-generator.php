<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;
	/**
	 * Class Post_Type_Generator
	 *
	 * @property Object|Post_Type $object
	 * @property string $singular_class_name
	 * @property string $plural_class_name
	 */
	class Post_Type_Generator extends Model_View_Generator {

		const SLUG = Post_Type::SLUG;

		const UNIQUE_ID = 'singular_slug';

		/**
		 * @todo Do we even need to register this?
		 */
		function register() {

			parent::register();

			$this->initialize( $this->object, $this );

		}


		/**
		 * @return string
		 */
		function class_name_base( $suffix ) {

			return Util::underscorify( "{$this->root()->prefix}_{$suffix}" );

		}

		/**
		 * @param bool|string $class_name
		 *
		 * @return string
		 */
		function singular_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->class_name_base( $this->object->singular );

			}

			return $class_name;

		}

		/**
		 * @param bool|string $class_name
		 *
		 * @return string
		 */
		function plural_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->class_name_base( $this->object->plural );

			}

			return $class_name;

		}


	}

}
