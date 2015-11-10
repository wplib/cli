<?php

/**
 * Namespace WPLib_CLI\Generate\Objects
 */
namespace WPLib_CLI\Generate\Objects {

	use WPLib_CLI\Generate\Base;

	/**
	 * Class Rewrite
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#rewrite
	 *
	 * @property string $slug
	 * @property boolean $with_front
	 * @property boolean $feeds
	 * @property boolean $pages
	 * @property string $ep_mask
	 *
	 */
	class Rewrite extends Base\Object {

		const SLUG = 'rewrite';

	}

}
