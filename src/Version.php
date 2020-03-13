<?php


namespace Internet\InterVersion;


use Internet\InterVersion\Exceptions\VersionRangeException;

class Version {
	protected $major = 0;
	protected $minor = 0;
	protected $patch = 0;

	protected $pre = "";
	protected $build = "";

	public function __construct(int $major = 0, int $minor = 0, int $patch = 0, string $pre = "", string $build = ""){
		if ($major < 0){throw new VersionRangeException("major version must be at least zero, got {$major}");}
		if ($minor < 0){throw new VersionRangeException("minor version must be at least zero, got {$major}");}
		if ($patch < 0){throw new VersionRangeException("patch version must be at least zero, got {$major}");}

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
