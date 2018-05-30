<?php

namespace App\Pool;

class BaseParser
{
	protected $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}
}
