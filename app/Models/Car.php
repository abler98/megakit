<?php

namespace App\Models;

/**
 * App\Models\Car
 *
 * @property int $id
 * @property int $owner_id
 * @property string $brand
 * @property string $model
 * @property-read \App\Models\CarOwner $owner
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Car whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Car whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Car whereModel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Car whereOwnerId($value)
 * @mixin \Eloquent
 */
class Car extends \Eloquent
{
    public $timestamps = false;

    protected $fillable = ['brand', 'model', 'price'];

    protected $casts = ['price' => 'float'];

    /**
     * Владелец автомобиля
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(CarOwner::class, 'owner_id');
    }
}
