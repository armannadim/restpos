<?php

class DashboardController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            //return Auth::user()->username;
            //return Redirect::to('dashboard')
              //              ->with('flash_notice', 'You are already logged in!');
        }
        $this->layout->content = View::make('login');
        return $this->layout;
    }

    public function dashboard() {
        return View::make('dashboard');
    }

    public function site_settings() {
        return View::make('configuration');
    }

    public function item_settings() {
        return View::make('rest_management');
    }

    public function statistics() {
        return View::make('statistics');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
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

}
