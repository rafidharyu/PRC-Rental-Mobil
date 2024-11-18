<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'car_id'    => 'exists:cars,id',
            'name'      => 'required|min:3|max:255',
            'email'     => 'required|email',
            'phone'     => 'required|numeric',
            'pick_date' => 'required|date',
            'drop_date' => 'required|date',
            'pick_time' => 'required',
            'drop_time' => 'required',
            'pick_option' => 'required|in:garasi,tempat_lain',
            'drop_option' => 'required|in:garasi,tempat_lain',
            'drive_option' => 'required|in:menyetir_sendiri,dikemudikan_oleh_sopir',
            'price_total' => 'nullable|numeric',
            'file'      => 'nullable|image|mimes:jpg,jpeg,png|mimetypes:image/jpeg,image/png|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message'   => 'nullable|min:3'
        ];
    }
}
