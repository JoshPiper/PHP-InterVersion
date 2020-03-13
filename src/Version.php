<?php


namespace Internet\InterVersion;


class Version {
	protected $major = 0;
	protected $minor = 0;
	protected $patch = 0;

	protected $pre = "";
	protected $build = "";

	public function __construct(int $major = 0, int $minor = 0, int $patch = 0, string $build = "", string $pre = ""){
		assert($major >= 0, 'major version must be at least zero.');
		assert($minor >= 0, 'minor version must be at least zero.');
		assert($patch >= 0, 'patch version must be at least zero.');

		$this->major = $major;
		$this->minor = $minor;
		$this->patch = $patch;
		$this->pre = $pre;
		$this->build = $build;
	}

	public function __toString(): string {
		$version = "{$this->major}.{$this->minor}.{$this->patch}";
		if (!empty($this->pre)){
			$version .= '-' . $this->pre;
		}
		if (!empty($this->build)){
			$version .= '+' . $this->build;
		}

		return $version;
	}
}