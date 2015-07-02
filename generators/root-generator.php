<?php

namespace WPLib_CLI {

	/**
	 * Class Root_Generator
	 *
	 * @package WPLib_CLI
	 *
	 */
	class Root_Generator extends Generator {

		const SLUG = 'root';

		function register() {

			parent::register();

			$this->register_generator( Theme::SLUG, $this->theme() );

			$this->register_generator( App::SLUG, $this->app() );

		}

	}

}
