<?php
/**
 *
 */
namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Generator_Naming_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @property Object $name
	 * @property Object $object
	 *
	 * @property string $singular_class_name
	 * @property string $plural_class_name
	 */
	trait Generator_Naming_Trait {

		/**
		 * @param string $suffix
		 * @return string
		 */
		function get_class_name_base( $suffix ) {

			return Util::underscorify( "{$this->name}_{$suffix}" );

		}

		/**
		 * @param bool|string $class_name
		 *
		 * @return string
		 */
		function singular_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->get_class_name_base( $this->object->singular );

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

				$class_name = $this->get_class_name_base( $this->object->plural );

			}

			return $class_name;

		}

	}

}
