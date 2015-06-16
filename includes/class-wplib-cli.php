<?php

/**
 * Class WPLib_CLI
 */
class WPLib_CLI {

	private $_data;

	/**
	 * @param array $args
	 */
	function execute( $args ) {

		echo "\n";

		do {

			if ( ! is_file( $json_file = getcwd() . '/wplib.json' ) ) {

				echo "No wplib.json file.";
				break;

			}

			$data = \Typed_Config\Loader::load( 'wplib', new \WPLib_CLI\Theme(), $json_file );

			$this->set_data( $data );

			if ( 0 == count( $args ) ) {

				echo "Action parameter required.";
				break;

			}

			switch ( $args[1] ) {

				case 'generate':

					$this->generate( $data );
					break;

				case 'show-data':
					$data->strip_meta( '__id__' );
					ob_start();
					print_r( $data );
					$output = ob_get_clean();
					echo $output;
					break;

				case 'show-hooks':
					$hooks = $data->get_hooks();
					ob_start();
					echo "\nHOOKS AVAIALBLE (value==1 if called):\n";
					print_r( $hooks );
					$output = ob_get_clean();
					echo $output;
					break;

			}

		} while (false);

		echo "\n\n";

	}

	function set_data( $data ) {

		$this->_data = $data;

	}

	function load_data( $json_file ) {

		$this->_data = @json_decode( file_get_contents( $json_file ) );

		$fail = false;
		do {

			if ( empty( $this->_data->app->path ) ) {
				$this->_data->app->path = $this->_data->theme_path;
			}
			if ( empty( $this->_data->app->prefix ) ) {
				$this->_data->app->prefix = $this->_data->prefix;
			}

			if ( empty( $this->_data->app->post_types ) && ! is_array( $this->_data->app->post_types ) ) {
				echo $fail = 'App Post Types are not an array.';
				break;
			}
			foreach( $this->_data->app->post_types as $index => $post_type ) {

				if ( empty( $post_type->post_type ) ) {
					echo $fail = 'Must specify a \'post_type\' property for App Post Type #.' . ( $index + 1 );
					break;
				}
				if ( empty( $post_type->singular ) ) {
					echo $fail = 'Must specify a \'Singular\' property for App Post Type {$post_type->post_type}';
					break;
				}
				if ( empty( $post_type->plural ) ) {
					$post_type->plural = "{$post_type->singular}s";
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

	function generate( $data ) {
		$this->generate_theme( $data );
		echo "Generated.";
	}

	function generate_post_type( $post_type ) {

		$this->_mkdirs(array(

			$post_type->module_dir,
			"{$post_type->module_dir}/includes",

		));

		foreach( $post_type->filenames->properties() as $file_type => $filename ) {


			ob_start();
			echo "<?php\n";
			require( $this->get_template_filepath( $file_type ) );
			$source = ob_get_clean();

			file_put_contents( "{$filename}", $source );

		}

	}

	function get_template_filepath( $file_type ) {

		$file_type = preg_replace( '#^(.*)_file#', '$1', $file_type );
		return dirname( __DIR__ ) . "/templates/post-type-{$file_type}.php";

	}

	function generate_post_types( $app ) {

		foreach( $app->post_types as $post_type ) {

			$this->generate_post_type( $post_type );

		}

	}


	function generate_theme( $theme ) {

		if ( ! is_dir( $theme->theme_dir ) ) {

			mkdir( $theme->theme_dir, 0777, true );

		}

		ob_start();

		require( dirname( __DIR__ ) . '/templates/theme.php' );

		$source = ob_get_clean();

		file_put_contents( $theme->theme_file, $source );

		$this->generate_app( $theme->app );

	}

	function generate_app( $app ) {

		if ( ! is_dir( $app->app_dir ) ) {

			mkdir( $app->app_dir, 0777, true );

		}

		ob_start();

		require( dirname( __DIR__ ) . '/templates/app.php' );

		$source = ob_get_clean();

		$this->_mkdirs(array(

			$app->app_dir,
			"{$app->app_dir}/assets",
			"{$app->app_dir}/assets/images",
			"{$app->app_dir}/assets/css",
			"{$app->app_dir}/assets/js",
			"{$app->app_dir}/modules",

		));

		file_put_contents( $app->app_file, $source );

		$this->generate_post_types( $app );



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
