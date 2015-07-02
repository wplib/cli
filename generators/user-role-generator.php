<?php

namespace WPLib_CLI {

	/**
	 * Class User_Role_Generator
	 *
	 * @property Object|User_Role $object
	 */
	class User_Role_Generator extends Model_View_Generator {

		const SLUG = 'user_role';

		const UNIQUE_ID = 'role_name';


		/**
		 * @todo Do we even need to register this?
		 */
		function register() {

			parent::register();

			$this->initialize( $this->object, $this );

		}


	}

}
