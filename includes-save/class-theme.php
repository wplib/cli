<?php

namespace WPLib_CLI;

use \Typed_Config;

class Theme_OLD extends Typed_Config\Data {
	var $site_name;
	var $prefix;
	var $short_prefix;
	var $theme_slug;
	var $themes_dir;
	var $theme_dir;
	var $theme_file;
	var $text_domain;
	var $app;

	protected $__schema__ = array(
		'app'  => '\WPLib_CLI\App'
	);

	/**
	 * @param $values
	 */
	function pre_filter_values( $values ) {

		$data = (object)$values;

		$fail = array();

		do {

			if ( empty( $data->site_name ) ) {
				$fail[] = 'No Site Name (\'site_name\') defined in wplib.json.';
				break;
			}

			if ( empty( $data->theme_slug ) ) {
				$fail[] = 'No Theme Slug (\'singular\') defined in wplib.json.';
				break;
			}
			if ( empty( $data->prefix ) ) {
				$fail[] = 'No Prefix (\'prefix\')  defined in wplib.json.';
				break;
			}
			if ( empty( $data->short_prefix ) ) {
				$fail[] = 'No Short Prefix  (\'short_prefix\') defined in wplib.json.';
				break;
			}

		} while (false);

		if ( count( $fail ) ) {

			$this->log_error( implode( "\n", $fail ), 1000 );

		}

		return $values;

	}


	/**
	 * @param string $text_domain
	 *
	 * @return string
	 */
	function pre_filter_text_domain_value( $text_domain ) {

		return ! $text_domain ? $this->theme_slug : $text_domain;

	}

	/**
	 * @param string $themes_dir
	 *
	 * @return string
	 */
	function pre_filter_themes_dir_value( $themes_dir ) {

		if ( is_null( $themes_dir ) ) {

			$themes_dir = $this->default_themes_dir();

		} else if ( is_dir( $full_dir = getcwd() . '/' . trim( $themes_dir, '/' ) ) ) {

			$themes_dir = $full_dir;

		} else if ( ! is_dir( $themes_dir = rtrim( $themes_dir, '/' ) ) ) {

			$themes_dir = $this->default_themes_dir();

		}
		return $themes_dir;

	}

	/**
	 * @param string $theme_dir
	 *
	 * @return string
	 */
	function pre_filter_theme_dir_value( $theme_dir ) {

		if ( ! is_dir( $theme_dir ) ) {

			$theme_dir = $this->get_themes_dir( $this->theme_slug );

		}
		return $theme_dir;

	}

	/**
	 * @param string $theme_file
	 *
	 * @return string
	 */
	function pre_filter_theme_file_value( $theme_file ) {

		$default = "{$this->theme_dir}/wplib-theme.php";

		if ( is_null( $theme_file ) ) {

			$theme_file = $default;

		} else if ( is_file( $full_file = "{$this->theme_dir}/{$theme_file}" ) ) {

			$theme_file = $full_file;

		} else if ( ! is_file( $theme_file ) ) {

			$theme_file = $default;

		}
		return $theme_file;

	}

	/**
	 * @param bool $path
	 *
	 * @return string
	 */

	function get_app_dir( $path = false ) {

		return $this->get_themes_dir( "/wplib-app/{$path}" );

	}

	function get_themes_dir( $path = false ) {

		$path = trim( $path, '/' );

		$themes_dir = "{$this->themes_dir}/{$path}";

		if ( is_dir( $themes_dir ) && ! preg_match( '#^' . preg_quote( getcwd() ) . '#', $themes_dir  ) ) {

			$themes_dir = getcwd() . '/' . trim( $this->themes_dir, '/' ) . rtrim( "/{$this->theme_slug}/{$path}", '/' );

		}

		if ( ! is_dir( $themes_dir ) ) {

			$this->log_error( "The path {$path} is not a valid subdirectory of {{$this->themes_dir}}." );

		}

		return $themes_dir;

	}

	function default_themes_dir() {

		return "wp-content/themes/{$this->theme_slug}";

	}

}


