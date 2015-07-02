<?php

namespace WPLib_CLI {

	/**
	 * Class Theme_Generator
	 *
	 * @package WPLib_CLI
	 *
	 * @property $theme_dir
	 * @property $theme_file
	 */
	class Theme_Generator extends Generator {

		const SLUG = Theme::SLUG;

		/**
		 *
		 */
		function register() {

			parent::register();

			$this->register_dirs( $this->theme_dir );

			$this->register_output_file( self::SLUG, $this->theme_file() );

		}

		/**
		 * @return string
		 */
		function theme_file() {

			return "{$this->theme_dir}/wplib-theme.php";

		}

	}

}
