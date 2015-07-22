<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Post_Type_Generator
	 *
	 * @property Object|Post_Type $object
	 */
	class Post_Type_Generator extends Model_View_Generator {

		use Generator_Naming_Trait;

		const SLUG = Post_Type::SLUG;

		/**
		 * @todo Do we even need to register this?
		 */
		function register() {

			parent::register();

			$this->initialize( $this->object, $this );

		}

	}

}
