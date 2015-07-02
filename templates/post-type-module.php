<?php
/**
 * @var \WPLib_CLI\Post_Type_Generator $generator
 * @var \WPLib_CLI\Post_Type $post_type
 */

$initializers = $generator->get_initializers();

$labels = '$labels';

$class_name = $generator->plural_class_name;

echo <<< TEXT
<?php
/**
 * Class {$class_name}
 */
class {$class_name} extends WPLib_Post_Module_Base {

	const POST_TYPE = '{$post_type->post_type}';

	static function on_load() {

		$labels = self::register_post_type_labels( array(
			'name'          => __( '{$post_type->plural}', 'wplib' ),
			'singular_name' => __( '{$post_type->singular}', 'wplib' ),
		));

		self::register_post_type( array(
			'post_type' => static::POST_TYPE,
			'labels'    => $labels,
			{$initializers}
		));

		[@include(hook-comments)]

	}

}
{$class_name}::on_load();
TEXT;
