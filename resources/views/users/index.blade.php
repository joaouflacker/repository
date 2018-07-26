@extends('layouts.app')
@section('page_title', 'Users')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Users List</div>
    <form method="GET" action="{{route('users.index', 'search' )}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter the user" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Search</button>
                    </span>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="#"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="#"><i class="glyphicon glyphicon-trash"></i></a>
                            <a href="#"><i class="glyphicon glyphicon-zoom-in"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div align="center" class="row">
        {{ $users->links() }}
    </div>
</div>
<a href="{{route('users.create')}}"><button class="btn btn-primary">Register New</button></a>
@endsection
