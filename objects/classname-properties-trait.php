<?php
/**
 *
 */
namespace WPLib_CLI {

	use JsonLoader\Util;

	/**
	 * Class Classname_Properties_Trait
	 *
	 * @package WPLib_CLI
	 * @mixin Post_Type|Taxonomy
	 * @mixin App_Properties_Trait
	 *
	 * @property string $singular_class_name
	 * @property string $plural_class_name
	 */
	trait Classname_Properties_Trait {

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
