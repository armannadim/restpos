<!DOCTYPE html>
<!--
This project has been created by Aseq A Arman Nadim.
Anyone can use this project and its contents but with permission of the author of this project.
Email: armannadim@msn.com
-->


@extends('layout.master')
@section('content')

@include('static.sidebar')
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">

    <div class="clearfix"></div>
    <div class="content">
        <ul class="breadcrumb"></ul>
        <div class="page-title">
            <h3>User List </h3>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <!--<h4>User <span class="semi-bold">Registration Form</span></h4>-->
                        <!--<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>-->
                    </div>
                    <div class="grid-body no-border"> <br />
                        <div class="row-fluid">
                            <div class="span12">

                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-condensed table-bordered" id="users">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Updated At</th>
                                            <th>Role</th>	
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>			
                                            <td></td>
                                            <td></td>
                                            <td></td>			
                                            <td></td>
                                            <td></td>
                                            <td></td>            
                                            <td></td>        
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
