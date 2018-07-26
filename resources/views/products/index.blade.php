@extends('layouts.app')
@section('page_title', 'Products')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Product List</div>
    <form method="GET" action="{{route('products.index', 'search' )}}">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter the product" name="search">
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
                        <th>ID</th>
                        <th>Description</th>
                        <th>Measurement Unit</th>
                        <th>Qty. Min. In Stock</th>
                        <th>Qty. In Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->Name}}</td>
                        <td>{{$product->UnitMeasure}}</td>
                        <td>{{$product->AmountMinimumStock}}</td>
                        <td>{{$product->AmountStock}}</td>
                        <td>
                            <a href="{{route('products.purchases.create', $product->id)}}"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                            <!--<a href="{{route('purchases.create', $product->id)}}"><i class="glyphicon glyphicon-shopping-cart"></i></a>-->
                            <a href="{{route('products.show', $product->id)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div align="center" class="row">
        {{ $products->links() }}
    </div>
</div>
<a href="{{route('products.create')}}"><button class="btn btn-primary">Register New</button></a>
<a href="{{route('requisitions.create')}}"><button class="btn btn-primary">Requisition New</button></a>
@endsection
