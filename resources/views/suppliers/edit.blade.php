@extends('layouts.app')
@section('page_title', 'Suppliers')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h3>Register the Supplier</h3></div>
    <div class="panel-body">
        <form method="post" action="{{route ('suppliers.update', $supplier->id)}}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <h4>About Supplier</h4>
            <hr>
            <div class="form-group">
                <label for="descricao">Description</label>
                <input type="text" class="form-control" placeholder="write the supplier description" name="Name" required value="{{$supplier->Name}}">
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Return</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection
