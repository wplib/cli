<?php

namespace WPLib_CLI {

	use \JSON_Loader\Generator;

	class Post_Type_Module_Generator extends Generator {


		static function generate() {

			self::mkdir(array(

				$post_type->module_dir,
				"{$post_type->module_dir}/includes",

			));

			foreach( $post_type->filenames->properties() as $file_type => $filename ) {


				ob_start();
				echo "<?php\n";
				require( self::get_template_filepath( $file_type ) );
				$source = ob_get_clean();

				file_put_contents( "{$filename}", $source );

			}

		}

		/**
		 * @param string $file_type
		 *
		 * @return string
		 */
		static function get_template_filepath( $file_type ) {

			$file_type = preg_replace( '#^(.*)_file#', '$1', $file_type );
			return dirname( __DIR__ ) . "/templates/post-type-{$file_type}.php";

		}


	}

}
