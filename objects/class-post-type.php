<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Post_Type
	 *
	 * @property string $post_type                { @required }
	 * @property string $singular                 { @required }
	 * @property string $plural
	 * @property string $description
	 * @property bool $public                     { @initializer
	 *                                              @default true
	 *                                              @wp_default false }
	 * @property bool $exclude_from_search        { @initializer
	 *                                              @wp_default ! $public }
	 * @property bool $publicly_queryable         { @initializer
	 *                                              @wp_default $public }
	 * @property bool $show_ui                    { @initializer
	 *                                              @wp_default $public }
	 * @property bool $show_in_nav_menus          { @initializer
	 *                                              @wp_default $public }
	 * @property bool $show_in_menu               { @initializer
	 *                                              @wp_default $show_ui }
	 * @property bool $show_in_admin_bar          { @initializer
	 *                                              @wp_default $show_in_admin_bar }
	 * @property int $menu_position               { @initializer
	 *                                              @omit_if_zero  }
	 * @property string $menu_icon                { @initializer }
	 * @property string $capability_type          { @initializer
	 *                                              @default post
	 *                                              @wp_default post }
	 * @property string|string[] $capabilities    { @initializer }
	 * @property bool $map_meta_cap               { @initializer }
	 * @property bool $hierarchical               { @initializer
	 *                                              @wp_default false }
	 * @property string|string[] $supports        { @initializer
	 *                                              @explode ","
	 *                                              @wp_default title,editor }
	 * @property string $register_meta_box_cb     { @initializer }
	 * @property string|string[] $taxonomies      { @initializer
	 *                                              @wp_default null }
	 * @property bool $has_archive                { @initializer
	 *                                              @wp_default false }
	 * @property string $permalink_epmask         { @initializer
	 *                                              @wp_default EP_PERMALINK }
	 *
	 * @property bool|Rewrite $rewrite            { @initializer
	 *                                              @wp_default true }
	 * @property string $query_var                { @initializer
	 *                                              @wp_default true }
	 * @property bool $can_export                 { @initializer
	 *                                              @wp_default true }
	 * @property string $no_prefix_post_type
	 * @property string $singular_slug
	 * @property string $plural_slug
	 * @property string $singular_suffix
	 * @property string $plural_suffix
	 * @property string $singular_class_name
	 * @property string $plural_class_name
	 * @property string $module_slug
	 * @property string $module_dir
	 * @property string $module_file
	 * @property string $module_name
	 * @property string $includes_dir
	 *
	 */
	class Post_Type extends Object {

		const SLUG = 'post_type';

		/**
		 * @param array $capabilities
		 *
		 * @return string
		 */
		function capabilities( $capabilities ) {

			return Util::comma_string_to_array( $capabilities );

		}

		/**
		 * @param bool|array $taxonomies
		 *
		 * @return string
		 */
		function taxonomies( $taxonomies = false ) {

			return Util::comma_string_to_array( $taxonomies );

		}

		/**
		 * @param bool|string $post_type
		 *
		 * @return string
		 */
		function post_type( $post_type = false ) {

			if ( ! $post_type ) {

				/**
				 * @var Object|Post_Type $post_type
				 */
				$post_type = $this;

				$post_type = Util::get_state_value( $post_type, 'post_type' );

			}

			$post_type = Util::get_prefixed_identifier( $post_type, Util::root()->short_prefix );

			return $post_type;

		}

		/**
		 * @param string $query_var
		 *
		 * @return string
		 */
		function query_var( $query_var ) {

			return $query_var ? Util::get_prefixed_identifier( Util::root(), $query_var ) : $query_var;

		}

		/**
		 * @param bool|string $value
		 *
		 * @return string
		 */
		function plural( $value = false ) {

			return $value ? $value : "{$this->singular}s";

		}

		/**
		 * @param null|string $slug
		 *
		 * @return string
		 */
		function singular_slug( $slug = false ) {

			if ( ! $slug ) {

				/**
				 * @var Object|Post_Type $post_type
				 */
				$post_type = $this;

				$slug = strtolower( Util::dashify( Util::strip_prefix(

					Util::get_state_value( $post_type, 'post_type' ),

					Util::root()->short_prefix

				) ) );

			}
			return $slug;

		}

		/**
		 * @param null|string $slug
		 *
		 * @return string
		 */
		function plural_slug( $slug ) {

			return $slug ? $slug : "{$this->singular_slug}s";

		}

	}

}

