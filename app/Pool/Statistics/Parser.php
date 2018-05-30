<?php

namespace App\Pool\Statistics;

use App\Pool\BaseParser;

class Parser extends BaseParser
{
	protected $pool_hashrate = 0, $network_hashrate = 0, $blocks = 0, $main_blocks = 0, $difficulty = 0, $supply = 0;

	public function __construct(array $data)
	{
		parent::__construct($data);
		$this->data = $this->data['stats'] ?? [];
		$this->read();
	}

	public function getPoolHashrate()
	{
		return $this->pool_hashrate;
	}

	public function getNetworkHashrate()
	{
		return $this->network_hashrate;
	}

	public function getNumberOfBlocks()
	{
		return $this->blocks;
	}

	public function getNumberOfMainBlocks()
	{
		return $this->main_blocks;
	}

	public function getDifficulty()
	{
		return $this->difficulty;
	}

	public function getSupply()
	{
		return $this->supply;
	}

	protected function read()
	{
		$this->pool_hashrate = $this->data['hashrate'][0];
		$this->network_hashrate = $this->data['hashrate'][1];
		$this->blocks = $this->data['blocks'][0];
		$this->main_blocks = $this->data['main_blocks'][0];
		$this->difficulty = $this->data['chain_difficulty'][0];
		$this->supply = $this->data['xdag_supply'][0];
	}
}
