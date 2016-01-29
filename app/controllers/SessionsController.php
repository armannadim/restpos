<?php

/*
 * This project has been created by Arman Nadim.
 * Anyone can use this project and its contents but with permission of the author of this project.
 * Email: armannadim@msn.com
 */

class SessionsController extends BaseController {

    //protected $layout = 'layout.master';

    public function loggingIn() {

        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required', // make sure the email is an actual email
            'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('/')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {                
                return Redirect::to('dashboard');
            } else {
                // validation not successful, send back to form	
                return Redirect::to('login');
            }
        }

        /* $userdata = array(
          'username' => Input::get('username'),
          'password' => Input::get('password')
          );

          $user = User::find(2);

          if (Auth::attempt($userdata, Input::get('rememberme', 0))) {
          return Redirect::to('dashboard');
          }
          return $userdata; */
    }

    public function store() {
        if (Auth::attempt(Input::only('username', 'password'))) {
            return Auth::user();
        }
        return 'Failed';
    }

    public function destroy() {
        Auth::logout();
        Session::flash('success', 'Successfully Logged Out');
        return Redirect::to('/');
    }

}
