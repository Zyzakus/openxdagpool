<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Pool\Core;

class DownloadFastData extends DownloadLiveData
{
	protected $signature = 'data:fast';
	protected $description = 'Downloads fast data from the openxdagpool-scripts endpoint.';

	protected function downloadFiles()
	{
		$this->downloadFile('fastdata', [], 'fastdata.json');
		$this->downloadFile('fastdata', ['human_readable' => true], 'fastdata.txt');
	}
}
