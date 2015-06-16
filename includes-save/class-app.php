<?php

namespace WPLib_CLI;

use Typed_Config;

/**
 * Class App
 *
 * @package WPLib_CLI
 *
 * @method Theme parent()
 * @property Theme $__parent__
 */
class App_OLD extends Typed_Config\Data {

	var $prefix;
	var $app_dir;
	var $app_file;
	var $post_types = array();
	var $taxonomies = array();
	var $user_roles = array();

	protected $__schema__ = array(
		'post_types'  => array( '\WPLib_CLI\Post_Type' ),
		'taxonomies'  => array( '\WPLib_CLI\Taxonomy' ),
		'user_roles'  => array( '\WPLib_CLI\User_Role' ),
	);

	/**
	 * @return Theme
	 */
	function theme() {

		return $this->__parent__;

	}
	function prefix() {

		return $this->theme()->prefix;

	}

	function short_prefix() {

		return $this->theme()->short_prefix;

	}

	/**
	 * @param string $app_dir
	 *
	 * @return string
	 */

	function pre_filter_app_dir_value( $app_dir ){

		$default = "{$this->__parent__->theme_dir}/wplib-app";

		if ( is_null( $app_dir ) ) {

			$app_dir = $default;

		} else if ( is_dir( $full_dir = getcwd() . '/' . trim( $app_dir , '/' ) ) ) {

			$app_dir = $full_dir;

		} else if ( ! is_dir( $app_dir = rtrim( $app_dir, '/' ) ) ) {

			$app_dir = $default;

		}
		return $app_dir;

	}


	/**
	 * @param string $app_file
	 *
	 * @return string
	 */
	function pre_filter_app_file_value( $app_file ) {

		$default = "{$this->app_dir}/{$this->theme()->theme_slug}-app.php";

		if ( is_null( $app_file ) ) {

			$app_file = $default;

		} else if ( is_file( $full_file = "{$this->app_dir}/{$app_file}" ) ) {

			$app_file = $full_file;

		} else if ( ! is_file( $app_file ) ) {

			$app_file = $default;

		}
		return $app_file;

	}

	/**
	 * @param string $prefix
	 * @return string
	 */
	function pre_filter_prefix_value( $prefix ) {

		return $prefix ? $prefix : $this->__parent__->prefix;

	}


}
