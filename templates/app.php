<?php

$class_name = $app->name;

echo <<< TEXT
<?php
/**
 * Class {$class_name}
 */
class {$class_name} extends WPLib_App_Base {

	static function on_load() {

		[@include(hook-comments)]

	}

}
{$class_name}::on_load();
TEXT;
