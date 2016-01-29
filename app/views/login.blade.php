<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="generator" content="Bootply" />
        @include('static.meta')
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                        <h1 class="text-center">Login</h1>
                    </div>
                    <div class="modal-body">

                        <p>Login Form.</p>
                        {{ Form::open(array('url' => '/login', 'method'=>'get', 'class' =>'form col-md-12 center-block')) }}
                        <!-- if there are login errors, show them here -->
                        <div>
                            {{ $errors->first('username') }}
                            {{ $errors->first('password') }}
                        </div>

                        <!--<div>
                            {{ Form::label('username', 'Username') }}-->
                        <div class="form-group">
                            {{ Form::text('username','', ['class'=>'form-control input-lg', 'placeholder'=>'Username']) }}
                        </div>
                        <!--<div>

                            {{ Form::label('password', 'Password') }}-->
                        <div class="form-group">
                            {{ Form::password('password','', ['class'=>'form-control input-lg', 'placeholder'=>'Password']) }}
                        </div>
                        <!--<div>
                            {{ Form::label('lblRememberme', 'Recordar contraseña') }}-->
                        <div class="form-group">
                            {{ Form::checkbox('rememberme', true) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block']) }}
                        </div>
                        {{ Form::close() }}
                        
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                           <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>-->
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        <!-- script references -->
        
    </body>
</html>