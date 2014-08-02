<?php

class CampaignsController extends BaseController {

    protected $layout = 'public.templates.main';

    public function __construct() {
        $this->scripts[] = 'http://maps.googleapis.com/maps/api/js?sensor=false&#038;ver=4.0-alpha';
        $this->scripts[] = '/assets/js/campaigns.js';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showDetails($id) {
        $campaign = Campaign::find($id);
        
        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('home')
                ->with('message', Lang::get('admin/campaigns.inexistant'));

        $this->layout->content = View::make('public.campaigns.details');
        $this->layout->content->campaign = $campaign;
        $this->layout->content->vendor = User::find($campaign->vendor()->first()->id);
        $this->layout->content_title = $campaign->title;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showNew()
    {
        $categories = Category::all();

        $this->layout->content = View::make('public.campaigns.create');
        $this->layout->content->categories = $categories;
        $this->layout->content_title = Lang::get('campaigns.new.title');
    }

    public function postCreate()
    {
        $rules = array(
            'title' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules );

        if( $validator->passes() ) {

            $campaign = Campaign::create(
                array(
                    'title' => Input::get('title'),
                    'item_vendor_id' => Auth::user()->id
                )
            );

            return Redirect::back()->with('message', Lang::get('campaign.new.message', array('title' => Input::get('title'))));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('campaign.new.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }
}