<?php

namespace WPLib_CLI {

	use \JSON_Loader\Util;

	/**
	 * Class Project_Generator
	 *
	 * @property Meta   $meta
	 * @property Site   $site
	 * @property App    $app
	 * @property Theme  $theme
	 */
	class Project_Generator extends Generator {

		const SLUG = 'project';

		function register() {

			//$this->register_generator( 'site',  $this->site );
			$this->register_generator( 'app',   $this->app );
			//$this->register_generator( 'theme', $this->app );

		}

		/**
		 * @return string
		 */
		function project_dir() {

			return $this->object->get_filepath();

		}

	}

}
