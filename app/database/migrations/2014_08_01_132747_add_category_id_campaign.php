<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdCampaign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campaigns', function($table) {
			if (!Schema::hasColumn('campaigns', 'category_id')) {
				$table->integer('category_id')->default(0)->unsigned();
				$table->foreign('category_id')->references('id')->on('categories');
			}
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
			$table->dropColumn('category_id');
		});
	}

}
