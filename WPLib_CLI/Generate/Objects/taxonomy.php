<?php

/**
 * Namespace WPLib_CLI\Generate\Objects
 */
namespace WPLib_CLI\Generate\Objects {

	use JSON_Loader\Util;
	use \WPLib_CLI\Generate\Traits;
	use \WPLib_CLI\Generate\Base;

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
	 * @property string $raw_taxonomy
	 * @property string $slug
	 *
	 * // FROM Object_Plural
	 * @property string $plural
	 *
	 * // FROM Object_Slugs
	 * @property string $singular_slug
	 * @property string $plural_slug
	 *
	 *
	 */
	class Taxonomy extends Base\Object {

		const SLUG = 'taxonomy';

		const ID_FIELD = 'taxonomy';

		use Traits\App_Properties;
		use Traits\Classname_Properties;
		use Traits\Meta_Properties;
		use Traits\Object_Plural;
		use Traits\Object_Property_Filter;
		use Traits\Object_Slugs;


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

		/**
		 * @param boolean|string $taxonomy
		 *
		 * @return string
		 */
		function taxonomy( $taxonomy = false ) {

			$taxonomy = Util::prepend_prefix( $taxonomy, $this->meta_prefix() );
			return  $taxonomy;

		}

		/**
		 * @param boolean|string $taxonomy
		 *
		 * @return string
		 */
		function raw_taxonomy( $taxonomy = false ) {

			if ( ! $taxonomy ) {
				$taxonomy = $this->taxonomy;
			}

			$taxonomy = Util::strip_prefix( $taxonomy, $this->meta_prefix() );

			return $taxonomy;

		}

		/**
		 * @param string $slug
		 *
		 * @return string
		 */
		function slug( $slug ) {

			return $slug ? $slug : Util::dashify( $this->raw_taxonomy );
		}




	}

}

