<?php
/**
 * Namespace WPLib_CLI\Generate\Traits
 */
namespace WPLib_CLI\Generate\Traits {

	use JSON_Loader\Util;

	/**
	 * Trait Object_Slugs
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \WPLib_CLI\Generate\Base\Object
	 * @mixin Meta_Properties;
	 *
	 * @constant SLUG
	 *
	 * @property string $singular_slug
	 * @property string $plural_slug
	 *
	 */
	trait Object_Slugs {

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
