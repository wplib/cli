<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Taxonomy
	 *
	 * @property string $taxonomy                 { @required }
	 * @property string|string[] $object_type
	 * @property string $singular
	 * @property string $description
	 *
	 * @property bool $public                     { @initializer
	 *                                              @default true
	 *                                              @wp_default false }
	 * @property bool $show_ui                    { @initializer
	 *                                              @wp_default $public }
	 * @property bool $show_in_nav_menus          { @initializer
	 *                                              @wp_default $public }
	 * @property bool $show_tagcloud              { @initializer
	 *                                              @wp_default $show_ui }
	 * @property bool $show_in_quick_edit         { @initializer
	 *                                              @wp_default $public }
	 * @property string $meta_box_cb              { @initializer }
	 *
	 * @property bool $show_admin_column          { @initializer
	 *                                              @default true
	 *                                              @wp_default false }
	 * @property bool $hierarchical               { @initializer
	 *                                              @wp_default false }
	 * @property int $update_count_callback       { @initializer }
	 * @property bool|string $query_var           { @initializer
	 *                                              @wp_default $taxonomy }
	 * @property bool|Rewrite $rewrite            { @initializer
	 *                                              @wp_default true }
	 * @property string|string[] $capabilities    { @initializer }
	 * @property bool $sort
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

		use Object_Plural_Trait;
		use Object_Slugs_Trait;
		use Object_Query_Var_Trait;

		const SLUG = 'taxonomy';

		const UNIQUE_ID = 'taxonomy';

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
		 * @param string|string[] $object_type
		 *
		 * @return string
		 */
		function object_type( $object_type = null ) {

			return Util::comma_string_to_array( $object_type );

		}


		/**
		 * @param null|callable l $value
		 *
		 * @return null|string
		 */
		function update_count_callback( $value = null ) {

			if ( empty( $value ) && in_array( 'attachment', $this->object_type ) ) {

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

