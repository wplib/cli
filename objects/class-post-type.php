<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class Post_Type
	 *
	 * @property string $post_type                { @required
	 *                                              @post_type_arg }
	 * @property string $singular                 { @required }
	 * @property string $plural
	 * @property string $description
	 * @property bool $public                     { @post_type_arg
	 *                                              @default true }
	 * @property bool $exclude_from_search        { @post_type_arg }
	 * @property bool $publicly_queryable         { @post_type_arg }
	 * @property bool $show_ui                    { @post_type_arg }
	 * @property bool $show_in_nav_menus          { @post_type_arg }
	 * @property bool $show_in_menu               { @post_type_arg }
	 * @property bool $show_in_admin_bar          { @post_type_arg }
	 * @property int $menu_position               { @post_type_arg }
	 * @property string $menu_icon                { @post_type_arg }
	 * @property string $capability_type          { @post_type_arg }
	 * @property string|string[] $capabilities    { @post_type_arg }
	 * @property bool $map_meta_cap               { @post_type_arg }
	 * @property bool $hierarchical               { @post_type_arg }
	 * @property string|string[] $supports        { @post_type_arg }
	 * @property string $register_meta_box_cb     { @post_type_arg }
	 * @property string|string[] $taxonomies      { @post_type_arg }
	 * @property bool $has_archive                { @post_type_arg }
	 * @property string $permalink_epmask         { @post_type_arg }
	 *
	 * @property bool|Rewrite $rewrite            { @post_type_arg
	 *                                              @default true }
	 * @property string $query_var                { @post_type_arg }
	 * @property bool $can_export                 { @post_type_arg }
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
	 * @property MV_Module_Filenames $filenames
	 *
	 */
	class Post_Type extends JSON_Loader\Object {


		/**
		 * @param string $module_name
		 *
		 * @return string
		 */
		function module_name( $module_name ) {

			return $module_name ? $module_name : 'post-type-' . str_replace( '_', '-', $this->post_type );

		}

		/**
		 * @param array $module_dir
		 *
		 * @return string
		 */
		function module_dir( $module_dir ) {

			return $module_dir ? $module_dir : "{$this->app()->app_dir}/modules/{$this->module_name}";

		}

		/**
		 * @param string $module_file
		 *
		 * @return string
		 */
		function module_file( $module_file ) {

			return $module_file ? $module_file : "{$this->module_dir}/{$this->module_name}.php";

		}

		/**
		 * @param array $includes_dir
		 *
		 * @return string
		 */
		function includes_dir( $includes_dir ) {

			return $includes_dir ? $includes_dir : "{$this->module_dir}/includes";

		}

		/**
		 * @param array $capabilities
		 *
		 * @return string
		 */
		function capabilities( $capabilities ) {

			return \WPLib_CLI::comma_string_to_array( $capabilities );

		}

		/**
		 * @param array $taxonomies
		 *
		 * @return string
		 */
		function taxonomies( $taxonomies ) {

			return \WPLib_CLI::comma_string_to_array( $taxonomies );

		}

		/**
		 * @param null|string $post_type
		 *
		 * @return string
		 */
		function post_type( $post_type ) {

			return \WPLib_CLI::get_prefixed_identifier( $this->root(), $post_type );

		}

		/**
		 * @param string $query_var
		 *
		 * @return string
		 */
		function query_var( $query_var ) {

			return \WPLib_CLI::get_prefixed_identifier( $this->root(), $query_var );

		}

		/**
		 * @param null|string $value
		 *
		 * @return string
		 */
		function plural( $value ) {

			return $value ? $value : "{$this->singular}s";

		}

		/**
		 * @return App
		 */
		function app() {

			return $this->parent;

		}

		/**
		 * @return Root
		 */
		function root() {

			return $this->app()->parent;

		}


	}

}

