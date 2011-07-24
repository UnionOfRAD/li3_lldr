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

class ResourcesValidatorTest extends \lithium\test\Unit {

	protected $_backups = array();

	public function setUp() {
		$this->_backups['catalogConfig'] = Catalog::config();
		Catalog::reset();
		Catalog::config(array(
			'li3_lldr' => array(
				'adapter' => 'Php',
				'path' => Libraries::get('li3_lldr', 'path') . '/resources/g11n/php'
		)));
		Validator::__init();
	}

	public function tearDown() {
		Catalog::reset();
		Catalog::config($this->_backups['catalogConfig']);
	}

	public function testDaDk() {
		Validator::add(Catalog::read(true, 'validation', 'da_DK'));

		$this->assertTrue(Validator::isSsn('123456-1234'));
		$this->assertFalse(Validator::isSsn('12345-1234'));
	}

	public function testDeBe() {
		Validator::add(Catalog::read(true, 'validation', 'de_BE'));

		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertFalse(Validator::isPostalCode('0123'));
	}

	public function testDeCH() {
		Validator::add(Catalog::read(true, 'validation', 'de_CH'));

		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertFalse(Validator::isPostalCode('0123'));
		$this->assertFalse(Validator::isPostalCode('12345'));
	}

	public function testDeDe() {
		Validator::add(Catalog::read(true, 'validation', 'de_DE'));

		$this->assertTrue(Validator::isPostalCode('12345'));
		$this->assertFalse(Validator::isPostalCode('123456'));
	}

	public function testEnCa() {
		Validator::add(Catalog::read(true, 'validation', 'en_CA'));

		$this->assertTrue(Validator::isPhone('(401) 321-9876'));

		$this->assertTrue(Validator::isPostalCode('M5J 2G8'));
		$this->assertTrue(Validator::isPostalCode('H2X 3X5'));
	}

	public function testEnGb() {
		Validator::add(Catalog::read(true, 'validation', 'en_GB'));

		$this->assertTrue(Validator::isPostalCode('M1 1AA'));
		$this->assertTrue(Validator::isPostalCode('M60 1NW'));
		$this->assertTrue(Validator::isPostalCode('CR2 6XH'));
		$this->assertTrue(Validator::isPostalCode('DN55 1PT'));
		$this->assertTrue(Validator::isPostalCode('W1A 1HQ'));
		$this->assertTrue(Validator::isPostalCode('EC1A 1BB'));
		$this->assertTrue(Validator::isPostalCode('FK7 0AQ'));
		$this->assertTrue(Validator::isPostalCode('FK8 2ET'));
		$this->assertTrue(Validator::isPostalCode('FK8 1EB'));
		$this->assertTrue(Validator::isPostalCode('EH1 1QX'));
		$this->assertFalse(Validator::isPostalCode('EH1-1QX'));
		$this->assertFalse(Validator::isPostalCode('EH11QX'));
		$this->assertFalse(Validator::isPostalCode('FEH1 1QX'));
	}

	public function testEnUs() {
		Validator::add(Catalog::read(true, 'validation', 'en_US'));

		$this->assertTrue(Validator::isPhone('(401) 321-9876'));

		$this->assertTrue(Validator::isPostalCode('11201'));
		$this->assertTrue(Validator::isPostalCode('11201-0456'));

		$this->assertTrue(Validator::isSsn('478-36-4120'));
		$this->assertFalse(Validator::isSsn('478-36-41200'));
		$this->assertFalse(Validator::isSsn('478364120'));
	}

	public function testFrFr() {
		Validator::add(Catalog::read(true, 'validation', 'fr_FR'));

		$this->assertTrue(Validator::isPostalCode('12345'));
		$this->assertTrue(Validator::isPostalCode('01234'));
		$this->assertFalse(Validator::isPostalCode('1234'));
	}

	public function testFrCH() {
		Validator::add(Catalog::read(true, 'validation', 'fr_CH'));

		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertFalse(Validator::isPostalCode('0123'));
		$this->assertFalse(Validator::isPostalCode('12345'));
	}

	public function testFrBe() {
		Validator::add(Catalog::read(true, 'validation', 'fr_BE'));

		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertFalse(Validator::isPostalCode('0123'));
	}

	public function testFrCa() {
		Validator::add(Catalog::read(true, 'validation', 'fr_CA'));

		$this->assertTrue(Validator::isPhone('(401) 321-9876'));

		$this->assertTrue(Validator::isPostalCode('M5J 2G8'));
		$this->assertTrue(Validator::isPostalCode('H2X 3X5'));
	}

	public function testItIt() {
		Validator::add(Catalog::read(true, 'validation', 'it_IT'));

		$this->assertTrue(Validator::isPostalCode('12345'));
		$this->assertFalse(Validator::isPostalCode('123456'));
	}

	public function testItCH() {
		Validator::add(Catalog::read(true, 'validation', 'it_CH'));

		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertFalse(Validator::isPostalCode('0123'));
		$this->assertFalse(Validator::isPostalCode('12345'));
	}

	public function testNlBe() {
		Validator::add(Catalog::read(true, 'validation', 'nl_BE'));

		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertTrue(Validator::isPostalCode('1234'));
		$this->assertFalse(Validator::isPostalCode('0123'));
	}

	public function testNlNl() {
		Validator::add(Catalog::read(true, 'validation', 'nl_NL'));

		$this->assertTrue(Validator::isSsn('123456789'));
		$this->assertFalse(Validator::isSsn('12345678'));
	}
}

?>