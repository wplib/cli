<?php

/**
 * Namespace WPLib_CLI\Generate\Objects
 */
namespace WPLib_CLI\Generate\Objects {

	use WPLib_CLI\Generate\Base;

	/**
	 * Class Site
	 *
	 * @property string $host
	 * @property string $ip_address     { @default 192.168.99.99 }
	 * @property string $box            { @default wplib/box }
	 *
	 */
	class Site extends Base\Object {

		const SLUG = 'site';

		function host( $host ) {

			return $host ? $host : "{$this->get_meta_slug()}.dev";

		}

	}

}

