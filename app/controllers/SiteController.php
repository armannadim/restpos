<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteController
 *
 * @author NAseq
 */
class SiteController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            return View::make('user_management');
        }
        return View::make('login');
    }

    public function user_list() {
        if (Auth::check()) {
            $this->layout->content = View::make('user_list');
            return $this->layout;
        }
        $this->layout->content = View::make('login');
        return $this->layout;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (Auth::check()) {
            $this->layout->content = View::make('user_management');
            return $this->layout;
        }
        return View::make('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Input::all();

        // validate the info, create rules for the inputs
        $rules = array(
            'name' => 'required', // make sure the email is an actual email
            'value' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($data, $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form            
        } else {
            $config = new Configuration();
            $config->name = $data['name'];
            $config->value = $data['value'];

            $config->save();  
            return Redirect::back()->with('message','New configuration parameter added succesfully !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update() {
        $data = Input::all();
        $config = Configuration::find($data['id']);
        if (isset($data['name']))
            $config->name = $data['name'];
        if (isset($data['value']))
            $config->value = $data['value'];

        $config->save();
        return "Table updated.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

    public function listAllConfig() {
        $config = Configuration::select(array(
                    'config.id',
                    'config.name',
                    'config.value',
        ));

        return Datatables::of($config)
                        ->filter_column('id', 'where', 'config.id', '=', '$1')
                        ->filter_column('name', 'whereIn', 'config.name', function($value) {
                            return explode(',', $value);
                        })
                        ->add_column('edit', '<a href="{{ URL::route(\'user_edit\', array($id)) }}"><i class="icon-edit"></i></a>&nbsp;&nbsp;<a href="{{ URL::route(\'config_delete\', array($id)) }}"><i class="icon-trash"></i></a>')
                        ->make();
    }

    function delete($id) {
        $config = Configuration::find($id);
        $config->delete();     
        return Redirect::back()->with('message_delete','Configuration parameter has been deleted successfully !');
    }

}
