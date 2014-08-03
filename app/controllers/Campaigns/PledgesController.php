<?php

namespace Campaigns;

use \View, \Campaign, \Category, \Lang, \Validator, \Input, \Redirect, \Auth, \Campaign\Pledge, \Response, \URL;

class PledgesController extends \BaseController {

    public function showList($id) {
        $pledges = Campaign\Pledge::where('campaign_id', $id)->orderBy('price_min', 'asc')->get();

        if( 0 < count( $pledges ) )
            foreach( $pledges as $pledge )
                echo View::make('public.campaigns.pledges.item')->with('pledge', $pledge);
    }

    public function postCreate($id) {

        $data = Input::all();
        $data['campaign_id'] = $id;
        $data['price_min'] = intval($data['price_min']*100);
        $data['price_max'] = intval($data['price_max']*100);

        $validator = Validator::make($data, Campaign\Pledge::$rules );

        if( $validator->passes() ) {

            $pledge = Campaign\Pledge::create($data);

            return Redirect::back()->with('message', Lang::get('admin.pledges.new.message'));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('admin.pledges.new.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function showEdit($id) {
        $pledge = Campaign\Pledge::find($id);

        // If no item in database
        if(empty($pledge) || empty($pledge->id))
            return Redirect::back()->with('message', Lang::get('admin.pledges.edit.inexistant'));

        return View::make('public.campaigns.pledges.edit')->with('pledge', $pledge);
    }

    public function postUpdate($id) {
        $pledge = Campaign\Pledge::find($id);

        // If no item in database
        if(empty($pledge) || empty($pledge->id))
            return Redirect::back()->with('message', Lang::get('admin.pledges.edit.inexistant'));

        $data = Input::all();
        $data['campaign_id'] = $pledge->campaign_id;

        $validator = Validator::make( $data, Campaign\Pledge::$rules );

        if( $validator->passes() ) {
            $pledge->fill( $data )->save();

            return Response::json(array('status' => 'success', 'pledges_url' => URL::route('public.campaigns.pledges', [ 'id' => $pledge->campaign_id ])));
        } else {
            return Response::json(array('status' => 'fail', 'errors' => $validator->errors()));
        }
    }

    public function postDelete($id = 0) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('admin.campaigns')->with('message', Lang::get('admin.pledges.edit.inexistant'));

        try {
            $campaign->delete();
        } catch(Exception $e){
            return Redirect::back()->with('message', Lang::get('admin.pledges.delete.error'))->withInput();
        }

        return Redirect::back()->with('message', Lang::get('admin.pledges.delete.message', array('title' => Input::get('title'))));
    }
}