<?php

/**
 * Namespace WPLib_CLI\Generate\Traits
 */
namespace WPLib_CLI\Generate\Traits {

	use JSON_Loader\Util;
	use WPLib_CLI\Generate\Objects;
	use WPLib_CLI\Generate\Traits;

	/**
	 * Class Classname_Properties
	 *
	 * @package WPLib_CLI
	 * @mixin Objects\Post_Type|Objects\Taxonomy
	 * @mixin Traits\App_Properties
	 *
	 * @property string $singular_class_name
	 * @property string $plural_class_name
	 */
	trait Classname_Properties {

		/**
		 * @param boolean|string $class_name
		 *
		 * @return string
		 */
		function singular_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->classnamify( $this->singular );

			}

			return $class_name;

		}

		/**
		 * @param boolean|string $class_name
		 *
		 * @return string
		 */
		function plural_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->classnamify( $this->plural );

			}

			return $class_name;

		}

		/**
		 * @param string $suffix
		 * @return string
		 */
		function classnamify( $suffix ) {

			return Util::underscorify( "{$this->this_name()}_{$suffix}", false );

		}

	}

}
