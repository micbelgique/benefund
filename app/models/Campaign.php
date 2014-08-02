<?php

class Campaign extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campaign';

	/**
	 * The attributes focused by mass assignment.
	 */
	protected $fillable = array(
		'title',
		'description',
		'item_title',
		'item_vendor_id',
		'item_description',
		'target_title',
		'target_adress_street',
		'target_adress_street2',
		'target_adress_zip',
		'target_adress_city',
		'target_adress_country',
		'target_description');
}