<?php

namespace WPLib_CLI {

	/**
	 * Class Root_Generator
	 *
	 * @package WPLib_CLI
	 */
	class Root_Generator extends \JSON_Loader\Generator {

		const SLUG = 'root';

		function register() {

			$this->register_generator( 'theme', $this->object->theme, array(
				'generator_class' => 'Theme_Generator',
			));

			$this->register_generator( 'app', $this->object->app, array(
				'generator_class' => 'App_Generator',
			));

		}

	}

}
