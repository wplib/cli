<?php
/**
 * Namespace WPLib_CLI\Generate\Traits
 */
namespace WPLib_CLI\Generate\Traits {

	/**
	 * Trait Meta_Properties
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \WPLib_CLI\Generate\Base\Object
	 *
	 */
	trait Meta_Properties {

		function meta_name() {

			return $this->meta->name;

		}

		function meta_prefix() {

			return $this->meta->prefix;

		}

		function meta_slug() {

			return $this->meta->slug;

		}

		function meta_text_domain() {

			return $this->meta_slug();

		}

	}

}
