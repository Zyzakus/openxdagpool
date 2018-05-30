<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsFromFoundBlocksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('found_blocks', function (Blueprint $table) {
			$table->dropColumn('tag');
			$table->dropColumn('t');
			$table->dropColumn('res');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('found_blocks', function (Blueprint $table) {
			$table->string('tag', 40)->after('found_at')->default('');
			$table->string('t', 20)->after('hash')->default('');
			$table->string('res', 16)->after('t')->default('');
		});
	}
}
