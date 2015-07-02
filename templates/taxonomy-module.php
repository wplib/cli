<?php
$labels = '$labels';

echo <<< TEXT
<?php
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
			'label'         => __( '{$post_type->plural}', 'wplib' ),
			'labels'        => $labels,
			'public'        => true,
			'menu_icon'     => '{$post_type->menu_icon}',
			'menu_position' => {$post_type->menu_position},
			'supports'      => {$post_type->supports},
		));

		[@include(hook-comments)]

	}

}
{$post_type->plural_class_name}::on_load();
TEXT;
