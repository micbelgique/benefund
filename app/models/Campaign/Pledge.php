<?php

namespace Campaign;

use Eloquent;

class Pledge extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaigns_pledges';

    /**
     * The attributes focused by mass assignment.
     */
    protected $fillable = array(
        'campaign_id',
        'title',
        'description',
        'price_min',
        'price_max',
        'quantity'
    );

    public static $rules = array(
        'title'       => 'required|min:3',
        'campaign_id' => 'required|exists:campaigns,id',
        'price_min'   => 'numeric|min:0',
        'price_max'   => 'numeric|min:0',
        'quantity'    => 'integer|min:0'
    );

    public function campaign() {
        return $this->belongsTo('Campaign');
    }

}