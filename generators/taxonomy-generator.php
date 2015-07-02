<?php

namespace WPLib_CLI {

	/**
	 * Class Taxonomy_Generator
	 *
	 *
	 * @property Object|Taxonomy $object
	 */
	class Taxonomy_Generator extends Model_View_Generator {

		const SLUG = 'taxonomy';

		const UNIQUE_ID = 'singular_slug';


		/**
		 * @todo Do we even need to register this?
		 */
		function register() {

			parent::register();

			$this->initialize( $this->object, $this );

		}


	}

}
