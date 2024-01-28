<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:256',
            'subtitle' => 'required|max:256',
            'summary' => 'required|max:256',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'body' => 'required',
            'category_id' => 'required',
            'resource_label' => 'nullable',
            'resource_url' => 'nullable',
            'published_at' => 'nullable',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }
}
