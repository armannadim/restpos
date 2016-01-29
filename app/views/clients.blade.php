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
            <h3>Clients </h3>
        </div>
        <div class="row-fluid spacing-bottom">
            <div class="span12">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4>Clients<span class="semi-bold"> List</span></h4>
                        <div class="tools"> <a href="javascript:;" class="collapse"></a> <!--<a href="#grid-config" data-toggle="modal" class="config"></a>--> <a href="javascript:;" class="reload"></a> <!--<a href="javascript:;" class="remove"></a>--> </div>
                    </div>
                    <div class="grid-body no-border"> <br />
                        <div class="row-fluid">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-condensed table-bordered" id="clients">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Surname</th>
                                            <th>Identity</th>
                                            <th>Address</th>	
                                            <th>City</th>	
                                            <th>Country</th>
                                            <th>last visited</th>
                                            <th>Added by</th>
                                            <th>Added Date</th>
                                            <th>Action</th>
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
            <div class="row-fluid spacing-bottom">
                <div class="span12">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4><span class="semi-bold"> New clients</span></h4>
                            <div class="tools"> <a href="javascript:;" class="collapse"></a> <!--<a href="#grid-config" data-toggle="modal" class="config"></a>--> <a href="javascript:;" class="reload"></a> <!--<a href="javascript:;" class="remove"></a>--> </div>
                        </div>
                        <div class="grid-body no-border"> <br />
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="grid simple">
                                        <div class="grid-title no-border">
                                            <h4>Food Item <span class="semi-bold">Input Form</span></h4>
                                            <!--<div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>-->
                                        </div>
                                        <div class="grid-body no-border"> <br />
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    {{  Form::open(array('action' => 'ClientsController@store')) }}

                                                    <ul class="errors">
                                                        @foreach($errors->all() as $message)
                                                        <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                    {{-- Username field. ------------------------}}
                                                    <div class="input-group">                                    
                                                        {{ Form::label('firstname', 'First name', array('class'=>'control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('firstname', null, array('class'=>'span12 ')) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('lastname', 'Last name', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('lastname', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('surname', 'Surname', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('surname', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('identity', 'Itentity', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('surname', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('country', 'Country', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('country', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('city', 'City', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('city', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('municipal', 'Municipal', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('municipal', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('postalcode', 'Postal Code', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('postalcode', null, ['class' => 'span12 field row-fluid ']) }}
                                                        </div>
                                                    </div>
                                                    <div class="input-group">  

                                                        {{ Form::label('contact', 'Tel/Mob', array('class'=>'span12 control-label ')) }}
                                                        <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                                        <div class="controls">                                        
                                                            {{ Form::text('contact', null, ['class' => 'span12 field row-fluid ']) }}
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
                </div>
                <div class="span6">
                    <div class="grid simple">
                        <div class="grid-title no-border">
                            <h4><span class="semi-bold"> Edit clients</span></h4>
                            <div class="tools"> <a href="javascript:;" class="collapse"></a> <!--<a href="#grid-config" data-toggle="modal" class="config"></a>--> <a href="javascript:;" class="reload"></a> <!--<a href="javascript:;" class="remove"></a>--> </div>
                        </div>
                        <div class="grid-body no-border"> <br />
                            <div class="row-fluid">
                                <div class="span12">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@stop
