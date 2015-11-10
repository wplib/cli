<?php
/**
 * Namespace WPLib_CLI\Generate\Traits
 */
namespace WPLib_CLI\Generate\Traits {

	/**
	 * Trait Object_Plural
	 *
	 * @package WPLib_CLI
	 *
	 * @property string $singular
	 * @property string $plural
	 *
	 */
	trait Object_Plural {

		/**
		 * Returns Plural name
		 *
		 * If empty $value then Adds 'ies' to the end of $this->singular if it ends with 'y', or 's' to the end otherwise.
		 *
		 * @param boolean|string $value
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
