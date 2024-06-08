<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => ['required', 'string', 'max:255', 'unique:categories,name,' . $this->category],
            'slug'              => ['required', 'string', 'max:255', 'unique:categories,slug,' . $this->category],
            'show_at_home'      => ['required', 'boolean'],
            'status'            => ['required', 'boolean'],
            'image_icon'        => ['nullable', 'image', 'max:3000', 'mimes:jpg,jpeg,png'],
            'background_image'  => ['nullable', 'image', 'max:3000', 'mimes:jpg,jpeg,png'],
        ];
    }
}
