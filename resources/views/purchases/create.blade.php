@extends('layouts.app')
@section('page_title', 'Purchases')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"><h3>Register the Purchase</h3></div>
    <div class="panel-body">
        <form method="post" action="{{ route('purchases.store')}}">
            <input type="hidden" name="product_id" value="{{$product->id}}">
            {{ csrf_field() }}
            <div class="form-group">
                <h4>Product: {{$product->Name}}</h4>
            </div>
            <hr>
            <div class="form-group">
                <label for="buyer">Buyer</label>
                <select id="user_id" name="user_id" class="form-control" required>
                    <option value="">--- Select buyer ---</option>
                    @foreach($users as $user)
                    <option  value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Purchase Date</label>
                <div class="input-group">
                    <input type="text" data-date class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <div class="form-group">
                    {{ Form::select('supplier_id[]', $suppliers, null, ['class' => 'form-control', 'placeholder' => 'Select...']) }}
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
