<?php
/**
 *
 */
namespace WPLib_CLI {

	use JsonLoader\Util;

	/**
	 * Trait Object_Slugs_Trait
	 *
	 * @package WPLib_CLI
	 * @mixin \WPLib_CLI\Object
	 * @mixin Meta_Properties_Trait;
	 * @constant SLUG
	 * @property string $singular
	 * @property string $singular_slug
	 *
	 */
	trait Object_Slugs_Trait {

		/**
		 * @param boolean|string $slug
		 *
		 * @return string
		 */
		function singular_slug( $slug = false ) {

			if ( ! $slug ) {

				$slug = strtolower( Util::dashify( Util::strip_prefix( $this->get_unique_id(), $this->meta_prefix() ) ) );

			}
			return $slug;

		}

		/**
		 * @param boolean|string $slug
		 *
		 * @return string
		 */
		function plural_slug( $slug ) {

			return $slug ? $slug : "{$this->singular_slug}s";

		}

	}

}
