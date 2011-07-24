<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * Message data for `pl`.
 *
 * Plural rule and forms derived from the GNU gettext documentation.
 *
 * @link http://www.gnu.org/software/gettext/manual/gettext.html#Plural-forms
 */
return array(
	'pluralForms' => 3,
	'pluralRule' => function ($n) {
		if ($n == 1) {
			return 0;
		} elseif ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20)) {
			return 1;
		}
		return 2;
	}
);

?>