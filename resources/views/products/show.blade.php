@extends('layouts.app')
@section('page_title', 'Products')
@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Product Details</div>
    <div class="panel-body">
        <form method="post" action="{{route ('purchases.destroy', $product->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <h4>About the Product</h4>
                    <p>Description: {{$product->Name}}</p>
                </div>
            </div>
            <a href="/products" class="btn btn-default">Return</a>
            <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
            <button type="submit" class="btn btn-danger">Remove</button>
        </form>
    </div>
</div>
@endsection
