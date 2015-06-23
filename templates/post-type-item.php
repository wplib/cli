<?php
$model = '$model';
$view = '$view';

echo <<< TEXT
/**
 * Class {$post_type->singular_class_name}
 *
 * @property {$post_type->singular_class_name}_Model $model
 * @property {$post_type->singular_class_name}_View $view
 *
 * @mixin {$post_type->singular_class_name}_Model
 * @mixin {$post_type->singular_class_name}_View
 *
 */
class {$post_type->singular_class_name} extends WPLib_Post_Base {

	const POST_TYPE = {$post_type->plural_class_name}::POST_TYPE;

}
TEXT;

