@extends('layouts.admin')

@section('admin.content')
    <div class="panel panel-default">
        <div class="panel-heading">Новый владелец</div>
        <div class="panel-body">
            <admin-car-owner-form
                    action="{{ route('api.owners.store') }}"
                    method="POST"
            ></admin-car-owner-form>
        </div>
    </div>
@endsection