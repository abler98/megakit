@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Новый автомобиль</div>
                    <div class="panel-body">
                        <admin-car-form
                                action="{{ route('api.cars.store') }}"
                                method="POST"
                        ></admin-car-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection