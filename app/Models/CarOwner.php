<?php

namespace App\Models;

/**
 * App\Models\CarOwner
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CarOwner whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CarOwner whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CarOwner whereLastName($value)
 * @mixin \Eloquent
 */
class CarOwner extends \Eloquent
{
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name'];

    protected $appends = ['full_name'];

    /**
     * Список автомобилей
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars()
    {
        return $this->hasMany(Car::class, 'owner_id');
    }

    /**
     * Полное имя
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
