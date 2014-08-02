<?php

class Campaign extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'campaigns';

	/**
	 * The attributes focused by mass assignment.
	 */
	protected $fillable = array(
		'title',
		'description',
		'item_title',
		'item_vendor_id',
		'item_description',
		'item_price',
		'target_title',
		'target_adress_street',
		'target_adress_street2',
		'target_adress_zip',
		'target_adress_city',
		'target_adress_country',
		'target_description'
	);

	public static $rules = array(
		'title'          => 'required|min:3',
		'item_title'     => 'required|min:3',
		// 'item_vendor_id' => 'required|exists:users,id',
		'target_title'   => 'required|min:3',
	);

	public function vendor() {
		return $this->hasOne('User', 'id', 'item_vendor_id' );
	}

}