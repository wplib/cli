<?php

echo <<< TEXT
<?php
/**
 * Load WPLib
 * @see http://wplib.org
 */
require( dirname( __DIR__ ) . '/wplib/wplib.php' );

/**
 * Initialize, since loading as a library via theme (vs. loading as a plugin.)
 */
WPLib::initialize();

/**
 * Load WPLib
 * @see http://wplib.org
 */
require( __DIR__ . '/{$app->slug}-app.php' );

/**
 * Initialize, since loading as a library via theme (vs. loading as a plugin.)
 */
{$app->prefix}::initialize();

/**
 * Load the Theme class that extends from WPInitialize, since loading as a library via theme (vs. loading as a plugin.)
 */
require( dirname( __DIR__ ) . '/wplib-theme.php' );
TEXT;
