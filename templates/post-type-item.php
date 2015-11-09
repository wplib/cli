<?php

WPLib_CLI::instance()->load_template( 'includes/model-view-item', array(

	'constant_name'       => 'POST_TYPE',
	'singular_class_name' => $generator->singular_class_name,
	'plural_class_name'   => $generator->plural_class_name,
	'base_class'          => 'WPLib_Post_Base',

));

