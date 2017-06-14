@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать автомобиль #{{ $car->id }}</div>
                    <div class="panel-body">
                        <admin-car-form
                                action="{{ route('api.cars.update', ['car' => $car]) }}"
                                dataset="{{ json_encode($car) }}"
                                method="PUT"
                        ></admin-car-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection