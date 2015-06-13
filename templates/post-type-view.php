<?php
$item = '$item';

echo <<< TEXT
/**
 * Class {$post_type->singular_class_name}_View
 *
 * @property {$post_type->singular_class_name} $item
 * @method {$post_type->singular_class_name}_Model model()
 *
 */
class {$post_type->singular_class_name}_View extends WPLib_Post_View_Base {

}
TEXT;


