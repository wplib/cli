<?php

/**
 * Namespace WPLib_CLI\Generate\Objects
 */
namespace WPLib_CLI\Generate\Objects {

	use WPLib_CLI\Generate\Base;
	use WPLib_CLI\Generate\Objects;
	use WPLib_CLI\Generate\Traits;

	/**
	 * Class Theme
	 *
	 * @property string $theme_dir
	 * @property string $theme_name
	 */
	class Theme extends Base\Object {

		const SLUG = 'theme';

		use Traits\Meta_Properties;

		/**
		 * @param boolean|string $theme_dir
		 *
		 * @return string
		 */
		function theme_dir( $theme_dir = false ) {

			return $theme_dir ? $theme_dir : $this->get_filepath();

		}

		/**
		 * @param string $theme_name
		 *
		 * @return string
		 */
		function theme_name( $theme_name ) {

			return $theme_name ? $theme_name : "{$this->meta_name()}_Theme";

		}

	}

}

