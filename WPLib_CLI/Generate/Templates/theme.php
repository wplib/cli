<?php

/**
 * @var \WPLib_CLI\Generate\Objects\Theme $theme
 */

echo <<< TEXT
<?php
/**
 * Class {$theme->theme_name}
 */
class {$theme->theme_name} extends WPLib_Theme_Base {

	static function on_load() {

		[@include(hook-comments)]

	}

}
{$theme->theme_name}::on_load();
TEXT;
