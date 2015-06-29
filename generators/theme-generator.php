<?php

namespace WPLib_CLI {

	class Theme_Generator extends \JSON_Loader\Generator {

		const SLUG = 'theme';

		function register() {

			$this->register_output_file( 'theme', '{theme->theme_dir}/wplib-theme.php' );

		}

	}

}
