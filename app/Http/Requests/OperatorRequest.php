<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
{
    public function authorize()
    {
        // Pastikan hanya owner yang dapat melakukan perubahan
        return $this->user()->role === 'owner';
    }

    public function rules()
    {
        return [
            'is_active' => 'required|boolean', // Ensures is_active is a boolean value
        ];
    }
}
