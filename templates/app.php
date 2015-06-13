<?php

echo <<< TEXT
<?php
/**
 * Class {$app->prefix}
 */
class {$app->prefix} extends WPLib_App_Base {

	static function on_load() {

		WPLib::register_helper( __CLASS__, 'WPLib' );
	}

}
{$app->prefix}::on_load();
TEXT;
