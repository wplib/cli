<?php
/**
 *
 */
namespace WPLib_CLI {

	use JsonLoader\Util;

	/**
	 * Trait App_Properties_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \JsonLoader\Object
	 *
	 */
	trait App_Properties_Trait {

		/**
		 * @return null|Object
		 */
		function app_project_dir() {

			return $this->get_ancestor( 'app', 'project_dir' );

		}

	}

}
