<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'slug',
        'price_day',
        'seat',
        'fuel',
        'transmisi',
        'year_of_car',
        'image',
        'status'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->user_id = auth()->user()->id;
        });
    }
}
