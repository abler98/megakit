@extends('layouts.app')

@section('navbar')
    <ul class="nav navbar-nav navbar-left">
        <li class="{{ Route::is('admin.cars.*') ? 'active' : '' }}">
            <a href="{{ route('admin.cars.index') }}">Автомобили</a>
        </li>
        <li class="{{ Route::is('admin.owners.*') ? 'active' : '' }}">
            <a href="{{ route('admin.owners.index') }}">Владельцы</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @yield('admin.content')
            </div>
        </div>
    </div>
@endsection