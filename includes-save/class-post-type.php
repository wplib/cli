<?php

namespace WPLib_CLI;

use Typed_Config;

/**
 * Class Post_Type
 *
 * @package WPLib_CLI
 *
 * @property App $__parent__
 * @method App parent()
 */
class Post_Type_OLD extends Typed_Config\Data {

	/**
	 * @var string Use instead of 'singular_name'
	 */
	var $singular;

	/**
	 * @var string Use instead of 'label'
	 */
	var $plural;

	/**
	 * @var string Use instead of 'singular_name'
	 */
	var $description;

	/**
	 * @var string Required, name of the post type.
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#description
	 */
	var $post_type;

	/**
	 * @var bool If true then all aspects of the post type are visible to the user.
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#public
	 */
	var $public = true;

	/**
	 * @var bool Default is opposite of $this->public
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#exclude_from_search
	 */
	var $exclude_from_search;

	/**
	 * @var bool Default is same as $this->public
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#publicly_queryable
	 */
	var $publicly_queryable;

	/**
	 * @var bool Default is same as $this->public
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#show_ui
	 */
	var $show_ui;

	/**
	 * @var bool Default is same as $this->public
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#show_in_nav_menus
	 */
	var $show_in_nav_menus;

	/**
	 * @var bool Default is same as $this->show_ui
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#show_in_menu
	 */
	var $show_in_menu;

	/**
	 * @var bool Default is same as $this->show_in_menu
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#show_in_admin_bar
	 */
	var $show_in_admin_bar;

	/**
	 * @var int Show Menu must be true. 60 = below first separator
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#menu_position
	 */
	var $menu_position;

	/**
	 * @var string Dashicons name, or URL to icon.
	 * @see https://developer.wordpress.org/resource/dashicons/
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#menu_icon
	 */
	var $menu_icon;

	/**
	 * @var string|array 'page' or 'post' or developer-defined, or capabilities which requires map_meta_cap==true.
	 *
	 * @note These illustrate the potential capabilities for a developer-defined capability type and what they map to as of WP 4.2.
	 *
	 *		 edit_{$capability_type}                => edit_post
 	 *		 read_{$capability_type}                => read_post
 	 *		 delete_{$capability_type}              => delete_post
	 *
 	 *		 edit_{$capability_type}                => edit_posts
 	 *		 edit_others_{$capability_type}         => edit_others_posts
 	 *		 publish_{$capability_type}             => publish_posts
 	 *		 read_private_{$capability_type}        => read_private_posts
 	 *
	 *		 read                                   => read
 	 *		 delete_{$capability_type}              => delete_posts
 	 *		 delete_private_{$capability_type}      => delete_private_posts
 	 *		 delete_published_{$capability_type}    => delete_published_posts
 	 *		 delete_others_{$capability_type}       => delete_others_posts
 	 *		 edit_private_{$capability_type}        => edit_private_posts
 	 *       edit_published_{$capability_type}      => edit_published_posts
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#capability_type
	 */
	var $capability_type;

	/**
	 * @var string[] List of post capabilities
	 *
	 * @note: This can be any of the following:
	 *
	 *      Meta (mapped) capabilities:
	 *
	 *          - edit_post
	 *          - read_post
	 *          - delete_post
	 *
	 *      Primitive capabilities:
	 *
	 *          - edit_posts
	 *          - edit_others_posts
	 *          - publish_posts
	 *          - read_private_posts
	 *
	 *      Primitive capabilities (requires map_meta_cap):
	 *          - read
	 *          - delete_posts
	 *          - delete_private_posts
	 *          - delete_published_posts
	 *          - delete_others_posts
	 *          - edit_private_posts
	 *          - edit_published_posts
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#capabilities
	 */
	var $capabilities = array();

	/**
	 * @var bool Defaults to NULL.  If false the standard admin role can't edit the posts types.
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#map_meta_cap
	 */
	var $map_meta_cap;

	/**
	 * @var bool false=like a $post_type=='post', true=like a post_type=='page'
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#hierarchical
	 */
	var $hierarchical;

	/**
	 * @var bool|string|array If string, should be comma-separated
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#supports
	 */
	var $supports;

	/**
	 * @var string|array
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#register_meta_box_cb
	 */
	var $register_meta_box_cb;

	/**
	 * @var string|array, If string, should be comma-separated
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#taxonomies
	 */
	var $taxonomies;

	/**
	 * @var string|bool
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#has_archive
	 */
	var $has_archive;

	/**
	 * @var string
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#permalink_epmask
	 */
	var $permalink_epmask;

	/**
	 * @var bool|array
	 *
	 * @see \WP_Lib_CLI\Rewrite
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#rewrite
	 */
	var $rewrite;

	/**
	 * @var bool|string If true set to post_type name
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#query_var
	 */
	var $query_var;

	/**
	 * @var bool
	 *
	 * @see http://codex.wordpress.org/Function_Reference/register_post_type#can_export
	 */
	var $can_export;

	/********************************
	 * Derived
	 ********************************/

	/**
	 * @var string Dashified lowercased $singular
	 */
	var $singular_slug;

	/**
	 * @var string Dashified lowercased $plural OR "{$singular_slug}s"
	 */
	var $plural_slug;

	/**
	 * @var string Userscorified $singular
	 */
	var $singular_suffix;

	/**
	 * @var string Userscorified $plural
	 */
	var $plural_suffix;

	/**
	 * @var string App-prefixed $singular_suffix
	 */
	var $singular_class_name;

	/**
	 * @var string App-prefixed $plural_suffix
	 */
	var $plural_class_name;

	/**
	 * @var string Module directory, i.e. "post-type{$plural_slug}"
	 */
	var $module_slug;

	/**
	 * @var string Module directory, i.e. {$fullpath_dir}/post-type{$plural_slug}
	 */
	var $module_dir;

	/**
	 * @var string Module filename, i.e. {$fullpath_dir}/post-type{$plural_slug}/post-type{$plural_slug}.php
	 */
	var $module_file;

	/**
	 * @var string Module directory, i.e. {$$module_dir}/includes
	 */
	var $includes_dir;

	/**
	 * @var MV_Module_Filenames List of named filename dir paths.
	 *
	 * @see \WPLib_CLI\MV_Module_Filenames
	 */
	var $filenames;

	/**
	 * @var array
	 */
	protected $__schema__ = array(
		'rewrite'   => '\WPLib_CLI\Rewrite',
		'filenames' => '\WPLib_CLI\MV_Module_Filenames',
	);

	/**
	 * @return App
	 */
	function app() {
		return $this->parent();
	}

	/**
	 * @return Theme
	 */
	function theme() {
		return $this->app()->theme();
	}

	function pre_filter_post_type_value( $post_type ) {

		$short_prefix = $this->parent()->short_prefix() . '_';

		if ( ! preg_match( '#^' . preg_quote( $short_prefix ) . '#', $post_type ) ) {

			$post_type = "{$short_prefix}{$post_type}";

		}

		return $post_type;

	}

	function pre_filter_plural_value( $plural ) {

		return $this->plural = ( $plural ? $plural : "{$this->singular}s" );

	}

	function pre_filter_singular_slug_value( $singular_slug ) {

		return $this->singular_slug = ( $singular_slug
			? $singular_slug
			: str_replace( ' ', '-', strtolower( $this->singular ) )
		);

	}

	function pre_filter_plural_slug_value( $plural_slug ) {
		return $this->plural_slug = ( $plural_slug
			? $plural_slug
			: str_replace( ' ', '-', strtolower( $this->plural ) )
		);

	}

	function pre_filter_singular_suffix_value( $singular_suffix ) {

		return $this->singular_suffix = ( $singular_suffix
			? $singular_suffix
			: str_replace( ' ', '_', $this->singular )
		);

	}

	function pre_filter_plural_suffix_value( $plural_suffix ) {

		return $this->plural_suffix = ( $plural_suffix
			? $plural_suffix
			: str_replace( ' ', '_', $this->plural )
		);

	}

	function pre_filter_singular_class_name_value( $singular_class_name ) {

		if ( is_null( $singular_class_name ) ) {

			$theme = $this->theme();

			$singular_class_name = "{$theme->prefix}_{$this->singular_suffix}";

		}
		return $this->singular_class_name = $singular_class_name;

	}


	function pre_filter_plural_class_name_value( $plural_class_name ) {

		if ( is_null( $plural_class_name ) ) {

			$theme = $this->theme();

			$plural_class_name = "{$theme->prefix}_{$this->plural_suffix}";

		}

		return $this->plural_class_name = $plural_class_name;

	}


	function pre_filter_module_slug_value( $module_slug ) {

		if ( is_null( $module_slug ) ) {

			$module_slug = "post-type-{$this->plural_slug}";

		}

		return $this->module_slug = $module_slug;
	}


	function pre_filter_module_dir_value( $module_dir ) {

		if ( is_null( $module_dir ) ) {

			$module_dir = "{$this->app()->app_dir}/modules/{$this->module_slug}";

		}

		return $this->module_dir = $module_dir;
	}

	function pre_filter_module_file_value( $module_file ) {

		if ( is_null( $module_file ) ) {

			$module_file = str_replace( ' ', '-', "{$this->module_dir}/{$this->module_slug}.php" );

		}

		return $this->module_file = $module_file;
	}


	function pre_filter_includes_dir_value( $includes_dir ) {

		if ( is_null( $includes_dir ) ) {

			$includes_dir = "{$this->module_dir}/includes";

		}

		return $this->includes_dir = $includes_dir;
	}

}


