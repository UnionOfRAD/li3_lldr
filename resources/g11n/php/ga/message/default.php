<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * Message data for `ga`.
 *
 * Plural rule and forms derived from the GNU gettext documentation.
 *
 * @link http://www.gnu.org/software/gettext/manual/gettext.html#Plural-forms
 */
return array(
	'pluralForms' => 3,
	'pluralRule' => function ($n) { return $n == 1 ? 0 : ($n == 2 ? 1 : 2); }
);

?>