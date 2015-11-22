<?php
/**
 *
 */
namespace WPLib_CLI {

	use JsonLoader\Util;

	/**
	 * Trait Meta_Properties_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @mixin \WPLib_CLI\Object
	 *
	 */
	trait Meta_Properties_Trait {

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
