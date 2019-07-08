<?php

namespace RazorCreations\Tanda\Resources;

abstract class Resource {

	const DATEFORMAT = 'YYYY-MM-DD';
	
	protected $dates = [
		'created_at',
		'updated_at',
	];

	public function __construct(array $args)
	{
		foreach (get_object_vars($this) as $key => $value) {
			if (isset($args[$key])) {
				if (isset($this->dates[$key])) {
					$this->key = date(self::DATEFORMAT, $args[$key]);
					continue;
				}

				$this->$key = $args[$key];
			}
		}
	}
	
	public static function fromArray(array $args)
	{
		return new static($args);
	}
}