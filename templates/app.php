<?php

$class_name = $app->prefix;

echo <<< TEXT
<?php
/**
 * Class {$class_name}
 */
class {$class_name} extends WPLib_App_Base {

	static function on_load() {

		WPLib::register_helper( __CLASS__, 'WPLib' );

	}

}
{$class_name}::on_load();
TEXT;
