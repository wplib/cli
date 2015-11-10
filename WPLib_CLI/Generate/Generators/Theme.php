<?php

namespace WPLib_CLI\Generate\Generators {

	use WPLib_CLI\Generate\Base;
	use WPLib_CLI\Generate\Objects;
	use WPLib_CLI\Generate\Traits;

	/**
	 * Class Theme
	 *
	 * @package WPLib_CLI
	 *
	 * @property $theme_dir
	 * @property $theme_file
	 */
	class Theme extends Base\Generator {

		const SLUG = Objects\Theme::SLUG;

		use Traits\Meta_Properties;

		/**
		 *
		 */
		function register() {

			parent::register();

			$this->register_dirs( $this->theme_dir() );

			$this->register_output_file( self::SLUG, $this->theme_file() );

		}

		/**
		 * @return string
		 */
		function theme_file() {

			return "{$this->theme_dir()}/{$this->meta_slug()}-theme.php";

		}

		/**
		 * @return string
		 */
		function theme_dir() {

			return $this->get_filepath();

		}

	}

}
