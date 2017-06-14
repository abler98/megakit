<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarPost;
use App\Models\Car;
use App\Models\CarOwner;

class CarController extends Controller
{
    /**
     * CarController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('index', 'show');
    }

    /**
     * Список автомобилей
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Car::with('owner')->orderBy('id', 'desc')->get();
    }

    /**
     * Добавляет новый автомобиль
     *
     * @param StoreCarPost $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(StoreCarPost $request)
    {
        $owner = CarOwner::find($request->get('owner'));
        $car = $owner->cars()->create($request->get('car'));

        return $car;
    }

    /**
     * Обновляет существующий автомобиль
     *
     * @param StoreCarPost $request
     * @param Car $car
     * @return Car
     */
    public function update(StoreCarPost $request, Car $car)
    {
        $owner = CarOwner::find($request->get('owner'));

        $car->owner()->associate($owner);
        $car->update($request->get('car'));

        return $car;
    }

    /**
     * Удаляет существующий автомобиль
     *
     * @param Car $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Car $car)
    {
        return response()->json($car->delete());
    }
}