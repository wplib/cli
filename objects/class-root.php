<?php

namespace WPLib_CLI {

	use JSON_Loader;

	/**
	 * Class Root
	 *
	 * @property string $site_name         { @required }
	 * @property string $prefix            { @required }
	 * @property string $short_prefix      { @required }
	 * @property string $slug              { @required }
	 * @property string $themes_dir        { @required }
	 * @property string $text_domain
	 * @property App $app
	 * @property Theme $theme
	 */
	class Root extends JSON_Loader\Object {

		const SLUG = 'root';


	}

}


