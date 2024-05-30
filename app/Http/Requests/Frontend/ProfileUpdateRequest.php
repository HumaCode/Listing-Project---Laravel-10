<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar'        => ['nullable', 'image', 'max:2000', 'mimes:jpg,jpeg,png'],
            'banner'        => ['nullable', 'image', 'max:2000', 'mimes:jpg,jpeg,png'],
            'name'          => ['required', 'max:100'],
            'email'         => ['required', 'email', 'max:100'],
            'phone'         => ['required', 'max:20'],
            'about'         => ['required', 'max:300'],
            'website'       => ['nullable', 'url'],
            'fb_link'       => ['nullable', 'url'],
            'x_link'        => ['nullable', 'url'],
            'in_link'       => ['nullable', 'url'],
            'wa_link'       => ['nullable', 'url'],
            'instra_link'   => ['nullable', 'url'],
        ];
    }
}
