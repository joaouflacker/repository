@extends('layouts.app')
@section('page_title', 'Products')
@section('content')
@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading"><h3>Edit Product</h3></div>
    <div class="panel-body">
        <form method="post" action="{{route ('products.update', $product->id)}}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <h4>About Product</h4>
            <hr>
            <div class="form-group">
                <label for="descricao">Description</label>
                <input type="text" class="form-control" placeholder="write the product description" name="Name" required value="{{$product->Name}}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo">Measurement Unit</label>
                        <select class="form-control" name="tipo" required>
                            <option>Unit(s)</option>
                            <option>Kilogram(s)</option>
                            <option>Liter(s)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numero">Qty. Min. In Stock</label>
                        <input type="number" class="form-control" placeholder="Number">
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Return</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
@endsection
