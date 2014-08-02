<?php

class Campaigns2Controller extends BaseController {

    protected $layout = 'public.templates.main';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showIndex()
    {
        $campaigns = Campaign::all();

        $this->layout->content = View::make('public.campaigns2.index');
        $this->layout->content->campaigns = $campaigns;
        $this->layout->content_title = Lang::get('campaigns.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showNew()
    {
        $this->layout->content = View::make('public.campaign.create');
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
