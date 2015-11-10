<?php

namespace WPLib_CLI {

	use \JSON_Loader;
	use \JSON_Loader\Property;
	use \JSON_Loader\Util;

	/**
	 * Class Generator
	 *
	 * @property string $object_type
	 * @property string $name
	 * @property string $slug
	 * @property string $project_dir
	 * @property string $prefix
	 * @property string $text_domain
	 * @property \WPLib_CLI\Object $object
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
		 * @return string
		 */
		function this_slug() {

			return $this->object->this_slug();

		}


		/**
		 * @return string
		 */
		function this_name() {

			return $this->object->this_name();

		}

		/**
		 * @return string
		 */
		function this_prefix() {

			return $this->object->this_prefix();

		}

		/**
		 * @return string
		 */
		function this_text_domain() {

			return $this->object->this_text_domain();

		}
	}

}
