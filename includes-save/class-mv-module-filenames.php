<?php

namespace WPLib_CLI;

use \Typed_Config;

/**
 * Class MV_Module_Filenames
 *
 * @package WPLib_CLI
 */
class MV_Module_Filenames_OLD extends Typed_Config\Data {

	/**
	 * @var string
	 */
	var $module_file;

	/**
	 * @var string
	 */
	var $item_file;

	/**
	 * @var string
	 */
	var $model_file;

	/**
	 * @var string
	 */
	var $view_file;

	/**
	 * @return Post_Type
	 */
	function post_type() {

		return $this->__parent__;

	}
	/**
	 * @return Theme
	 */
	function theme() {

		return $this->post_type()->parent()->parent();

	}

	function pre_filter_module_file_value( $module_file ) {

		if ( is_null( $module_file ) ) {

			$module_file = $this->post_type()->module_file;

		}

		return $module_file;
	}

	function pre_filter_item_file_value( $item_file ) {

		if ( is_null( $item_file ) ) {

			$item_file = $this->_get_instance_file( '.php' );

		}

		return $item_file;
	}

	function pre_filter_model_file_value( $model_file ) {

		if ( is_null( $model_file ) ) {

			$model_file = $this->_get_instance_file( '-model.php' );

		}

		return $model_file;
	}

	function pre_filter_view_file_value( $view_file ) {

		if ( is_null( $view_file ) ) {

			$view_file = $this->_get_instance_file( '-view.php' );

		}

		return $view_file;
	}

	private function _get_instance_file( $suffix ) {

	    $post_type = $this->post_type();

		return str_replace( ' ', '-', "{$post_type->includes_dir}/class-{$post_type->singular_slug}{$suffix}" );

	}

}

