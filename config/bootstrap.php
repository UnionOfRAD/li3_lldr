<?php

use lithium\g11n\Catalog;

/**
 * Register the g11n resources with `Catalog` while maintaining existing
 * configurations. This makes the resources contained in this plugin available
 * to the application this plugin is contained in. `Message::translate()` calls
 * will utilize these resources automatically as long as no or the `li3_lldr`
 * named configuration is selected.
 */
Catalog::config(array(
	'li3_lldr' => array(
		'adapter' => 'Php',
		'path' => dirname(__DIR__) . '/resources/g11n/php'
	)
) + Catalog::config());

?>