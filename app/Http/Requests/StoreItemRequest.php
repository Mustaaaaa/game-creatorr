<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|max:50",
            "description" => "nullable|max:2000",
            "category"=> "required|max:50",
            "weight"=> "required|numeric",
            "cost"=> "required|integer|numeric",
            "coin"=> "required|string|max:20",
            "damage_dice" => "required|string|max:10"
        ];
    }
}
