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

	}

}
