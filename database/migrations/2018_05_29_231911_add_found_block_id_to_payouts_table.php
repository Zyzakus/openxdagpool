<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFoundBlockIdToPayoutsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payouts', function (Blueprint $table) {
			$table->unsignedInteger('found_block_id')->after('id');
			$table->foreign('found_block_id')->references('id')->on('found_blocks');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payouts', function (Blueprint $table) {
			$table->dropForeign(['found_block_id']);
			$table->dropColumn('found_block_id');
		});
	}
}
