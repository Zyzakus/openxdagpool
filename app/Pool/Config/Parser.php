<?php

namespace App\Pool\Config;

use App\Pool\BaseParser;

class Parser extends BaseParser
{
	protected $fee = 0, $reward = 0, $direct = 0, $fund = 0;
	protected $max_conn = 0, $max_ip = 0, $max_addr = 0;

	public function __construct(array $data)
	{
		parent::__construct($data);
		$this->data = $this->data['pool_config'] ?? [];
		$this->read();
	}

	public function getMaxConnections()
	{
		return $this->max_conn;
	}

	public function getMaxIp()
	{
		return $this->max_ip;
	}

	public function getMaxAddr()
	{
		return $this->max_addr;
	}

	public function getFee()
	{
		return $this->fee;
	}

	public function getReward()
	{
		return $this->reward;
	}

	public function getDirect()
	{
		return $this->direct;
	}

	public function getFund()
	{
		return $this->fund;
	}

	protected function read()
	{
		$this->fee = $this->data['fee'];
		$this->max_conn = $this->data['max_conn'];
		$this->max_ip = $this->data['max_ip'];
		$this->max_addr = $this->data['max_addr'];

		$this->fee = $this->data['fee'];
		$this->reward = $this->data['reward'];
		$this->direct = $this->data['direct'];
		$this->fund = $this->data['fund'];
	}
}
