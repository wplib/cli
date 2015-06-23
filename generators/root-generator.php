<?php

namespace WPLib_CLI {

	class Root_Generator extends \JSON_Loader\Generator {

		const SLUG = 'root';

		function register() {

			$this->register_generator( 'theme', $this->object->theme, 'Theme_Generator' );
			$this->register_generator( 'app', $this->object->app, 'App_Generator' );

		}

	}

}
