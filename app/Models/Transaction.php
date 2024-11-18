<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'email',
        'phone',
        'car_id',
        'pick_date',
        'pick_time',
        'drop_date',
        'drop_time',
        'pick_option',
        'drop_option',
        'drive_option',
        'price_total',
        'file',
        'message',
        'status'
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->code = Str::random(6);
        });
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
