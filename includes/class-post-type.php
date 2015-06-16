<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class Post_Type
	 *
	 * @package WPLib_CLI
	 */
	class Post_Type extends JSON_Loader\Data_Object {

		var $namespace = 'WPLib_CLI';

		var $schema = array(

			'singular'             => 'required=1',
			'plural'               => 'type=string',
			'description'          => 'type=string',

			'post_type'            => 'is_post_typ_arg=1&required=1',
			'public'               => 'is_post_typ_arg=1&type=boolean',
			'exclude_from_search'  => 'is_post_typ_arg=1&type=boolean',
			'publicly_queryable'   => 'is_post_typ_arg=1&type=boolean',
			'show_ui'              => 'is_post_typ_arg=1&type=boolean',
			'show_in_nav_menus'    => 'is_post_typ_arg=1&type=boolean',
			'show_in_menu'         => 'is_post_typ_arg=1&type=boolean',
			'show_in_admin_bar'    => 'is_post_typ_arg=1&type=boolean',
			'menu_position'        => 'is_post_typ_arg=1&type=integer',
			'menu_icon'            => 'is_post_typ_arg=1&type=string',
			'capability_type'      => 'is_post_typ_arg=1&type=string',
			'capabilities'         => 'is_post_typ_arg=1&type=array[string]',
			'map_meta_cap'         => 'is_post_typ_arg=1&type=boolean',
			'hierarchical'         => 'is_post_typ_arg=1&type=boolean',
			'supports'             => 'is_post_typ_arg=1&type=string|array[string]',
			'register_meta_box_cb' => 'is_post_typ_arg=1&',
			'taxonomies'           => 'is_post_typ_arg=1&type=array[string]',
			'has_archive'          => 'is_post_typ_arg=1&type=boolean',
			'permalink_epmask'     => 'is_post_typ_arg=1&type=string',
			'rewrite'              => 'is_post_typ_arg=1&type=array[Rewrite]',
			'query_var'            => 'is_post_typ_arg=1&type=string',
			'can_export'           => 'is_post_typ_arg=1&type=boolean',

			'singular_slug'        => 'type=string',
			'plural_slug'          => 'type=string',
			'singular_suffix'      => 'type=string',
			'plural_suffix'        => 'type=string',
			'singular_class_name'  => 'type=string',
			'plural_class_name'    => 'type=string',
			'module_slug'          => 'type=string',
			'module_dir'           => 'type=string',
			'module_file'          => 'type=string',
			'includes_dir'         => 'type=string',
			'filenames'            => 'type=array[MV_Module_Filenames]',

		);
	}

}

