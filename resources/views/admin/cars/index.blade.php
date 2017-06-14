@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Список автомобилей<br>
                    </div>
                    <div class="panel-body">
                        <admin-car-list></admin-car-list>
                    </div>
                </div>
                <a class="btn btn-default" href="{{ route('admin.cars.create') }}">Добавить автомобиль</a>
            </div>
        </div>
    </div>
@endsection