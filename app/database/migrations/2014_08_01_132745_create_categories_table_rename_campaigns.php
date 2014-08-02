<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTableRenameCampaigns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('categories')) {
			Schema::create('categories', function($table) {
				$table->increments('id');
				$table->string('title', 100);
				$table->text('description');

				$table->timestamps();
				$table->softDeletes();
			});
		}

		if (!Schema::hasTable('campaigns')) {
			Schema::rename('campaign', 'campaigns');
		}

		Schema::table('campaigns', function($table) {
			if (Schema::hasColumn('campaigns', 'category_id')) {
    			$table->dropColumn('category_id');
			}
			if (!Schema::hasColumn('campaigns', 'category_id')) {
    			$table->integer('category_id')->unsigned()->default(0);
			}
			//$table->foreign('category_id')->references('id')->on('categories');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	}

}
