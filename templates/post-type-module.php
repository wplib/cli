<?php
/**
 * @var \WPLib_CLI\Post_Type $post_type
 * @var \WPLib_CLI\Post_Type_Generator $generator
 */

$generated_args = $generator->generated_args();

$labels = '$labels';

echo <<< TEXT
/**
 * Class {$post_type->plural_class_name}
 */
class {$post_type->plural_class_name} extends WPLib_Post_Module_Base {

	const POST_TYPE = '{$post_type->post_type}';

	static function on_load() {

		$labels = self::register_post_type_labels( array(
			'name'          => __( '{$post_type->plural}', 'wplib' ),
			'singular_name' => __( '{$post_type->singular}', 'wplib' ),
		));

		self::register_post_type( array(
			{$generated_args}
		));

	}

}
{$post_type->plural_class_name}::on_load();
TEXT;
