<?php

namespace WPLib_CLI {

	use JSON_Loader\Util;

	/**
	 * Class Project
	 *
     * @property Meta $meta             { @required }
	 *
	 * @property Site|string $site      { @required
	 *                                    @loadable }
	 * @property App|string $app        { @required
	 *                                    @loadable }
	 * @property Theme|string $theme    { @required
	 *                                    @loadable }
	 */
	class Project extends Object {

		const SLUG = 'meta';

	}

}

