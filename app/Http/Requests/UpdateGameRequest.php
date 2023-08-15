<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'developer' => ['required', 'max:80'],
            'publisher' => ['required', 'max:80'],
            'genre' => ['required', 'max:80'],
            'release_date' => ['required', 'date'],
            'description' => ['nullable', 'max:255'],
            'gog_url' => ['nullable', 'url'],
            'steam_url' => ['nullable', 'url'],
            'tags' => ['required', 'max:255'],
        ];
    }
}
