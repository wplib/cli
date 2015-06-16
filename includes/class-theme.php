<?php

namespace WPLib_CLI;

use JSON_Loader;

class Theme extends JSON_Loader\Data_Object {

	var $namespace = 'WPLib_CLI';

	var $schema = array(

		'site_name'    => 'required=1',
		'prefix'       => 'required=1',
		'short_prefix' => 'required=1',
		'themes_dir'   => 'required=1',
		'theme_slug'   => 'required=1',
		'theme_file'   => '',
		'text_domain'  => '',
		'app'          => 'type=array[App]',

	);

}


