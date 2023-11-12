<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
        if($this->method() == "POST"){
            return [
                "name" => "required|string|max:255",
                "photo" => "required|file",
                "description" => "required|string",
                "duration" => "required|integer",
                "age_rating" => "required|integer|exists:age_ratings,id"
            ];
        }else{
            return [
                "name" => "sometimes|required|string|max:255",
                "photo" => "sometimes|required|file",
                "description" => "sometimes|required|string",
                "duration" => "sometimes|required|integer",
                "age_rating" => "sometimes|required|integer|exists:age_ratings,id"
            ];
        }
    }
}
