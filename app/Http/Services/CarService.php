<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Car;

class CarService
{
    public function select($paginate = null)
    {
        if ($paginate) {
            return Car::latest()->select('id', 'uuid', 'name', 'price_day', 'seat', 'fuel', 'transmisi', 'year_of_car', 'status', 'image')->paginate($paginate);
        }

        return Car::latest()->get();
    }

    public function selectFirstBy($column, $value)
    {
        return Car::where($column, $value)->firstOrFail();
    }

    public function create($data)
    {
        $data['slug'] = Str::slug($data['name']);

        return Car::create($data);
    }

    public function update($data, $uuid)
    {
        $data['slug'] = Str::slug($data['name']);

        return Car::where('uuid', $uuid)->update($data);
    }
}
