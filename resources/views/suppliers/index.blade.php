@extends('layouts.app')
@section('page_title', 'Suppliers')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Supplier List</div>
    <form method="GET" action="{{route('suppliers.index', 'search' )}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter the supplier" name="search">
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
                        <th>Description</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{$supplier->Name}}</td>
                        <td>{{$supplier->Address}}</td>
                        <td>{{$supplier->Region}}</td>
                        <td>{{$supplier->Number}}</td>
                        <td>
                            <a href="{{route('suppliers.edit', $supplier->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
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
        {{ $suppliers->links() }}
    </div>
</div>
<a href="{{route('suppliers.create')}}"><button class="btn btn-primary">Register New</button></a>
@endsection
