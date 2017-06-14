<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarOwner;

class CarOwnerController extends Controller
{
    /**
     * Список владельцев
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.car-owners.index');
    }

    /**
     * Новый владелец
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.car-owners.create');
    }

    /**
     * Редактировать владельца
     *
     * @param CarOwner $owner
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CarOwner $owner)
    {
        return view('admin.car-owners.edit', compact('owner'));
    }
}