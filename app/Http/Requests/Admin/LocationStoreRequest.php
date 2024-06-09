<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => ['required', 'string', 'max:255', 'unique:locations,name'],
            'slug'              => ['required', 'string', 'max:255', 'unique:locations,slug'],
            'show_at_home'      => ['required', 'boolean'],
            'status'            => ['required', 'boolean'],
        ];
    }
}
