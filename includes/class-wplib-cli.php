<?php

class WPLib_CLI {

	private $_json;

	function load_json( $json_file ) {

		$this->_json = @json_decode( file_get_contents( $json_file ) );

		$fail = false;
		do {

			if ( empty( $this->_json ) || ! is_object( $this->_json ) ) {
				echo $fail = "wplib.json invalid.";
				break;
			}

			if ( empty( $this->_json->theme_slug ) ) {
				echo $fail = 'No Theme Slug defined in wplib.json.';
				break;
			}
			if ( empty( $this->_json->text_domain ) ) {
				$this->text_domain = $this->_json->theme_slug;
			}
			if ( empty( $this->_json->prefix ) ) {
				echo $fail = 'No Prefix defined in wplib.json.';
				break;
			}
			if ( empty( $this->_json->short_prefix ) ) {
				echo $fail = 'No Short Prefix defined in wplib.json.';
				break;
			}
			if ( empty( $this->_json->themes_path ) ) {
				$this->_json->themes_path = $this->default_themes_path();
			}

			if ( empty( $this->_json->theme_path ) ) {
				$this->_json->theme_path = $this->get_themes_dir( $this->_json->theme_slug );
			}

			if ( empty( $this->_json->app ) ) {
				$this->_json->app = new stdClass();
			}
			if ( empty( $this->_json->app->path ) ) {
				$this->_json->app->path = $this->_json->theme_path;
			}
			if ( empty( $this->_json->app->prefix ) ) {
				$this->_json->app->prefix = $this->_json->prefix;
			}

			if ( empty( $this->_json->app->post_types ) && ! is_array( $this->_json->app->post_types ) ) {
				echo $fail = 'App Post Types are not an array.';
				break;
			}
			foreach( $this->_json->app->post_types as $index => $post_type ) {

				if ( empty( $post_type->post_type ) ) {
					echo $fail = 'Must specify a \'post_type\' property for App Post Type #.' . ( $index + 1 );
					break;
				}
				if ( empty( $post_type->singular ) ) {
					echo $fail = 'Must specify a \'Singular\' property for App Post Type {$post_type->post_type}';
					break;
				}
				if ( empty( $post_type->plural ) ) {
					$post_type->plural .= 's';
				}
				if ( empty( $post_type->menu_icon ) ) {
					$post_type->menu_icon = '';
				}
				if ( empty( $post_type->menu_position ) ) {
					$post_type->menu_position = '10';
				}
				if ( empty( $post_type->supports ) ) {
					$post_type->supports = 'title,editor';
				}
				if ( is_string( $post_type->supports ) ) {
					$post_type->supports = explode( ',', $post_type->supports );
				}
				if ( is_array( $post_type->supports ) ) {
					$post_type->supports = implode( "','", $post_type->supports );
					$post_type->supports = "array('{$post_type->supports}')";
				}

			}

		} while (false);

		return ! $fail;

	}

	function generate( $args ) {
		$this->generate_theme();
		$this->generate_app();
		$this->generate_post_types();
		echo "Generated.";
	}

	function generate_post_type( $post_type ) {

		$theme = $this->_json;

		$post_type->singular_slug                = strtolower( $post_type->singular );
		$post_type->singular_suffix              = str_replace( ' ', '_', $post_type->singular );
		$post_type->plural_suffix                = str_replace( ' ', '_', $post_type->plural );
		$post_type->singular_class_name          = "{$theme->prefix}_{$post_type->singular_suffix}";
		$post_type->plural_class_name            = "{$theme->prefix}_{$post_type->plural_suffix}";
		$post_type->plural_slug                  = isset( $post_type->plural ) ? strtolower( $post_type->plural ) : strtolower( $post_type->singular ) . 's';
		$post_type->module_dir                   = $this->get_app_dir( 'modules' ) . "/{$post_type->singular_slug}";
		$post_type->filenames['post-types']      = "{$post_type->module_dir}/{$post_type->plural_slug}";
		$post_type->filenames['post-type']       = "{$post_type->module_dir}/includes/{$post_type->singular_slug}";
		$post_type->filenames['post-type-model'] = "{$post_type->filenames['post-type']}-model";
		$post_type->filenames['post-type-view']  = "{$post_type->filenames['post-type']}-view";

		if ( ! preg_match( '#^' . preg_quote( $theme->short_prefix ) . '_#', $post_type->post_type ) ) {

			$post_type->post_type = "{$theme->short_prefix}_{$post_type->post_type}";

		}


		$theme = $this->_json;
		$this->_mkdirs(array(

			$post_type->module_dir,
			"{$post_type->module_dir}/includes",

		));

		foreach( $post_type->filenames as $file_type => $filename ) {

			ob_start();
			echo "<?php\n";
			require( dirname( __DIR__ ) . "/templates/{$file_type}.php" );
			file_put_contents( "{$filename}.php", $source = ob_get_clean() );

		}

	}

	function generate_post_types() {

		foreach( $this->_json->app->post_types as $post_type ) {

			$this->generate_post_type( $post_type );

		}

	}


	function generate_theme() {

		do {

			if ( is_file( $theme_file = $this->get_themes_dir( 'wplib-theme.php' ) ) ) {
				break;
			}
			$theme_dir = dirname( $theme_file );

			global $theme;
			$theme = $this->_json;
			ob_start();
			require( dirname( __DIR__ ) . '/templates/theme.php' );
			$source = ob_get_clean();

			if ( ! is_dir( $theme_dir ) ) {

				mkdir( $theme_dir, 0777, true );

			}

			file_put_contents( $theme_file, $source );


		} while (false);

	}

	function generate_app() {

		do {

			$theme = $this->_json;
			$app = $theme->app;

			if ( is_file( $app_file = $this->get_app_dir( "{$theme->theme_slug}.php" ) ) ) {
				break;
			}

			$app_dir = dirname( $app_file );

			global $app;
			ob_start();
			require( dirname( __DIR__ ) . '/templates/app.php' );
			$source = ob_get_clean();

			$this->_mkdirs(array(

				$app_dir,
				"{$app_dir}/assets",
				"{$app_dir}/modules",

			));

			file_put_contents( $app_file, $source );

		} while (false);

	}

	function get_app_dir( $path = false ) {

		return $this->get_themes_dir( "/wplib-app/{$path}" );

	}
	function get_themes_dir( $path = false ) {

		return getcwd() . '/' . trim( $this->_json->themes_path, '/' ) . "/{$this->_json->theme_slug}/{$path}";

	}

	function default_themes_path() {

		return "wp-content/themes/{$this->_json->theme_slug}";

	}

	/**
	 * @param $dirs
	 */
	private function _mkdirs( $dirs ) {
		foreach ( $dirs as $dir ) {

			if ( ! is_dir( $dir ) ) {

				mkdir( $dir, 0777, true );

			}

		}
	}
}
