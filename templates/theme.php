<?php

$class_name = "{$theme->prefix}_Theme";

echo <<< TEXT
<?php
/**
 * Class {$class_name}
 */
class {$class_name} extends WPLib_Theme_Base {

	static function on_load() {

		[@include(hook-comments)]

	}

}
{$class_name}::on_load();
TEXT;
