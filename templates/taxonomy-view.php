<?php
/**
 * @var \WPLib_CLI\Taxonomy_Generator $generator
 * @var \WPLib_CLI\Taxonomy $taxonomy
 */

WPLib_CLI::instance()->load_template( 'includes/model-view-view', array(
	'class_name' => $generator->singular_class_name,
	'base_class' => 'WPLib_Term_View_Base',
));


