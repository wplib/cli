<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class Theme
	 *
	 * @property string $theme_dir
	 */
	class Theme extends JSON_Loader\Object {

		const SLUG = 'theme';

		function theme_dir( $theme_dir ) {

			if ( ! $theme_dir ) {

				/**
				 * @var Root $root
				 */
				$root = $this->parent;

				/**
				 * @todo getcwd() will need to change if we allow for running
				 * @todo wplib-cli in other than the site root.
				 */
				$theme_dir = getcwd() . "/{$root->themes_dir}/{$root->slug}";

			}

			return $theme_dir;

		}

	}

}

