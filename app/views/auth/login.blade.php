@section('breadcrumbs')
<li>
    <a href="{{URL::route('users.index')}}">Users</a>
</li>
<li class="active">Login</li>
@stop

@section('content')
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        {{Form::open(['route' => 'auth.login', 'role' => 'form'])}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-log-in"></i> Login
                </div>
                <div class="panel-body">
                   <div class="form-group">
                        {{Form::label('username', 'Username / Email Address', ['class' => 'control-label'])}}
                        {{Form::text('username', null, ['class' => 'form-control input-lg', 'placeholder' => 'Username / Email Address'])}}
                   </div>
                   <div class="form-group">
                       {{Form::label('password', 'Password', ['class' => 'control-label'])}}
                       {{Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password'])}}
                   </div>
                   <div class="form-groups">
                       <div class="checkbox">
                           <label>
                               {{Form::checkbox('remember_me')}} Remember Me?
                           </label>
                       </div>
                   </div>
                </div>
                <div class="panel-footer text-right">
                    {{Form::submit('Login', ['class' => 'btn btn-primary'])}}
                </div>
            </div>
        {{Form::close()}}
    </div>
</div>

@stop