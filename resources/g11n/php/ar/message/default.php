<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * Message data for `ar`.
 */
return array(
	'pluralForms' => 6,
	'pluralRule' => function ($n) {
		if ($n == 0) {
			return 0;
		} elseif ($n == 1) {
			return 1;
		} elseif ($n == 2) {
			return 2;
		} elseif ($n >=3 && $n <= 10) {
			return 3;
		} elseif ($n >= 11 && $n <= 99) {
			return 4;
		}
		return 5;
	}
);

?>