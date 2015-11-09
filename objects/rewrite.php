<?php

namespace WPLib_CLI {

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
	class Rewrite extends Object {

		function slug( $slug ) {
			echo '';
			return $slug;
		}
	}

}
