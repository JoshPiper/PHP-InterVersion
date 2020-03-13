<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Internet\InterVersion\Version;

class VersionTest extends TestCase {
	public function goodVersions(){
		return [
			['0.0.0', 0, 0, 0],
			['1.2.3', 1, 2, 3],
			['3.2.1-alpha.1', 3, 2, 1, 'alpha.1'],
			['4.5.6+sha512.pls', 4, 5, 6, '', 'sha512.pls'],
			['6.5.4-beta2+20200313', 6, 5, 4, 'beta2', '20200313']
		];
	}

	/**
	 * @dataProvider goodVersions
	 * @param string $expected
	 * @param int $major
	 * @param int $minor
	 * @param int $patch
	 * @param string $pre
	 * @param string $build
	 */
	public function testValidConstruction(string $expected, int $major, int $minor, int $patch, string $pre = '', string $build = ''){
		$version = new Version($major, $minor, $patch, $pre, $build);
		$this->assertEquals($expected, (string)$version);
	}
}