<?php

namespace App\Pool;

class BalancesChecker
{
	protected $balances = [];

	public function getBalance($address)
	{
		$core = new Core;
		$balance_json = $core->call('balance', ['address' => $address]);
		$balance_json = @json_decode($balance_json, true);

		if ($balance_json === false)
			return null;

		return $balance_json['balance'];
	}
}
