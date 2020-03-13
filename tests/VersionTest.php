<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Internet\InterVersion\Version;

class VersionTest extends TestCase {
	public function goodVersions(){
		return [
			['0.0.0', 0, 0, 0]
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