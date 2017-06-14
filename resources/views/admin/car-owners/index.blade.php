@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Список владельцев<br>
                    </div>
                    <div class="panel-body">
                        <admin-car-owner-list></admin-car-owner-list>
                    </div>
                </div>
                <a class="btn btn-default" href="{{ route('admin.owners.create') }}">Добавить владельца</a>
            </div>
        </div>
    </div>
@endsection