<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCategoryIdCampaign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campaigns', function($table) {
			$table->dropColumn('category_id');
		});
		Schema::table('campaigns', function($table) {
			$table->integer('category_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('campaigns', function($table) {
			$table->dropColumn('category_id');
		});
		Schema::table('campaigns', function($table) {
			$table->integer('category_id')->unsigned()->default(0);
		});
	}

}
