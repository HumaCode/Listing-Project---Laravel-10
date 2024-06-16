<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ListingUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'                 => ['nullable', 'image', 'max:3000', 'mimes:jpg,jpeg,png'],
            'thumbnail_image'       => ['nullable', 'image', 'max:3000', 'mimes:jpg,jpeg,png'],
            'title'                 => ['required', 'string', 'max:255'],
            'slug'                  => ['required', 'string', 'max:255', 'unique:listings,slug,' . $this->listing],
            'category_id'           => ['required', 'integer', 'exists:categories,id'],
            'location_id'           => ['required', 'integer', 'exists:locations,id'],
            'address'               => ['required', 'string', 'max:255'],
            'phone'                 => ['required', 'string', 'max:20'],
            'email'                 => ['required', 'string', 'max:255'],
            'website'               => ['nullable', 'url'],
            'facebook_link'         => ['nullable', 'url'],
            'x_link'                => ['nullable', 'url'],
            'linkedin_link'         => ['nullable', 'url'],
            'whatsapp_link'         => ['nullable', 'url'],
            'file'                  => ['nullable', 'mimes:jpg,jpeg,png,csv,pdf', 'max:10000'],
            'amenities.*'           => ['nullable', 'integer'],
            'description'           => ['required'],
            'google_map_embed_code' => ['nullable'],
            'seo_title'             => ['nullable', 'string', 'max:255'],
            'seo_description'       => ['nullable', 'string', 'max:255'],
            'is_verified'           => ['required', 'boolean'],
            'is_featured'           => ['required', 'boolean'],
            'status'                => ['required', 'boolean'],
        ];
    }
}
