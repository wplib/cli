<?php

namespace WPLib_CLI {

	/**
	 * Class Root_Generator
	 *
	 * @package WPLib_CLI
	 *
	 * @property string $wplib_dir
	 */
	class Root_Generator extends Generator {

		const SLUG = 'root';



		function register() {

			parent::register();
			/**
			 * @todo Add some way to checkout WPLib to this dir, if not there.
			 */
			$this->register_dirs( $this->wplib_dir );

			$this->register_generator( Theme::SLUG, $this->theme() );

			$this->register_generator( App::SLUG, $this->app() );

		}


		/**
		 * @return string
		 */
		function wplib_dir() {

			return "{$this->theme->theme_dir}/wplib";

		}

	}

}
