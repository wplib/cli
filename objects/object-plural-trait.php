<?php
/**
 *
 */
namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Object_Plural_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @property string $singular
	 * @property string $plural
	 *
	 */
	trait Object_Plural_Trait {

		/**
		 * Returns Plural name
		 *
		 * If empty $value then Adds 'ies' to the end of $this->singular if it ends with 'y', or 's' to the end otherwise.
		 *
		 * @param bool|string $value
		 *
		 * @return string
		 */
		function plural( $value = false ) {

			if ( ! $value ) {

				$value = 'y' === substr( $this->singular, -1 )
					? substr( $this->singular, 0, -1 ) . 'ies'
					: "{$this->singular}s";

			}

			return $value;

		}


	}

}
