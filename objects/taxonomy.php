<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Taxonomy
	 *
	 * @property string $taxonomy                 { @required }
	 * @property string|string[] $post_types      { @explode "," }
	 * @property string $singular
	 * @property string $description
	 *
	 * @property boolean $public                  { @initializer
	 *                                              @default true
	 *                                              @missing false }
	 * @property boolean $show_ui                 { @initializer
	 *                                              @missing $public }
	 * @property boolean $show_in_nav_menus       { @initializer
	 *                                              @missing $public }
	 * @property boolean $show_tagcloud           { @initializer
	 *                                              @missing $show_ui }
	 * @property boolean $show_in_quick_edit      { @initializer
	 *                                              @missing $public }
	 * @property string $meta_box_cb              { @initializer }
	 *
	 * @property boolean $show_admin_column       { @initializer
	 *                                              @default true
	 *                                              @missing false }
	 * @property boolean $hierarchical            { @initializer
	 *                                              @missing false }
	 * @property integer $update_count_callback   { @initializer }
	 * @property boolean|string $query_var        { @initializer
	 *                                              @missing $taxonomy }
	 * @property boolean|Rewrite $rewrite         { @initializer
	 *                                              @missing true }
	 * @property string|string[] $capabilities    { @initializer }
	 * @property boolean $sort
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
	 *
	 */
	class Taxonomy extends Object {

		const SLUG = 'taxonomy';

		const ID_FIELD = 'taxonomy';

		use Object_Plural_Trait;
		use Object_Slugs_Trait;
		use Object_Property_Filter_Trait;
		use Meta_Properties_Trait;
		use App_Properties_Trait;
		use Classname_Properties_Trait;


		/**
		 * @param string $singular
		 *
		 * @return string
		 */
		function singular( $singular = null ) {

			if ( ! $singular ) {

				$singular = ucwords( str_replace( '_', ' ', $this->taxonomy ) );

			}

			return $singular ;

		}

		/**
		 * @param string|string[] $post_types
		 *
		 * @return string
		 */
		function post_types( $post_types = null ) {

			return Util::comma_string_to_array( $post_types );

		}

		/**
		 * @param null|callable l $value
		 *
		 * @return null|string
		 */
		function update_count_callback( $value = null ) {

			if ( empty( $value ) && in_array( 'attachment', $this->post_types ) ) {

				/**
				 * See register_taxonomy() doc on Codex for why set $update_count_callback
				 * to _update_generic_term_count() for 'attachment'
				 */
				$value = '_update_generic_term_count';

			}

			return $value;

		}


	}

}

