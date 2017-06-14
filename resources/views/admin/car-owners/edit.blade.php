@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать владельца #{{ $owner->id }}</div>
                    <div class="panel-body">
                        <admin-car-owner-form
                                action="{{ route('api.owners.update', ['owner' => $owner]) }}"
                                dataset="{{ json_encode($owner) }}"
                                method="PUT"
                        ></admin-car-owner-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection