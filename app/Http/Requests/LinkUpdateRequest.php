<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkUpdateRequest extends FormRequest
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
            'link' => 'required|max:256',
            'status' => 'required|boolean',
        ];
    }
}
