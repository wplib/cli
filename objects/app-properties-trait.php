<?php
/**
 *
 */
namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Trait App_Properties_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \JSON_Loader\Object
	 *
	 */
	trait App_Properties_Trait {

		/**
		 * @return null|Object
		 */
		function app_root_dir() {

			return $this->get_ancestor( 'app', 'root_dir' );

		}

	}

}
