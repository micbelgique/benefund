<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsPledgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns_pledges', function($table) {
			$table->increments('id');
			$table->integer('campaign_id')->unsigned();
			$table->foreign('campaign_id')->references('id')->on('campaigns');
			$table->string('title');
			$table->text('description');
			$table->integer('price_min')->default(-1);
			$table->integer('price_max')->default(-1);
			$table->integer('quantity');
			$table->timestamps();
			$table->softDeletes();
		});
		Schema::create('campaigns_pledges_users', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('campaign_pledge_id')->unsigned();
			$table->foreign('campaign_pledge_id')->references('id')->on('campaigns_pledges');
			$table->integer('price');
			$table->text('notes');
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
		Schema::drop('campaigns_pledges');
		Schema::drop('campaigns_pledges_users');
	}

}
