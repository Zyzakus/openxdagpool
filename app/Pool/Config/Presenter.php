<?php

namespace App\Pool\Config;

class Presenter
{
	protected $parser;

	public function __construct(Parser $parser)
	{
		$this->parser = $parser;
	}

	public function getFee()
	{
		return $this->parser->getFee() . '%';
	}

	public function getFeeConfig()
	{
		return $this->parser->getFee() . '% pool fee, ' . $this->parser->getReward() . '% reward for found block, ' .
			$this->parser->getDirect() . '% reward for direct contributions to found block, ' .
			$this->parser->getFund() . '% donation to community fund (' .
			(100 - $this->getFeeSum()) . '% of found block reward is split amongst all connected miners whether they contributed to the current block or not)';
	}

	protected function getFeeSum()
	{
		return $this->parser->getFee() + $this->parser->getReward() + $this->parser->getDirect() + $this->parser->getFund();
	}
}
