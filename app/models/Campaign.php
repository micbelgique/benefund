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
	 * 
	 */
	protected $fillable = array('title', 'item_vendor_id');
}