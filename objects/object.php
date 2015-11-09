<?php

namespace WPLib_CLI {

	use \JSON_Loader;

	/**
	 * Class Object
	 *
	 * @property Meta $meta
	 */
	class Object extends JSON_Loader\Object {

		const SLUG = 'object';

		const ID_FIELD = 'slug';

		function object_type( $object_type ) {

			return $object_type ? $object_type : static::SLUG;

		}

		function meta( $meta ) {

			if ( is_null( $meta ) && ! $this instanceof Meta ) {

				$object = $this->get_parent();

				do {

					$meta = null;

					if ( is_null( $object ) ) {
						break;
					}

					if ( ! $object instanceof Object ) {
						break;
					}

					$value = null;

					do {

						if ( ! $object->has_property( 'meta' ) ) {
							break;
						}

						$meta = $object->get_value( 'meta' );

						if ( ! $meta instanceof Meta ) {
							break;
						}

						if ( is_null( $meta->get_value( 'meta' ) ) ) {
							break;
						}

						$value = $meta;

					} while ( false );

					if ( $value instanceof Meta ) {
						break;
					}

					$object = $object->get_parent();

				} while ( true );

			}

			return $meta;

		}

		/**
		 * @return string
		 */
		function this_slug() {

			return $this->meta->slug;

		}

		/**
		 * @return string
		 */
		function this_name() {

			return $this->meta->name;

		}

		/**
		 * @return string
		 */
		function this_prefix() {

			return $this->meta->prefix;

		}

		/**
		 * @return string
		 */
		function this_text_domain() {

			return $this->this_slug();

		}

		/**
		 * @return Property[]
		 */
		function get_properties() {

			$properties = parent::get_properties();

			if ( $this instanceof Meta ) {

				unset( $properties[ 'meta' ] );

			}

			return $properties;
		}

		/**
		 * @param string $property_name
		 * @param mixed $value
		 * @param boolean|Object $parent
		 *
		 * @return boolean
		 */
		function do_instantiate_value( $property_name, $value, $parent = false ) {

			if ( 'meta' === $property_name && $this->get_parent() ) {

				$value = null;

			} else {

				$value = parent::do_instantiate_value( $property_name, $value, $parent );

			}

			return $value;

		}

		/**
		 * @param string $property_name
		 * @param integer $level
		 *
		 * @return boolean
		 */
		function do_validate_value( $property_name, $level = 0 ) {

			if ( 'meta' === $property_name && $this->get_parent() ) {
				/*
				 * Meta and and object parent? Don't validate it.
				 */
				$validated = true;

			} else {

				$validated = parent::do_validate_value( $property_name, $level );

			}

			return $validated;

		}


	}
}
