@extends('layouts.app')
@section('page_title', 'Purchases')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Purchases List</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)
                    <tr>
                        <td>{{$purchase->id}}</td>
                        <td>{{$purchase->Name}}</td>
                        <td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
