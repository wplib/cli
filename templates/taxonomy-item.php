<?php
/**
 * @var \WPLib_CLI\Taxonomy_Generator $generator
 * @var \WPLib_CLI\Taxonomy $taxonomy
 */

WPLib_CLI::load( 'includes/model-view-item', array(

	'constant_name'       => 'TAXONOMY',
	'singular_class_name' => $generator->singular_class_name,
	'plural_class_name'   => $generator->plural_class_name,
	'base_class'          => 'WPLib_Term_Base',

));

