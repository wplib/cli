<?php

/**
 * Namespace WPLib_CLI\Generate\Objects
 */
namespace WPLib_CLI\Generate\Objects {

	use JSON_Loader\Util;
	use \WPLib_CLI\Generate\Traits;
	use \WPLib_CLI\Generate\Base;

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
	 * @property string $raw_post_type
	 * @property string $slug
	 *
	 * // FROM Object_Plural
	 * @property string $plural
	 *
	 * // FROM Object_Slugs
	 * @property string $singular_slug
	 * @property string $plural_slug
	 *
	 */
	class Post_Type extends Base\Object {

		const SLUG = 'post_type';

		const ID_FIELD = 'post_type';

		use Traits\App_Properties;
		use Traits\Classname_Properties;
		use Traits\Meta_Properties;
		use Traits\Object_Plural;
		use Traits\Object_Property_Filter;
		use Traits\Object_Slugs;

		/**
		 * @param boolean|string $post_type
		 *
		 * @return string
		 */
		function post_type( $post_type = false ) {

			$post_type = Util::prepend_prefix( $post_type, $this->meta_prefix() );
			return  $post_type;

		}

		/**
		 * @param boolean|string $post_type
		 *
		 * @return string
		 */
		function raw_post_type( $post_type = false ) {

			if ( ! $post_type ) {
				$post_type = $this->post_type;
			}
			$post_type = Util::strip_prefix( $post_type, $this->meta_prefix() );

			return  $post_type;

		}

		/**
		 * @param string $slug
		 *
		 * @return string
		 */
		function slug( $slug ) {

			return $slug ? $slug : Util::dashify( $this->raw_post_type );
		}

	}

}

