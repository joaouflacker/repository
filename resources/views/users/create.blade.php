@extends('layouts.app')
@section('page_title', 'Users')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h3>Register User</h3></div>
    <div class="panel-body">
        <form method="post" action="{{route ('users.store')}}">
            {{ csrf_field() }}
            <h4>About User</h4>
            <hr>
            <div class="form-group">
                <label for="descricao">Name</label>
                <input type="text" class="form-control" placeholder="write the user description" name="name" required>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address</label>
                <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <div>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Return</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection
