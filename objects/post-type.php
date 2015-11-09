<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Post_Type
	 *
	 * @property string $post_type                { @required }
	 * @property string $singular                 { @required }
	 * @property string $description
	 * @property boolean $public                  { @initializer
	 *                                              @default true
	 *                                              @missing false }
	 * @property boolean $exclude_from_search     { @initializer
	 *                                              @missing ! $public }
	 * @property boolean $publicly_queryable      { @initializer
	 *                                              @missing $public }
	 * @property boolean $show_ui                 { @initializer
	 *                                              @missing $public }
	 * @property boolean $show_in_nav_menus       { @initializer
	 *                                              @missing $public }
	 * @property boolean $show_in_menu            { @initializer
	 *                                              @missing $show_ui }
	 * @property boolean $show_in_admin_bar       { @initializer
	 *                                              @missing $show_in_admin_bar }
	 * @property integer $menu_position           { @initializer
	 *                                              @omit_if_zero  }
	 * @property string $menu_icon                { @initializer }
	 * @property string $capability_type          { @initializer
	 *                                              @explode ","
	 *                                              @missing post }
	 * @property string|string[] $capabilities    { @initializer }
	 * @property boolean $map_meta_cap            { @initializer }
	 * @property boolean $hierarchical            { @initializer
	 *                                              @missing false }
	 * @property string|string[] $supports        { @initializer
	 *                                              @explode ","
	 *                                              @missing title,editor }
	 * @property string $register_meta_box_cb     { @initializer }
	 * @property string|string[] $taxonomies      { @initializer
	 *                                              @explode ","
	 *                                              @missing null }
	 * @property boolean $has_archive             { @initializer
	 *                                              @missing false }
	 * @property string $permalink_epmask         { @initializer
	 *                                              @missing EP_PERMALINK }
	 * @property boolean|Rewrite $rewrite         { @initializer
	 *                                              @missing true }
	 * @property boolean|string $query_var        { @initializer
	 *                                              @missing true }
	 * @property boolean $can_export              { @initializer
	 *                                              @missing true }
	 *
	 * @TODO Move these into the traits and allow the parse header to find them.
	 *
	 * // FROM Object_Plural_Trait
	 * @property string $plural
	 *
	 * // FROM Object_Slugs_Trait
	 * @property string $singular_slug
	 * @property string $plural_slug
	 *
	 */
	class Post_Type extends Object {

		const SLUG = 'post_type';

		const ID_FIELD = 'post_type';

		use Object_Plural_Trait;
		use Object_Slugs_Trait;
		use Object_Property_Filter_Trait;
		use Meta_Properties_Trait;
		use App_Properties_Trait;
		use Classname_Properties_Trait;

		/**
		 * @param boolean|string $post_type
		 *
		 * @return string
		 */
		function post_type( $post_type = false ) {

			$post_type = Util::get_prefixed_identifier( $post_type, $this->meta_prefix() );
			return  $post_type;

		}

	}

}

