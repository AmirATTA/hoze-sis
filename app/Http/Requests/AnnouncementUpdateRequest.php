<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementUpdateRequest extends FormRequest
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
            'summary' => 'required|max:256',
            'slug' => 'required',
            'body' => 'required',
            'published_at' => 'nullable',
            'status' => 'required|boolean',
        ];
    }
}
