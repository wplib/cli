<?php
/**
 *
 */
namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Object_Query_Var_Trait
	 *
	 * @package WPLib_CLI
	 *
	 * @property string query_var
	 *
	 */
	trait Object_Query_Var_Trait {

		/**
		 * @param string $query_var
		 *
		 * @return string
		 */
		function query_var( $query_var ) {

			return $query_var ? Util::get_prefixed_identifier( Util::root(), $query_var ) : $query_var;

		}

	}

}
