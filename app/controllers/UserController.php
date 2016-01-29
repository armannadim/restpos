<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author NAseq
 */
class UserController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            return View::make('user_management');
        }
        $this->layout->content = View::make('login');
        return $this->layout;
    }

    public function new_user() {
        if (Auth::check()) {
            return View::make('user_new');
        }
        $this->layout->content = View::make('login');
        return $this->layout;
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
        return $id;
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

    public function listAll() {
        $users = User::select(array(
                    'Users.id',
                    DB::raw('CONCAT(Users.firstname," ",Users.lastname) as UserName'),
                    'Users.username',
                    'Users.email',
                    'Users.updated_at',
                    'Roles.role as RoleName',
                ))
                ->leftJoin('Roles', 'Users.role', '=', 'Roles.id')
                ->whereNotNull('deleted_at');

        return Datatables::of($users)
                        ->filter_column('id', 'where', 'Users.id', '=', '$1')
                        ->filter_column('RoleName', 'whereIn', 'Roles.name', function($value) {
                            return explode(',', $value);
                        })
                        ->filter_column('updated_at', 'whereBetween', 'Users.updated_at', function($value) {
                            return explode(',', $value);
                        }, 'and')
                        ->add_column('edit', '<a href="{{ URL::route(\'user_edit\', array($id)) }}"><i class="icon-list-alt"></i>Edit</a>')
                        ->add_column('delete', '<a href="{{ URL::route(\'user_delete\', array($id)) }}"><i class="icon-trash"></i>Delete</a>')
                        ->make();
    }

}
