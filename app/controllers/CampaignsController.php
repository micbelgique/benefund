<?php

class CampaignsController extends BaseController {

	protected $layout = 'public.templates.main';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showIndex() {
		$campaigns = Campaign::all();

		$this->layout->content = View::make('public.campaigns.index')->with('campaigns', $campaigns);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function showNew() {
		$this->layout->content = View::make('public.campaigns.create');
	}

	public function postCreate() {

        $validator = Validator::make(Input::all(), Campaign::$rules );

        if( $validator->passes() ) {

    		$campaign = Campaign::create(
        		array(
                    'title'                 => Input::get('title'),
                    'description'           => Input::get('description'),
                    'item_title'            => Input::get('item_title'),
                    'item_vendor_id'        => Auth::user()->id,
                    'item_description'      => Input::get('item_description'),
                    'target_title'          => Input::get('target_title'),
                    'target_adress_street'  => Input::get('target_adress_street'),
                    'target_adress_street2' => Input::get('target_adress_street2'),
                    'target_adress_zip'     => Input::get('target_adress_zip'),
                    'target_adress_city'    => Input::get('target_adress_city'),
                    'target_adress_country' => Input::get('target_adress_country'),
                    'target_description'    => Input::get('target_description'),
                    'item_price'            => Input::get('item_price', 0)
				)
			);

			return Redirect::back()->with('message', Lang::get('campaigns.new.message', array('title' => Input::get('title'))));
		} else {
			return Redirect::back()
				->with('message', Lang::get('campaigns.new.error'))
				->withErrors($validator)
				->withInput();
		}
	}

	public function showEdit($id) {
		$campaign = Campaign::find($id);

		// If no item in database
		if(empty($campaign) || empty($campaign->id))
			return Redirect::route('public.campaigns')
				->with('message', Lang::get('campaigns.edit.inexistant'));

		$this->layout->content = View::make('public.campaigns.edit');
		$this->layout->content->campaign = $campaign;
    }

    public function postUpdate($id) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('public.campaigns')
                ->with('message', Lang::get('campaigns.edit.inexistant'));

        $validator = Validator::make( Input::all(), Campaign::$rules );

        if( $validator->passes() ) {
            $campaign->fill(
                array(
                    'title'                 => Input::get('title'),
                    'description'           => Input::get('description'),
                    'item_title'            => Input::get('item_title'),
                    'item_description'      => Input::get('item_description'),
                    'target_title'          => Input::get('target_title'),
                    'target_adress_street'  => Input::get('target_adress_street'),
                    'target_adress_street2' => Input::get('target_adress_street2'),
                    'target_adress_zip'     => Input::get('target_adress_zip'),
                    'target_adress_city'    => Input::get('target_adress_city'),
                    'target_adress_country' => Input::get('target_adress_country'),
                    'target_description'    => Input::get('target_description'),
                    'item_price'            => intval(Input::get('item_price', 0) * 100 )
                )
            )->save();

            return Redirect::back()->with('message', Lang::get('campaigns.edit.message', array('title' => Input::get('title'))));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('campaigns.edit.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function postDelete($id = 0) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('public.campaigns')
                ->with('message', Lang::get('campaigns.edit.inexistant'));

        try {
            $campaign->delete();
        } catch(Exception $e){
            return Redirect::back()->with('message', Lang::get('campaigns.delete.error'))->withInput();
        }

        return Redirect::route('public.campaigns')->with('message', Lang::get('campaigns.delete.message', array('title' => Input::get('title'))));
    }
}