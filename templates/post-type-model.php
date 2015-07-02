<?php
/**
 * @var \WPLib_CLI\Post_Type_Generator $generator
 * @var \WPLib_CLI\Post_Type $post_type
 */

$class_name = $generator->singular_class_name;

echo <<< TEXT
<?php
/**
 * Class {$class_name}_Model
 *
 */
class {$class_name}_Model extends WPLib_Post_Model_Base {


}
TEXT;

