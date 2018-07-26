@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h3>Requisition Register</h3></div>
    <div class="panel-body">
        <form method="post">
            {{ csrf_field() }}
            <h4>Requisition Information</h4>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <label>Requisition Date</label>
                    <div class="input-group">
                        <input type="text" data-date class="form-control">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero">Client</label>
                    <select class="form-control" Name="user_id" required>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label>Product</label>
                <div class="form-group">
                    <select class="form-control" Name="product_id" required>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->Name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numero">Quantity</label>
                        <input type="number" class="form-control" placeholder="Number" required name="Quantity">
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Return</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection
