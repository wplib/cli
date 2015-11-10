<?php

/**
 * @var \WPLib_CLI\Generate\Generators\Taxonomy $generator
 * @var \WPLib_CLI\Generate\Objects\Taxonomy $taxonomy
 */

WPLib_CLI::instance()->load_template( 'includes/model-view-view', array(
	'class_name' => $generator->singular_class_name,
	'base_class' => 'WPLib_Term_View_Base',
));


