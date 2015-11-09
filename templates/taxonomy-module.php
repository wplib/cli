<?php
/**
 * @var \WPLib_CLI\Taxonomy_Generator $generator
 * @var \WPLib_CLI\Taxonomy $taxonomy
 */

echo <<< TEXT
<?php
/**
 * Class {$taxonomy->plural_class_name}
 */
class {$taxonomy->plural_class_name} extends WPLib_Term_Module_Base {

	const TAXONOMY = '{$taxonomy->taxonomy}';

	static function on_load() {

		\$labels = self::register_taxonomy_labels( array(
			'name'          => __( '{$taxonomy->plural}',   '{$taxonomy->this_text_domain()}' ),
			'singular_name' => __( '{$taxonomy->singular}', '{$taxonomy->this_text_domain()}' ),
		));

		self::register_taxonomy( {$generator->object_type_php()}, array(
			'taxonomy' => static::TAXONOMY,
			'labels'    => \$labels,
			{$generator->php_initializers()}
		));

		[@include(hook-comments)]

	}

}
{$taxonomy->plural_class_name}::on_load();
TEXT;
