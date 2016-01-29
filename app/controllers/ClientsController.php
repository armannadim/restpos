<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientsController
 *
 * @author NAseq
 */
class ClientsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        if (Auth::check()) {
            return View::make('clients');
        }
        return View::make('login');
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

    public function listAllClients() {

        $clients = Clients::select(array(
                    'clients.id',
                    'clients.firstname',
                    'clients.lastname',
                    'clients.surname',
                    'clients.identity',
                    'clients.address',
                    'clients.country',
                    'clients.city',
                    'clients.lastvisit',
                    'clients.created_by',
                    'clients.created_at'
        ));

        return Datatables::of($clients)
                        ->filter_column('id', 'where', 'clients.id', '=', '$1')
                        ->filter_column('name', 'whereIn', 'clients.firstname', function($value) {
                            return explode(',', $value);
                        })
                        ->add_column('edit', '<a href="{{ URL::route(\'clients_edit\', array($id)) }}"><i class="icon-list-alt"></i>Edit</a>')
                        ->add_column('delete', '<a href="{{ URL::route(\'clients_delete\', array($id)) }}"><i class="icon-trash"></i>Delete</a>')
                        ->make();
    }

}
