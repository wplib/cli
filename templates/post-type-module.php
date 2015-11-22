<?php
/**
 * @var \WPLib_CLI\Post_Type_Generator $generator
 * @var \WPLib_CLI\Post_Type $post_type
 */

echo <<< TEXT
<?php
/**
 * Class {$post_type->plural_class_name}
 */
class {$post_type->plural_class_name} extends WPLib_Post_Module_Base {

	const POST_TYPE = '{$post_type->post_type}';

	static function on_load() {

		\$labels = self::register_post_type_labels( array(
			'name'          => __( '{$post_type->plural}',   '{$post_type->this_text_domain()}' ),
			'singular_name' => __( '{$post_type->singular}', '{$post_type->this_text_domain()}' ),
		));

		self::register_post_type( array(
			'labels'    => \$labels,
			{$generator->php_initializers()}
		));

		[@include(hook-comments)]

	}

}
{$post_type->plural_class_name}::on_load();
TEXT;
