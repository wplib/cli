<?php

namespace WPLib_CLI {

	use JsonLoader\Util;

	/**
	 * Class Meta
	 *
	 * @property string $name              { @required
	 *                                       @underscorified }
	 *
	 * @property string $prefix            { @required
	 *                                       @underscorified
	 *                                       @lowercased }
	 *
	 * @property string $slug              { @required
	 *                                       @lowercased
	 *                                       @dashified }
	 *
	 * @property null $meta
	 *
	 */
	class Meta extends Object {

		const SLUG = 'meta';

		function __construct( $value, $parent = false, $args = array() ) {

			parent::__construct( $value, $parent, $args );

			if ( 0 === count( $value ) ) {

				$this->set_value( 'meta', null );

			}

		}

	}

}

