<?php

namespace WPLib_CLI {

	use \JSON_Loader;
	use \JSON_Loader\Property;
	use \JSON_Loader\Util;

	/**
	 * Class Generator
	 *
	 * @property string $name
	 * @property string $slug
	 * @property string $root_dir
	 * @property string $type
	 * @property string $prefix
	 * @property string $text_domain
	 */
	abstract class Generator extends \JSON_Loader\Generator {

		/**
		 * Stub method so child can safely call its object_parent
		 * Might want to put something here later, though.
		 */
		function register() {

			parent::register();

		}

		/**
		 * @param string $slug
		 * @return string
		 */
		function slug( $slug ) {

			return $slug ? $slug : strtolower( $this->name );

		}

		/**
		 * @param string $root_dir
		 * @return string
		 */
		function root_dir() {

			return getcwd();

		}

		/**
		 * @return Property[]
		 */
		function initializer_properties() {

			return Util::filter_default_values(
				parent::initializer_properties(),
				'wp_default'
			);

		}

		/**
		 * @return string
		 */
		function dashified_slug() {

			return Util::dashify( static::SLUG );
		}



//		function register() {
//			/**
//			 * @todo Add some way to checkout WPLib to this dir, if not there.
//			 */
//			$this->register_dirs( $this->wplib_dir );
//
//			$this->register_generator( Theme::SLUG, $this->theme() );
//
//			$this->register_generator( App::SLUG, $this->app() );
//
//		}
//
//		/**
//		 * @return string
//		 */
//		function wplib_dir() {
//
//			return "{$this->theme->theme_dir}/wplib";
//
//		}
//
//
//		/**
//		 * @return Object|Theme
//		 */
//		function theme() {
//
//			return Util::root()->theme;
//
//		}
//
//		/**
//		 * @return Object|App
//		 */
//		function app() {
//
//			return Util::root()->app;
//
//		}
//
//		/**
//		 * @return string
//		 */
//		function theme_dir() {
//
//			return $this->theme()->theme_dir;
//
//		}
//
//		/**
//		 * @return string
//		 */
//		function app_dir() {
//
//			return $this->app()->app_dir;
//
//		}


	}

}
