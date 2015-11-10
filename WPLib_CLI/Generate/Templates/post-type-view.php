<?php
/**
 * @var \WPLib_CLI\Generate\Generators\Post_Type $generator
 * @var \WPLib_CLI\Generate\Objects\Post_Type $post_type
 */

WPLib_CLI::instance()->load_template( 'includes/model-view-view', array(
	'class_name' => $generator->singular_class_name,
	'base_class' => 'WPLib_Post_View_Base',
));


