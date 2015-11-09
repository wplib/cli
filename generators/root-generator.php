<?php

namespace WPLib_CLI {

	use \JSON_Loader\Util;

	/**
	 * Class Root_Generator
	 *
	 * @property Meta   $meta
	 * @property Site   $site
	 * @property App    $app
	 * @property Theme  $theme
	 */
	class Root_Generator extends Generator {

		const SLUG = 'root';

		function register() {

			//$this->register_generator( 'site',  $this->site );
			$this->register_generator( 'app',   $this->app );
			//$this->register_generator( 'theme', $this->app );

		}

		/**
		 * @return string
		 */
		function root_dir() {

			return $this->object->get_filepath();

		}

	}

}
