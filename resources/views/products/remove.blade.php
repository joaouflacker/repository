@extends('layouts.app')
@section('page_title', 'Products')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Remove the Product</div>
    <div class="panel-body">
        <form method="post" action="{{route ('products.destroy', $product->id)}}">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <h4>Are you sure you want to remove the product?</h4>
                    <hr>
                    <h4>About the Product</h4>
                    <p>Description: {{$product->Name}}</p>
                    <hr>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Remove</button>
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
</div>
@endsection
