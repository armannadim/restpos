@extends('layout.master')


@section('content')

@include('static.sidebar')


<div class="page-content">

    <div class="clearfix"></div>
    <div class="content">
        <ul class="breadcrumb"></ul>
        <div class="page-title">
            <h3>Site Configuration </h3>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4><span class="semi-bold"> Configuration</span></h4>
                        <div class="tools"> <a href="javascript:;" class="collapse"></a> <!--<a href="#grid-config" data-toggle="modal" class="config"></a>--> <a href="javascript:;" class="reload"></a> <!--<a href="javascript:;" class="remove"></a>--> </div>
                    </div>
                    <div class="grid-body no-border"> <br />
                        <div class="row-fluid">
                            <div class="span12">
                                @if(Session::has('message_delete'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    <strong>Success!</strong> {{ Session::get('message_delete', '') }}
                                </div>
                                @endif
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed table-bordered" id="config">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>value</th>                                            	
                                            <th class=" icon ">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>			
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
            <div class="span6">
                <div class="grid simple">
                    <div class="grid-title no-border">
                        <h4><span class="semi-bold"> New config parameters</span></h4>
                        <div class="tools"> <a href="javascript:;" class="collapse"></a> <!--<a href="#grid-config" data-toggle="modal" class="config"></a>--> <a href="javascript:;" class="reload"></a> <!--<a href="javascript:;" class="remove"></a>--> </div>
                    </div>
                    <div class="grid-body no-border"> <br />
                        <div class="row-fluid">
                            <div class="span12">    
                                {{  Form::open(array('action' => 'SiteController@store')) }}

                                
                                    @foreach($errors->all() as $message)
                                    <div class="alert alert-error">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        <strong>Error!</strong> {{ $message }}
                                    </div>
                                    @endforeach
                                    @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        <strong>Success!</strong> {{ Session::get('message', '') }}
                                    </div>
                                    @endif

                                
                                {{-- Username field. ------------------------}}
                                <div class="input-group">                                    
                                    {{ Form::label('name', 'Name', array('class'=>'control-label ')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('name', null, array('class'=>'span6 ')) }}
                                    </div>
                                </div>                               
                                <div class="input-group">  

                                    {{ Form::label('value', 'Value', array('class'=>'control-label ')) }}
                                    <!--<span class="help">e.g. "Mona Lisa Portrait"</span>-->
                                    <div class="controls">                                        
                                        {{ Form::text('value', null, array('class'=>'span6 ')) }}
                                    </div>
                                </div>

                                {{-- Form submit button. --------------------}}
                                {{ Form::submit('Submit',  array('class'=>'btn btn-success btn-cons')) }}

                                {{ Form::close() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

@stop