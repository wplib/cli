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
	 *                                              @default true
	 *                                              @wp_default false }
	 * @property bool $exclude_from_search        { @post_type_arg
	 *                                              @wp_default ! $public }
	 * @property bool $publicly_queryable         { @post_type_arg
	 *                                              @wp_default $public }
	 * @property bool $show_ui                    { @post_type_arg
	 *                                              @wp_default $public }
	 * @property bool $show_in_nav_menus          { @post_type_arg
	 *                                              @wp_default $public }
	 * @property bool $show_in_menu               { @post_type_arg
	 *                                              @wp_default $show_ui }
	 * @property bool $show_in_admin_bar          { @post_type_arg
	 *                                              @wp_default $show_in_admin_bar }
	 * @property int $menu_position               { @post_type_arg
	 *                                              @omit_if_zero  }
	 * @property string $menu_icon                { @post_type_arg }
	 * @property string $capability_type          { @post_type_arg
	 *                                              @default post
	 *                                              @wp_default post }
	 * @property string|string[] $capabilities    { @post_type_arg }
	 * @property bool $map_meta_cap               { @post_type_arg }
	 * @property bool $hierarchical               { @post_type_arg
	 *                                              @wp_default false }
	 * @property string|string[] $supports        { @post_type_arg
	 *                                              @explode ","
	 *                                              @wp_default title,editor }
	 * @property string $register_meta_box_cb     { @post_type_arg }
	 * @property string|string[] $taxonomies      { @post_type_arg
	 *                                              @wp_default null }
	 * @property bool $has_archive                { @post_type_arg
	 *                                              @wp_default false }
	 * @property string $permalink_epmask         { @post_type_arg
	 *                                              @wp_default EP_PERMALINK }
	 *
	 * @property bool|Rewrite $rewrite            { @post_type_arg
	 *                                              @wp_default true }
	 * @property string $query_var                { @post_type_arg
	 *                                              @wp_default true }
	 * @property bool $can_export                 { @post_type_arg
	 *                                              @wp_default true }
	 * @property string $non_prefixed_post_type
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

		const SLUG = 'post_type';

		function __construct( $value, $parent = false, $args = array() ) {
			parent::__construct( $value, $parent, $args );
		}

		/**
		 * @param string $module_name
		 *
		 * @return string
		 */
		function module_name( $module_name ) {

			return $module_name ? $module_name : 'post-type-' . \JSON_Loader::dashify( $this->non_prefixed_post_type );

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
		 * @param bool|string $post_type
		 *
		 * @return string
		 */
		function post_type( $post_type = false ) {

			if ( ! $post_type ) {

				$post_type = \JSON_Loader\Loader::get_state_property( $this, 'post_type' );

			}

			$post_type = \WPLib_CLI::get_prefixed_identifier( $post_type, $this->root()->short_prefix );

			return $post_type;

		}

		/**
		 * @param bool|string $post_type
		 *
		 * @return string
		 */
		function non_prefixed_post_type( $post_type = false ) {

			return \WPLib_CLI::get_non_prefixed_identifier(

				$this->post_type( $post_type ),

				$this->root()->short_prefix

			);

		}


		/**
		 * @param string $query_var
		 *
		 * @return string
		 */
		function query_var( $query_var ) {

			return $query_var ? \WPLib_CLI::get_prefixed_identifier( $this->root(), $query_var ) : $query_var;

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
		function singular_slug( $slug ) {

			return $slug ? $slug : $this->non_prefixed_post_type();

		}

		/**
		 * @param null|string $slug
		 *
		 * @return string
		 */
		function plural_slug( $slug ) {

			return $slug ? $slug : "{$this->singular_slug}s";

		}

		/**
		 * @param bool|string $class_name
		 *
		 * @return string
		 */
		function singular_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->class_name_base() . \JSON_Loader::underscorify( $this->singular );

			}

			return $class_name;

		}

		/**
		 * @param bool|string $class_name
		 *
		 * @return string
		 */
		function plural_class_name( $class_name = false ) {

			if ( ! $class_name ) {

				$class_name = $this->class_name_base() . \JSON_Loader::underscorify( $this->plural() );

			}

			return $class_name;

		}

		/**
		 * @return string
		 */
		function class_name_base() {

			return "{$this->root()->prefix}_";

		}

		/**
		 * @return App
		 */
		function app() {

			return $this->__parent__;

		}

		/**
		 * @return Root
		 */
		function root() {

			return $this->app()->__parent__;

		}

		/**
		 * @return array
		 */
		function post_type_args() {

			$post_type_args = array();

			foreach( $this->__meta__ as $field_name => $property ) {

				if ( $property->is_true( 'post_type_arg' ) ) {

					$post_type_args[ $field_name ] = $property;

				}

			}

			return $post_type_args;

		}


		/**
		 * @param JSON_Loader\Property[] $args
		 * @return array
		 */
		function filter_default_values( $args ) {

			foreach ( $args as $property_name => $property ) {

				if ( is_null( $property_value = $property->value() ) ) {

					unset( $args[ $property_name ] );
					continue;

				}

				$wp_default = $property->get_extra( 'wp_default' );

				if ( ! preg_match( '#^(!?)\s*\$(\w+)$#', $wp_default, $matches ) ) {

					$default_property_value = $wp_default;

				} else {

					if ( ! isset( $args[ $default_property_name = $matches[2] ] ) ) {

						\JSON_Loader\Loader::log_error( "Property {$default_property_name} not declared but referenced in a @wp_default for {$property_name} yet. Must be declared before referenced." );

					} else {

						$not = '!' === $matches[ 1 ];

						$default_property = $args[ $default_property_name ];

						$default_property_value = $not ? ! $default_property->value() : $default_property->value();

					}

				}

				if ( $default_property_value === $property_value ) {

					unset( $args[ $property_name ] );

				}


			}

			return $args;

		}


		/**
		 * Converts anything that has
		 *
		 * @param JSON_Loader\Property[] $args
		 * @return array
		 */
		function explode_args( $args ) {

			foreach ( $args as $property_name => $property ) {

				if ( $property->explode ) {

					if ( is_string( $value = $property->value() ) ) {

						$state = JSON_Loader\Loader::get_state( $this );

						$state->clear_cached_property( $property_name );

						$value = explode( $property->explode, $value );

						$property->value = $value;

						$state->values[ $property_name ] = $value;

						JSON_Loader\Loader::set_state( $this, $state );

					}

				}

			}

			return $args;

		}

	}

}

