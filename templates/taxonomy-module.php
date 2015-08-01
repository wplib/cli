<?php
/**
 * @var \WPLib_CLI\Taxonomy_Generator $generator
 * @var \WPLib_CLI\Taxonomy $taxonomy
 */

$class_name = $generator->plural_class_name;
$initializers = $generator->php_initializers();
$text_domain = $generator->root()->text_domain;

echo <<< TEXT
<?php
/**
 * Class {$class_name}
 */
class {$class_name} extends WPLib_Term_Module_Base {

	const TAXONOMY = '{$taxonomy->taxonomy}';

	static function on_load() {

		\$labels = self::register_taxonomy_labels( array(
			'name'          => __( '{$taxonomy->plural}',   '{$text_domain}' ),
			'singular_name' => __( '{$taxonomy->singular}', '{$text_domain}' ),
		));

		self::register_taxonomy( {$generator->object_type_php}, array(
			'taxonomy' => static::TAXONOMY,
			'labels'    => \$labels,
			{$initializers}
		));

		[@include(hook-comments)]

	}

}
{$class_name}::on_load();
TEXT;
