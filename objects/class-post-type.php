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
	 * @property string[] $capabilities           { @post_type_arg }
	 * @property bool $map_meta_cap               { @post_type_arg }
	 * @property bool $hierarchical               { @post_type_arg }
	 * @property string|string[] $supports        { @post_type_arg }
	 * @property string $register_meta_box_cb     { @post_type_arg }
	 * @property string[] $taxonomies             { @post_type_arg }
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
	 * @property string $includes_dir
	 * @property MV_Module_Filenames $filenames
	 *
	 */
	class Post_Type extends JSON_Loader\Object {


		/**
		 * @param null|string $value
		 *
		 * @return string
		 */
		function plural( $value ) {

			return $value ? $value : "{$this->singular}s";

		}

	}

}

