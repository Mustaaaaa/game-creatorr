<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\InDatabase;

class StoreCharacterRequest extends FormRequest
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
            "name"=> "required|max:200",
            "attack"=> "required|integer|numeric",
            "defence"=> "required|integer|numeric",
            "speed"=> "required|integer|numeric",
            "life"=> "required|integer|numeric",
            "description"=> "required|max:2000",
            "items" => "exists:items,id",
            "type_id" => "exists:types,id",
            'item' => [new InDatabase]
        ];
    }
}
