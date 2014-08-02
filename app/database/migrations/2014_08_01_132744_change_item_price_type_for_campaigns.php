<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeItemPriceTypeForCampaigns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campaign', function($table) {
			$table->dropColumn('item_price');
		});
		Schema::table('campaign', function($table) {
			$table->integer('item_price')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('campaign', function($table) {
			$table->dropColumn('item_price');
		});
		Schema::table('campaign', function($table) {
			$table->float('item_price');
		});
	}

}
