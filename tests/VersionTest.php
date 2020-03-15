<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Internet\InterVersion\Version;
use Internet\InterVersion\Exceptions\VersionRangeException;

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

	public function badVersions(){
		return [
			[TypeError::class, 'this', 'will', 'crash'],
			[TypeError::class, [], 'big', 'boi'],
			[VersionRangeException::class, -1, 0, 0],
			[VersionRangeException::class, 0, -1, 0],
			[VersionRangeException::class, 0, 0, -1]
		];
	}

	/**
	 * @dataProvider badVersions
	 * @param string $expected
	 * @param $major
	 * @param $minor
	 * @param $patch
	 * @param $pre
	 * @param $build
	 */
	public function testInvalidConstruction(string $expected, $major, $minor, $patch, $pre = '', $build = ''){
		$this->expectException($expected);
		$version = new Version($major, $minor, $patch, $pre, $build);
	}
}
