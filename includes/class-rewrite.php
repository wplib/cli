<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class Rewrite
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#rewrite
	 *
	 * @package WPLib_CLI
	 */
	class Rewrite extends JSON_Loader\Data_Object {

		var $namespace = 'WPLib_CLI';

		var $schema = array(

			'slug'                 => 'type=string',
			'with_front'           => 'type=boolean',
			'feeds'                => 'type=boolean',
			'pages'                => 'type=boolean',
			'ep_mask'              => 'type=string',

		);
	}

}
