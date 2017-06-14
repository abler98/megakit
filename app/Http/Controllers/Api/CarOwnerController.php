<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOwnerPost;
use App\Models\CarOwner;

class CarOwnerController extends Controller
{
    /**
     * Список всех владельцев
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return CarOwner::orderBy('first_name', 'asc')->get();
    }

    /**
     * Создаёт нового владельца
     *
     * @param StoreOwnerPost $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(StoreOwnerPost $request)
    {
        return CarOwner::create($request->all());
    }

    /**
     * Обновляет существующего владельца
     *
     * @param StoreOwnerPost $request
     * @param CarOwner $owner
     * @return CarOwner
     */
    public function update(StoreOwnerPost $request, CarOwner $owner)
    {
        $owner->update($request->all());

        return $owner;
    }

    /**
     * Удаляет владельца
     *
     * @param CarOwner $owner
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(CarOwner $owner)
    {
        return response()->json($owner->delete());
    }
}