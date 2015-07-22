<?php
/**
 *
 */
namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Object_Slugs_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @constant SLUG
	 * @property string $singular
	 * @property string $singular_slug
	 *
	 */
	trait Object_Slugs_Trait {

		/**
		 * @param bool|string $slug
		 *
		 * @return string
		 */
		function singular_slug( $slug = false ) {

			if ( ! $slug ) {

				/**
				 * @var Object|Taxonomy $taxonomy
				 */
				$taxonomy = $this;

				$slug = strtolower( Util::dashify( Util::strip_prefix(

					Util::get_state_value( $taxonomy, static::SLUG ),

					Util::root()->short_prefix

				) ) );

			}
			return $slug;

		}

		/**
		 * @param bool|string $slug
		 *
		 * @return string
		 */
		function plural_slug( $slug ) {

			return $slug ? $slug : "{$this->singular_slug}s";

		}

	}

}
