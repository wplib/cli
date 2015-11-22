<?php
/**
 *
 */
namespace WPLib_CLI {

	use JsonLoader\Util;

	/**
	 * Trait Object_Property_Filter_Trait
	 *
	 * If value is null and no default set but a @missing was set
	 * use @missing as if the same value were set for @default.
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \JsonLoader\Object
	 *
	 */
	trait Object_Property_Filter_Trait {

		/**
		 * @param mixed $value
		 * @return mixed
		 * @param \JsonLoader\Property $property
		 */
		function _property_filter_( $value, $property ) {

			/**
			 * If value is null and no default set but a @missing was set
			 * use @missing as if the same value were set for @default.
			 */
			$value = $this->_filter_missing_( $value, $property );

			return $value;

		}

		/**
		 * @param mixed $value
		 * @return mixed
		 * @param \JsonLoader\Property $property
		 */
		private function _filter_missing_( $value, $property ) {

			if ( is_null( $value ) && ! is_null( $property->missing ) ) {

				$default = $property->missing;

				if ( $not = '!' === $default[0] ) {

					$default = trim( $default, '!' );

				}

				if ( preg_match( '#^\$(.*)$#', $default, $match ) ) {

					$back_reference = $match[1];

					$value = $this->get_value( $back_reference );

				} else if ( preg_match( '#^(true|false|null)$#', $default, $match ) ) {

					switch( $match[1] ) {
						case 'true':
							$value = true;
							break;
						case 'false':
							$value = false;
							break;
						case 'null':
							$value = null;
							break;
					}

				} else {

					$value = $default;

				}

				if ( $not ) {

					$value = ! $value;
				}

			}

			return $value;

		}

	}

}
