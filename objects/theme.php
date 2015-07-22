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
		 * @param bool|string $theme_dir
		 *
		 * @return string
		 */
		function theme_dir( $theme_dir = false ) {

			if ( ! $theme_dir ) {

				/**
				 * @var Object|Theme $theme
				 */
				$theme = $this;

				$state = Util::get_state( $theme );

				$dir = $state->object_parent->root_dir;

				if ( ! preg_match( '#^(~|/)$#', $dir[ 0 ] ) ) {

					/**
					 * Normalize directory format.
					 * @todo Make work for Windows.
					 */

					$dir = "~/{$dir}";

				}
				/**
				 * Replace leading '~/' with Current Working Directory
				 * @todo Need to move logic to a root_dir() and set_root_dir() methods in \JSON_Loader\Util.
				 */
				$theme_dir = preg_replace( '#^~/(.*)$#', getcwd() . '/$1', $dir );

			}

			return $theme_dir;

		}

	}

}

