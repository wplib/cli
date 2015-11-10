<?php
/**
 * @var \WPLib_CLI\App $app
 */

echo <<< TEXT
<?php
/**
 * Class {$app->singular}
 */
class {$app->singular} extends WPLib_App_Base {

	static function on_load() {

		{$app->module_list()->implode( function( $module ) {

			return "self::register_module( '{$module}' );\n\t\t";

		})}
		[@include(hook-comments)]
	}

}
{$app->singular}::on_load();
TEXT;
