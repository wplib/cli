<?php

namespace WPLib_CLI {

	use \JSON_Loader;

	/**
	 * Class Object
	 *
	 * @property string $type
	 * @property string $name
	 * @property string $prefix
	 * @property string $slug
	 * @property string $root_dir
	 * @property string $text_domain       { @default $slug }
	 */
	class Object extends JSON_Loader\Object {

		const SLUG = 'root';

		const ID_FIELD = 'slug';

		function type( $type ) {

			return $type ? $type : static::SLUG;

		}

	}
}
