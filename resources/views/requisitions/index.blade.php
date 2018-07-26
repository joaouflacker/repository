@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Requisitions List</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requisitions as $requisition)
                    <tr>
                        <td>{{$requisition->id}}</td>
                        <td>{{$requisition->Description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
