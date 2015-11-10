<?php

namespace WPLib_CLI\Generate\Generators {

	use WPLib_CLI\Generate\Base;
	use WPLib_CLI\Generate\Objects;
	use WPLib_CLI\Generate\Traits;

	/**
	 * Class Project
	 *
	 * @property Base\Meta      $meta
	 * @property Objects\Site   $site
	 * @property Objects\App    $app
	 * @property Theme          $theme
	 */
	class Project extends Base\Generator {

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
