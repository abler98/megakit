<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Список автомобилей
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return view('admin.cars.index');
    }

    /**
     * Новый автомобиль
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Редактировать автомобиль
     *
     * @param Car $car
     * @return \Illuminate\View\View
     */
    public function edit(Car $car)
    {
        $car->load('owner');

        return view('admin.cars.edit', compact('car'));
    }
}