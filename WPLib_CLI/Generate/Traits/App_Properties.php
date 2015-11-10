<?php
/**
 * Namespace WPLib_CLI\Generate\Traits
 */
namespace WPLib_CLI\Generate\Traits {

	use WPLib_CLI\Generate\Base;

	/**
	 * Trait App_Properties
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \WPLib_CLI\Generate\Base\Object
	 *
	 */
	trait App_Properties {

		/**
		 * @return Base\Object|null
		 */
		function app_project_dir() {

			return $this->get_ancestor( 'app', 'project_dir' );

		}

	}

}
