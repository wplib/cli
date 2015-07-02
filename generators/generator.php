<?php

namespace WPLib_CLI {

	use \JSON_Loader;
	use \JSON_Loader\Util;

	/**
	 * Class Module_Generator
	 *
	 * @property string $module_dir

	 * @property Root $object
	 * @property string $modules_dir
	 * @property string $theme_dir
	 * @property string $app_dir
	 */
	abstract class Generator extends \JSON_Loader\Generator {

		/**
		 * Stub method so child can safely call its parent
		 * Might want to put something here later, though.
		 */
		function register() {

		 	parent::register();

		}

		/**
		 * @return Object|Theme
		 */
		function theme() {

			return Util::root()->theme;

		}

		/**
		 * @return Object|App
		 */
		function app() {

			return Util::root()->app;

		}

		/**
		 * @return string
		 */
		function theme_dir() {

			return $this->theme()->theme_dir;

		}

		/**
		 * @return string
		 */
		function app_dir() {

			return $this->app()->app_dir;

		}

	}

}
