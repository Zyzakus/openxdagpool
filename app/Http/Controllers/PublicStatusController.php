<?php

namespace App\Http\Controllers;

use App\Pool\DataReader;

class PublicStatusController extends Controller
{
	protected $reader;

	public function __construct(DataReader $reader)
	{
		$this->reader = $reader;
	}

	public function json()
	{
		return response($this->reader->getLiveDataJson(), 200)->header('Content-Type', 'application/json');
	}

	public function humanReadable()
	{
		return response($this->reader->getLiveDataHumanReadable(), 200)->header('Content-Type', 'text/plain');
	}
}
