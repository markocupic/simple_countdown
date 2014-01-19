<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Simple_countdown
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'MCupic',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'MCupic\SimpleCountdown\SimpleCountdown' => 'system/modules/simple_countdown/elements/SimpleCountdown.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_simple_countdown' => 'system/modules/simple_countdown/templates',
));
