<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AmenityUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon'              => ['nullable', 'string', 'max:255'],
            'name'              => ['required', 'string', 'max:255', 'unique:amenities,name,' . $this->amenity],
            'slug'              => ['required', 'string', 'max:255', 'unique:amenities,slug,' . $this->amenity],
            'status'            => ['required', 'boolean'],
        ];
    }
}
