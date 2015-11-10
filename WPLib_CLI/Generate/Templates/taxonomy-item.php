<?php
/**
 * @var \WPLib_CLI\Generate\Generators\Taxonomy $generator
 */

WPLib_CLI::instance()->load_template( 'includes/model-view-item', array(

	'constant_name'       => 'TAXONOMY',
	'singular_class_name' => $generator->singular_class_name,
	'plural_class_name'   => $generator->plural_class_name,
	'base_class'          => 'WPLib_Term_Base',

));

