<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * Message data for `sl`.
 *
 * Plural rule and forms derived from the GNU gettext documentation.
 *
 * @link http://www.gnu.org/software/gettext/manual/gettext.html#Plural-forms
 */
return array(
	'pluralForms' => 4,
	'pluralRule' => function ($n) {
		if ($n % 100 == 1) {
			return 0;
		} elseif ($n % 100 == 2) {
			return 1;
		} elseif ($n % 100 == 3 || $n % 100 == 4) {
			return 2;
		}
		return 3;
	}
);

?>