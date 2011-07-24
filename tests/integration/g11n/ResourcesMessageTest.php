<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace li3_lldr\tests\integration\g11n;

use lithium\core\Libraries;
use lithium\g11n\Catalog;
use lithium\util\Validator;

/**
 * Test for integration of g11n resources. Numbers of rules refer to those documented in
 * the document on pluralization at Mozilla.
 *
 * @link https://developer.mozilla.org/en/Localization_and_Plurals
 */
class ResourcesMessageTest extends \lithium\test\Unit {

	protected $_backups = array();

	public function setUp() {
		$this->_backups['catalogConfig'] = Catalog::config();
		Catalog::reset();
		Catalog::config(array(
			'li3_lldr' => array(
				'adapter' => 'Php',
				'path' => Libraries::get('li3_lldr', 'path') . '/resources/g11n/php'
		)));
	}

	public function tearDown() {
		Catalog::reset();
		Catalog::config($this->_backups['catalogConfig']);
	}

	/**
	 * Tests the plural rule #0 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Asian family:
	 * - Japanese (ja)
	 * - Korean (ko)
	 * - Vietnamese (vi)
	 *
	 * @return void
	 */
	public function testPlurals0() {
		$locales = array(
			'ja', 'ko', 'vi'
		);
		foreach ($locales as $locale) {
			$expected = 1;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '00000000000000000000000000000000000000000000000000';
			$expected .= '00000000000000000000000000000000000000000000000000';
			$expected .= '00000000000000000000000000000000000000000000000000';
			$expected .= '00000000000000000000000000000000000000000000000000';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #1 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Constructed language:
	 * - Esperanto (eo)
	 *
	 * Germanic family:
	 * - Danish (da)
	 * - Dutch (nl)
	 * - English (en)
	 * - Faroese (fo)
	 * - German (de)
	 * - Norwegian (no)
	 * - Norwegian Nynorsk (nn)
	 * - Swedish (sv)
	 *
	 * Finno-Urgic family:
	 * - Estonian (et)
	 * - Finnish (fi)
	 * - Hungarian (hu)
	 *
	 * Latin/Greek family:
	 * - Greek (el)
	 *
	 * Romanic family:
	 * - Italian (it)
	 * - Portuguese (pt)
	 * - Spanish (es)
	 *
	 * Semitic family:
	 * - Hebrew (he)
	 *
	 * Slavic family:
	 * - Bulgarian (bg)
	 *
	 * Turkic family:
	 * - Turkish (tr)
	 *
	 * @return void
	 */
	public function testPlurals1() {
		$locales = array(
			'eo',
			'da', 'nl', 'en', 'fo', 'de', 'no', 'nn', 'sv',
			'et', 'fi', 'hu',
			'eu',
			'el',
			'ca', 'it', 'pt', 'es',
			'he',
			'bg',
			'tr'
		);
		foreach ($locales as $locale) {
			$expected = 2;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '10111111111111111111111111111111111111111111111111';
			$expected .= '11111111111111111111111111111111111111111111111111';
			$expected .= '11111111111111111111111111111111111111111111111111';
			$expected .= '11111111111111111111111111111111111111111111111111';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #2 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Romanic family:
	 * - French (fr)
	 * - Brazilian Portuguese (pt_BR)
	 *
	 * @return void
	 */
	public function testPlurals2() {
		$locales = array(
			'fr', 'pt_BR'
		);
		foreach ($locales as $locale) {
			$expected = 2;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '00111111111111111111111111111111111111111111111111';
			$expected .= '11111111111111111111111111111111111111111111111111';
			$expected .= '11111111111111111111111111111111111111111111111111';
			$expected .= '11111111111111111111111111111111111111111111111111';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #3 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Baltic family:
	 * - Latvian (lv)
	 *
	 * @return void
	 */
	public function testPlurals3() {
		$locales = array(
			'lv'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '01222222222222222222212222222221222222222122222222';
			$expected .= '21222222222122222222212222222221222222222122222222';
			$expected .= '21222222222222222222212222222221222222222122222222';
			$expected .= '21222222222122222222212222222221222222222122222222';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #5 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Romanic family:
	 * - Romanian (ro)
	 *
	 * @return void
	 */
	public function testPlurals5() {
		$locales = array(
			'ro'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '10111111111111111111222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$expected .= '21111111111111111111222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #6 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Baltic family:
	 * - Lithuanian (lt)
	 *
	 * @return void
	 */
	public function testPlurals6() {
		$locales = array(
			'lt'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '20111111112222222222201111111120111111112011111111';
			$expected .= '20111111112011111111201111111120111111112011111111';
			$expected .= '20111111112222222222201111111120111111112011111111';
			$expected .= '20111111112011111111201111111120111111112011111111';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #7 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Slavic family:
	 * - Croatian (hr)
	 * - Serbian (sr)
	 * - Russian (ru)
	 * - Ukrainian (uk)
	 *
	 * @return void
	 */
	public function testPlurals7() {
		$locales = array(
			'hr', 'sr', 'ru', 'uk'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '20111222222222222222201112222220111222222011122222';
			$expected .= '20111222222011122222201112222220111222222011122222';
			$expected .= '20111222222222222222201112222220111222222011122222';
			$expected .= '20111222222011122222201112222220111222222011122222';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #8 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Slavic family:
	 * - Slovak (sk)
	 * - Czech (cs)
	 *
	 * @return void
	 */
	public function testPlurals8() {
		$locales = array(
			'sk', 'cs'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '20111222222222222222222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #9 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Slavic family:
	 * - Polish (pl)
	 *
	 * @return void
	 */
	public function testPlurals9() {
		$locales = array(
			'pl'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '20111222222222222222221112222222111222222211122222';
			$expected .= '22111222222211122222221112222222111222222211122222';
			$expected .= '22111222222222222222221112222222111222222211122222';
			$expected .= '22111222222211122222221112222222111222222211122222';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #10 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Slavic family:
	 * - Slovenian (sl)
	 *
	 * @return void
	 */
	public function testPlurals10() {
		$locales = array(
			'sl'
		);
		foreach ($locales as $locale) {
			$expected = 4;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '30122333333333333333333333333333333333333333333333';
			$expected .= '33333333333333333333333333333333333333333333333333';
			$expected .= '30122333333333333333333333333333333333333333333333';
			$expected .= '33333333333333333333333333333333333333333333333333';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}

	/**
	 * Tests the plural rule #11 which applies to the following languages
	 * grouped by family and sorted alphabetically.
	 *
	 * Celtic family:
	 * - Irish (ga)
	 *
	 * @return void
	 */
	public function testPlurals11() {
		$locales = array(
			'ga'
		);
		foreach ($locales as $locale) {
			$expected = 3;
			$result = Catalog::read(true, 'message.pluralForms', $locale);
			$this->assertEqual($expected, $result, "Locale: `{$locale}`\n{:message}");

			$rule = Catalog::read(true, 'message.pluralRule', $locale);

			$expected  = '20122222222222222222222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$expected .= '22222222222222222222222222222222222222222222222222';
			$result = '';

			for ($n = 0; $n < 200; $n++) {
				$result .= $rule($n);
			}
			$this->assertIdentical($expected, $result, "Locale: `{$locale}`\n{:message}");
		}
	}
}

?>