<?php

namespace WPLib_CLI {

	use \JSON_Loader\Util;

	/**
	 * Class Theme
	 *
	 * @property string $theme_dir
	 */
	class Theme extends Object {

		const SLUG = 'theme';

		/**
		 * @param boolean|string $theme_dir
		 *
		 * @return string
		 */
		function theme_dir( $theme_dir = false ) {

			return $theme_dir ? $theme_dir : $this->get_filepath();

		}

	}

}

