<?php

namespace App\Http\Requests;

use App\Enums\RatingType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRatingRequest extends FormRequest
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
            'type' => ['nullable', new Enum(RatingType::class)],
            'score' => ['nullable', 'integer'],
            'title' => ['nullable', 'max:50'],
            'description' => ['nullable', 'max:255'],
        ];
    }
}
