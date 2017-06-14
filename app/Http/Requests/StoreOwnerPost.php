<?php

namespace App\Http\Requests;

class StoreOwnerPost extends BaseRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ];
    }
}