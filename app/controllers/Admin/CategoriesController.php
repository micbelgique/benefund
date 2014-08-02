<?php

namespace Admin;

use \View, \Category, \Lang, \Validator, \Input, \Redirect, \Auth;

class CategoriesController extends BaseController {

    protected $layout = 'admin.templates.main';

    public function __construct() {
        //$this->scripts[] = '/assets/js/admin/categories.js';
    }

    public function showIndex() {

    	$categories = Category::all();

        $this->layout->content = View::make('admin.categories.index');
        $this->layout->content->categories = $categories;

        $this->layout->title = Lang::get('admin.categories.index.title');
    }

    public function showNew() {

    	$this->layout->content = View::make('admin.categories.new');
    }

    public function postCreate() {
        $rules = array(
            'title' => 'required',
        );
        
        $validator = Validator::make( Input::all(), $rules );
        
        if( $validator->passes() ) {

        	$category = Category::create(
        		array(
					'title'        => Input::get('title'),
					'description'      => $input_content,
        		)
        	);

            return Redirect::route('admin.categories')->with('message', Lang::get('admin/categories.new.message', array('title' => Input::get('title'))));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('admin/categories.new.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function showEdit($id) {
    	$category = Category::find($id);
        
    	// If no item in database
        if(empty($category) || empty($category->id))
            return Redirect::route('admin.categories')
                ->with('message', Lang::get('admin/categories.edit.inexistant'));

        $this->layout->content = View::make('admin.categories.edit');
        $this->layout->content->category = $category;
        
        $this->layout->breadcrumbs = array(
            'categories' => Lang::get('admin/menu.categories.title'),
            '' => Lang::get('admin/menu.categories.edit')
        );
        $this->layout->title = Lang::get('admin/menu.categories.edit');
    }

    public function postUpdate($id) {
        $category = Category::find($id);
        
    	// If no item in database
        if(empty($category) || empty($category->id))
            return Redirect::route('admin.categories')
                ->with('message', Lang::get('admin/categories.edit.inexistant'));

		$rules = array(
            'title' => 'required',
        );
        
        $validator = Validator::make( Input::all(), $rules );
        
        if( $validator->passes() ) {

        	$category->fill(
        		array(
					'title'        => Input::get('title'),
					'description'  => Input::get('description'),
        		)
        	)->save();

            return Redirect::route('admin.categories')->with('message', Lang::get('admin/categories.update.message', array('title' => Input::get('title'))));
        } else {
            return Redirect::back()
                ->with('message', Lang::get('admin/categories.new.error'))
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Remove a log
     * @return Response request response
     */
    public function postDelete($id) {
  		$category = Category::find($id);
        
    	// If no item in database
        if(empty($category) || empty($category->id))
            return Redirect::route('admin.categories')
                ->with('message', Lang::get('admin/categories.edit.inexistant'));

        try {
			$category->delete();
		} catch(Exception $e){
			return Redirect::back()->with('message', Lang::get('admin/categories.new.error_delete'))->withInput();
		}

		return Redirect::route('admin.categories')->with('message', Lang::get('admin/categories.delete.message', array('title' => Input::get('title'))));
    }



}