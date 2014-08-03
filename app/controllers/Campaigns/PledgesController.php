<?php

namespace Campaigns;

use \View, \Campaign, \Category, \Lang, \Validator, \Input, \Redirect, \Auth, \Campaign\Pledge;

class PledgesController extends \BaseController {

    public function postCreate($id) {

        $data = Input::all();
        $data['campaign_id'] = $id;

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

    public function postUpdate($id) {
        $pledge = Campaign\Pledge::find($id);

        // If no item in database
        if(empty($pledge) || empty($pledge->id))
            return Redirect::back()->with('message', Lang::get('admin.pledges.edit.inexistant'));

        $data = Input::all();

        $validator = Validator::make( $data, Campaign\Pledge::$rules );

        if( $validator->passes() ) {
            $campaign->fill( $data )->save();

            return Redirect::back()->with('message', Lang::get('admin.pledges.edit.message'));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('admin.pledges.edit.error'))
                ->withErrors($validator)
                ->withInput();
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