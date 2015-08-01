<?php

namespace WPLib_CLI {

	/**
	 * Class Root
	 *
	 * @property string $site_name         { @required }
	 * @property string $prefix            { @required }
	 * @property string $short_prefix      { @required }
	 * @property string $slug              { @required }
	 * @property string $root_dir          { @required }
	 * @property string $text_domain       { @default $slug }
	 * @property App $app
	 * @property Theme $theme
	 */
	class Root extends Object {

		const SLUG = 'root';

		const ID_FIELD = 'slug';

	}

}


