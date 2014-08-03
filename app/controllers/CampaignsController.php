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
        $data = Input::all();
        $data['item_vendor_id'] = Auth::user()->id;

        $validator = Validator::make($data, Campaign::$rules );

        if( $validator->passes() ) {

            $campaign = Campaign::create( $data );

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
        $categories = Category::all();

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('public.campaigns')
                ->with('message', Lang::get('campaigns.edit.inexistant'));

        if( ! ( $campaign->vendor->id == Auth::user()->id || Auth::user()->role()->first()->name_tag == 'admin' ) )
            return Redirect::back()->with('message', Lang::get('campaigns.edit.unauthorized'));

        $this->layout->content = View::make('public.campaigns.edit');
        $this->layout->content->campaign = $campaign;
        $this->layout->content->categories = $categories;
        $this->layout->sidebar = View::make('public.campaigns.sidebars.edit')->with('campaign', $campaign);
    }

    public function postUpdate($id) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('public.campaigns')
                ->with('message', Lang::get('campaigns.edit.inexistant'));

        if( ! ( $campaign->vendor->id == Auth::user()->id || Auth::user()->role()->first()->name_tag == 'admin' ) )
            return Redirect::back()->with('message', Lang::get('campaigns.edit.unauthorized'));

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
                    'category_id'           => Input::get('category_id'),
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

    public function postDelete($id) {
        $campaign = Campaign::find($id);

        // If no item in database
        if(empty($campaign) || empty($campaign->id))
            return Redirect::route('public.campaigns')
                ->with('message', Lang::get('campaigns.edit.inexistant'));

        if( ! ( $campaign->vendor->id == Auth::user()->id || Auth::user()->role()->first()->name_tag == 'admin' ) )
            return Redirect::back()->with('message', Lang::get('public.campaigns.delete.unauthorized'));

        try {
            $campaign->delete();
        } catch(Exception $e){
            return Redirect::back()->with('message', Lang::get('campaigns.delete.error'))->withInput();
        }

        return Redirect::back()->with('message', Lang::get('campaigns.delete.message', array('title' => Input::get('title'))));
    }

    public function showManage() {
        $campaigns = Campaign::where('item_vendor_id', Auth::user()->id);

        if( Input::get('s', '') != '' ) {
            $campaigns->where('title', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('description', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('item_title', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('item_description', 'LIKE', '%' . Input::get('s') . '%')
                ->orWhere('target_title', 'LIKE', '%' . Input::get('s') . '%');
        }

        $campaigns->orderBy('id', 'desc');

        $this->layout->content = View::make('public.campaigns.manage');
        $this->layout->content->campaigns = $campaigns->get();;
        $this->layout->content_title = Lang::get('campaigns.manage.title');
    }
}