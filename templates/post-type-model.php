<?php
/**
 * @var \WPLib_CLI\Post_Type_Generator $generator
 * @var \WPLib_CLI\Post_Type $post_type
 */

WPLib_CLI::load( 'includes/model-view-model', array(
	'class_name' => $generator->singular_class_name,
	'base_class' => 'WPLib_Post_Model_Base',
));

