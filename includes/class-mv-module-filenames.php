<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class Rewrite
	 *
	 * @see     http://codex.wordpress.org/Function_Reference/register_post_type#rewrite
	 *
	 * @package WPLib_CLI
	 */
	class MV_Module_Filenames extends JSON_Loader\Data_Object {

		var $namespace = 'WPLib_CLI';

		var $schema = array(

			'module_file' => 'type=string',
			'item_file'   => 'type=string',
			'model_file'  => 'type=string',
			'view_file'   => 'type=string',

		);
	}

}
