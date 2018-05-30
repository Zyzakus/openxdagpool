<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Support\{ExclusiveLock, UnableToObtainLockException};

class CreateDataSnapshot extends Command
{
	protected $signature = 'data:snapshot';
	protected $description = 'Creates a snapshot of current livedata and fastdata for further cron processing.';

	protected $core;

	public function handle()
	{
		$lock = new ExclusiveLock('download_data', 100);
		$lock->obtain();

		copy(storage_path('livedata.json'), storage_path('work_livedata.json'));
		copy(storage_path('fastdata.json'), storage_path('work_fastdata.json'));

		$lock->release();
		$this->info('CreateDataSnapshot completed successfully.');
	}
}
