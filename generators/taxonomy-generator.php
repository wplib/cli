<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;
	/**
	 * Class Taxonomy_Generator
	 *
	 * @property Object|Taxonomy $object
	 */
	class Taxonomy_Generator extends Model_View_Generator {

		use Generator_Naming_Trait;

		const SLUG = Taxonomy::SLUG;

		/**
		 * @todo Do we even need to register this?
		 */
		function register() {

			parent::register();

			$this->initialize( $this->object, $this );

		}

	}

}
