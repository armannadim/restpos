<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function index() {
        if (Auth::check()) {
            return Redirect::to('dashboard')
                            ->with('flash_notice', 'You are already logged in!');
        }
        /*        $this->layout->content = View::make('login');
          return $this->layout; */
        return View::make('login');
    }

    public function dashboard() {
        if (Auth::check()) {
            return View::make('dashboard');
        }
        return View::make('login');
    }

    public function site_settings() {
        if (Auth::check()) {
            return View::make('configuration');
        }
        return View::make('login');
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
