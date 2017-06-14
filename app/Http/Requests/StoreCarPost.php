<?php

namespace App\Http\Requests;

class StoreCarPost extends BaseRequest
{
    public function rules()
    {
        return [
            'car.brand' => 'required|string|max:255',
            'car.model' => 'required|string|max:255',
            'owner' => 'required|exists:car_owners,id',
        ];
    }
}
