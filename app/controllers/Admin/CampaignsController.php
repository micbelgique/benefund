<?php

namespace Admin;

use \View, \Campaign, \Category, \Lang, \Validator, \Input, \Redirect, \Auth;

class CampaignsController extends BaseController {

    protected $layout = 'admin.templates.main';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showIndex() {

        if( Input::get('s', '') != '' ) {
            $campaigns = Campaign::where('title', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('description', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('item_title', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('item_description', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('target_title', 'LIKE', '%' . Input::get('s') . '%')
                ->get();
        } else {
            $campaigns = Campaign::all();
        }

        $this->layout->content = View::make('admin.campaigns.index')->with('campaigns', $campaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showNew() {
        $categories = Category::all();
        $this->layout->content = View::make('admin.campaigns.create');
        $this->layout->content->categories = $categories;
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
                    'item_price'            => Input::get('item_price', 0),
                    'category_id'           => Input::get('category_id', 0),
                )
            );

            return Redirect::back()->with('message', Lang::get('admin.campaigns.new.message', array('title' => Input::get('title'))));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('admin.campaigns.new.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function showEdit($id) {
        $campaign = Campaign::find($id);

        $categories = Category::all();
        
        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('admin.campaigns')
                ->with('message', Lang::get('admin.campaigns.edit.inexistant'));

        if( ! ( $campaign->vendor()->first()->id == Auth::user()->id || Auth::user()->role()->first()->name_tag == 'admin' ) )
            return Redirect::back()->with('message', Lang::get('admin.campaigns.edit.unauthorized'));

        $this->layout->content = View::make('admin.campaigns.edit');
        $this->layout->content->campaign = $campaign;
        $this->layout->content->categories = $categories;
    }

    public function postUpdate($id) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('admin.campaigns')
                ->with('message', Lang::get('admin.campaigns.edit.inexistant'));

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
                    'item_price'            => intval(Input::get('item_price', 0) * 100 ),
                    'category_id'           => Input::get('category_id', 0),
                )
            )->save();

            return Redirect::back()->with('message', Lang::get('admin.campaigns.edit.message', array('title' => Input::get('title'))));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('admin.campaigns.edit.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function postDelete($id = 0) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('admin.campaigns')
                ->with('message', Lang::get('admin.campaigns.edit.inexistant'));

        try {
            $campaign->delete();
        } catch(Exception $e){
            return Redirect::back()->with('message', Lang::get('admin.campaigns.delete.error'))->withInput();
        }

        return Redirect::route('admin.campaigns')->with('message', Lang::get('admin.campaigns.delete.message', array('title' => Input::get('title'))));
    }
}