<?php

namespace WPLib_CLI;

use \Typed_Config;

/**
 * Class Rewrite
 *
 * @see http://codex.wordpress.org/Function_Reference/register_post_type#rewrite
 *
 * @package WPLib_CLI
 */
class Rewrite extends Typed_Config\Data {

	/**
	 * @var string
	 */
	var $slug;

	/**
	 * @var bool
	 */
	var $with_front;

	/**
	 * @var bool
	 */
	var $feeds;

	/**
	 * @var bool
	 */
	var $pages;

	/**
	 * @var string
	 */
	var $ep_mask;

}
