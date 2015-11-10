<?php
/**
 * @var string $class_name
 * @var string $base_class
 */

echo <<< TEXT
<?php
/**
 * Class {$class_name}_View
 *
 * @property {$class_name} \$item
 * @method {$class_name}_Model model()
 *
 */
class {$class_name}_View extends {$base_class} {

}
TEXT;
