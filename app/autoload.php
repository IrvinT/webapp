<?php
/**
 * app: An extensible micro-framework.
 *
 * @copyright   Copyright (c) 2013, Mike Cao <mike@mikecao.com>
 * @license     MIT, http://appphp.com/license
 */

require_once __DIR__.'/core/Loader.php';

\app\core\Loader::autoload(true, dirname(__DIR__));
