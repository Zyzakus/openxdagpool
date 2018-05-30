<?php

namespace App\Pool\State;

use App\Pool\BaseParser;

class Parser extends BaseParser
{
	protected $pool_version = 'unknown', $pool_state = 'unknown';

	public function __construct(array $data)
	{
		parent::__construct($data);
		$this->read();
	}

	public function getPoolVersion()
	{
		return $this->pool_version;
	}

	public function getPoolState()
	{
		return $this->pool_state;
	}

	public function isNormalPoolState()
	{
		return stripos($this->getPoolState(), 'normal operation') !== false || stripos($this->getPoolState(), 'transfer to complete') !== false;
	}

	protected function read()
	{
		$this->pool_version = $this->data['version'];
		$this->pool_state = $this->data['state'];
	}
}
