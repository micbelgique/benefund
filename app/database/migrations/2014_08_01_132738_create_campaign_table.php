<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaign', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->timestamp('date_start');
			$table->timestamp('date_end');
			$table->integer('item_vendor_id')->unsigned();
			$table->foreign('item_vendor_id')->references('id')->on('users');
			$table->string('item_title');
			$table->text('item_description')->nullable();
			$table->float('item_price');
			$table->string('target_title');
			$table->string('target_adress_street');
			$table->string('target_adress_street2');
			$table->string('target_adress_zip');
			$table->string('target_adress_city');
			$table->string('target_adress_country');
			$table->float('target_lat');
			$table->float('target_long');
			$table->text('target_description');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campaign');
	}

}
