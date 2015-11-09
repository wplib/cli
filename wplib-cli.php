<?php
/**
 * Name:        WPLib CLI
 * URL:         http://github.com/wplib/wplib-cli
 * Description: A command-line scaffolding tool for WPLib
 * Version:     0.1.0
 * Author:      The WPLib Team
 * Author URI:  http://wplib.org
 * License:     GPLv2 or later
 *
 * Copyright 2015 NewClarity Consulting LLC <wplib@newclarity.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

require( __DIR__ . '/includes/autoloader.php' );
require( __DIR__ . '/vendor/json-loader/json-loader.php' );
require( __DIR__ . '/includes/class-wplib-cli.php' );

WPLib_CLI::instance()->execute( $argv );

