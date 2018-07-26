@extends('layouts.app')
@section('page_title', 'Suppliers')
@section('content')
@if($errors->any())
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif
<div class="panel panel-default">
    <div class="panel-heading"><h3>Supplier Register</h3></div>
    <div class="panel-body">
        <form method="post" action="{{route ('suppliers.store')}}">
            {{ csrf_field() }}
            <h4>About Supplier</h4>
            <hr>
            <div class="form-group">
                <label for="descricao">Description</label>
                <input type="text" class="form-control" placeholder="Description" name="Name" required>
            </div>
            <h4>Address</h4>
            <hr>
            <div class="form-group">
                <label for="logradouroEndereco">Public Place</label>
                <input type="text" class="form-control" placeholder="Public Place" required name="Address">
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="bairroEndereco">District</label>
                        <input type="text" class="form-control" placeholder="District" required name="Region">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numero">Number</label>
                        <input type="number" class="form-control" placeholder="Number" required name="Number">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cidadeEndereco">Town</label>
                        <input type="text" class="form-control" placeholder="Town" required name="Town">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cepEndereco">CEP</label>
                        <input type="text" class="form-control" placeholder="CEP" required name="CEP">
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Return</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
