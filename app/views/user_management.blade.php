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
            <h3>Registration Form </h3>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>User <span class="semi-bold">Registration Form</span></h4>
                        <!--<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>-->
                    </div>
                    <div class="grid-body no-border"> <br />
                        <div class="row-fluid">
                            <div class="span8">
                                {{  Form::open(array('action' => 'UserController@create')) }}

                                <ul class="errors">
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                {{-- Username field. ------------------------}}
                                <div class="input-group">                                    
                                    {{ Form::label('username', 'Username', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('username', null, array('class'=>'span12 ')) }}
                                    </div>
                                </div>
                                <div class="input-group">  

                                    {{ Form::label('password', 'Password', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::password('password',  array('class'=>'span12 ','style'=>'width: 100%')) }}
                                    </div>
                                </div>
                                <div class="input-group">  

                                    {{ Form::label('password_confirmation', 'Re-type Password', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::password('password_confirmation', array('class'=>'span12 ')) }}
                                    </div>
                                </div>

                                {{-- Email address field. -------------------}}
                                <div class="input-group">                                    
                                    {{ Form::label('firstname', 'First name', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('firstname', null, array('class'=>'span12 ')) }}
                                    </div>
                                </div>

                                <div class="input-group">                                    
                                    {{ Form::label('lastname', 'Last name', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('lastname', null, array('class'=>'span12 ')) }}
                                    </div>
                                </div>

                                <div class="input-group">                                    
                                    {{ Form::label('email', 'Email', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::email('email', null, array('class'=>'span12 ')) }}
                                    </div>
                                </div>

                                <div class="input-group">                                    
                                    {{ Form::label('contact', 'Contact number', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('firstname', null, array('class'=>'span12 ')) }}
                                    </div>
                                </div>

                                <div class="input-group">                                    
                                    {{ Form::label('role', 'Privilegio', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::select('role', array('1' => 'Admin', '2' => 'Manager', '3'=>'Others')); }}
                                    </div>
                                </div>                                

                                {{-- Form submit button. --------------------}}
                                {{ Form::submit('Register',  array('class'=>'btn btn-success btn-cons')) }}

                                {{ Form::close() }}



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid spacing-bottom">
    <div class="span8">
        <div id="ricksaw"></div>
        <div id="legend"></div>
        <div id="chart"></div>
    </div>
</div>
@stop