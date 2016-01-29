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
            <h3>Food Item Input Form </h3>
        </div>
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
                                {{  Form::open(array('action' => 'ItemController@store', 'files' => true)) }}

                                <ul class="errors">
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                                {{-- Username field. ------------------------}}
                                <div class="input-group">                                    
                                    {{ Form::label('name', 'Food Name', array('class'=>'control-label ')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('name', null, array('class'=>'span12 ')) }}
                                    </div>
                                </div>
                                <div class="input-group">  

                                    {{ Form::label('details', 'Details', array('class'=>'control-label ')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::textarea('details', null, ['class' => 'span12 field textarea row-fluid ']) }}
                                    </div>
                                </div>
                                <div class="input-group">  

                                    {{ Form::label('regular_price', 'Regular Price', array('class'=>'control-label ')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('regular_price',null, array('class'=>'span3 ')) }}
                                    </div>
                                </div>

                                {{-- Email address field. -------------------}}
                                <div class="input-group">                                    
                                    {{ Form::label('discount_percentage', 'Discount (%)', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('discount_percentage', null, array('class'=>'span3 ')) }}
                                    </div>
                                </div>

                                <div class="input-group">                                    
                                    {{ Form::label('discounted_price', 'Discounted Price', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('discounted_price', null, array('class'=>'span3 ')) }}
                                    </div>
                                </div>

                                <div class="input-group">                                    
                                    {{ Form::label('food_category_id', 'Food category', array('class'=>'control-label')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::select('food_category_id', $food_cat, null ); }}
                                    </div>
                                </div>  
                                <div class="input-group">                                    
                                    {{ Form::label('image', 'Upload Image', array('class'=>'control-label')) }}                                    
                                    <div class="controls">                                        
                                        {{ Form::file('image') }}
                                        {{ Form::select('food_category_id', $food_cat, null ); }}
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