<?php
/**
 * @var \WPLib_CLI\Taxonomy_Generator $generator
 * @var \WPLib_CLI\Taxonomy $taxonomy
 */

WPLib_CLI::get_instance()->load_template( 'includes/model-view-model', array(
	'class_name' => $generator->singular_class_name,
	'base_class' => 'WPLib_Term_Model_Base',
));

