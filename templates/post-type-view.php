<?php

/**
 * @var \WPLib_CLI\Post_Type_Generator $generator
 * @var \WPLib_CLI\Post_Type $post_type
 */


$item = '$item';
$class_name = $generator->singular_class_name;

echo <<< TEXT
<?php
/**
 * Class {$class_name}_View
 *
 * @property {$class_name} $item
 * @method {$class_name}_Model model()
 *
 */
class {$class_name}_View extends WPLib_Post_View_Base {

}
TEXT;


