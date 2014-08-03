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
		'target_description',
		'category_id'
	);

	public static $rules = array(
		'title'          => 'required|min:3',
		// 'item_title'     => 'required|min:3',
		// 'item_vendor_id' => 'required|exists:users,id',
		// 'target_title'   => 'required|min:3',
		'category_id'	 => 'required|exists:categories,id'
	);

	public function vendor() {
		return $this->hasOne('User', 'id', 'item_vendor_id' );
	}

	public function category() {
		return $this->hasOne('Category', 'id', 'category_id' );
	}

	public function pledges() {
		return $this->hasMany('Campaign\Pledge', 'campaign_id', 'id' );
	}


	public function get_image( $size = 'medium' ) {
		$avatar_url = 'uploads/campaigns/' . $this->id . '_' . $size . '.png';
		if( File::exists( $avatar_url ) ) {
			return asset( $avatar_url );
		} else {
			switch( $size ) {
				case 'medium':
					return 'http://placehold.it/220x157';
				case 'banner':
					return 'http://placehold.it/740x249';
			}
		}
		return false;
	}

	public function get_cover($width = 1000, $height = 300) {
		$file_url = 'uploads/campaigns/covers/' . $this->id . '.png';
		return ( File::exists( $file_url ) ) ? asset(Croppa::url( $file_url, $width, $height )) : 'http://placehold.it/' . $width . 'x' . $height . '/ccc/ccc';
	}

	public function get_thumb($width = 64, $height = 64) {
		$file_url = 'uploads/campaigns/thumbs/' . $this->id . '.png';
		return ( File::exists( $file_url ) ) ? asset(Croppa::url( $file_url, $width, $height )) : 'http://placehold.it/' . $width . 'x' . $height . '/ccc/ccc';
	}
}