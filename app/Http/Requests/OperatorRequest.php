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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|confirmed|min:6',
            'role' => 'required|string|in:operator',
            'is_active' => 'required|boolean', // Ensures is_active is a boolean value
        ];
    }
}
