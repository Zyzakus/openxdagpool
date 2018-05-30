<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsFromPayoutsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payouts', function (Blueprint $table) {
			$table->dropColumn('date_fully_imported');
			$table->dropColumn('tag');
			$table->dropColumn('sender');
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
			$table->string('tag', 40)->default('');
			$table->string('sender', 32)->default('');
			$table->boolean('date_fully_imported')->default(false);
		});
	}
}
