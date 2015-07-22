<?php

namespace WPLib_CLI {

	/**
	 * Class Model_View_Generator
	 *
	 * @property string $item_file
	 * @property string $model_file
	 * @property string $view_file
	 */
	abstract class Model_View_Generator extends Module_Generator {

		const SLUG = 'model-view-module-generator';

		/**
		 *
		 */
		function register() {

			parent::register();

			$slug = $this->dashified_slug();
			$this->register_output_file( "{$slug}-item",   $this->item_file() );
			$this->register_output_file( "{$slug}-model",  $this->model_file() );
			$this->register_output_file( "{$slug}-view",   $this->view_file() );

		}

		/**
		 * @return string
		 */
		function item_file() {

			return $this->_filename( '.php' );

		}

		/**
		 * @return string
		 */
		function model_file() {

			return $this->_filename( 'model.php' );

		}

		/**
		 * @return string
		 */
		function view_file() {

			return $this->_filename( 'view.php' );

		}

		/**
		 * @param string $suffix
		 * @return string
		 */
		private function _filename( $suffix ) {

			$suffix = '.php' !== $suffix ? "-{$suffix}" : $suffix;

			return "{$this->includes_dir()}/class-{$this->unique_id()}{$suffix}";

		}
	}

}

