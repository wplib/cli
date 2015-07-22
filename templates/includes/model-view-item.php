<?php
/**
 * @var string $constant_name
 * @var string $singular_class_name
 * @var string $plural_class_name
 * @var string $base_class
 */

echo <<< TEXT
<?php
/**
 * Class {$singular_class_name}
 *
 * @property {$singular_class_name}_Model \$model
 * @property {$singular_class_name}_View \$view
 *
 * @mixin {$singular_class_name}_Model
 * @mixin {$singular_class_name}_View
 *
 */
class {$singular_class_name} extends {$base_class} {

	const {$constant_name} = {$plural_class_name}::{$constant_name};

}
TEXT;

