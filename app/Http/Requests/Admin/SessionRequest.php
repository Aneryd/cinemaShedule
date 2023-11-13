<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            "film_id" => "required|integer|exists:films,id",
            "time_date" => "required|date_format:Y-m-d\TH:i",
            "price" => "required|integer"
        ];
    }

    public function messages(){
        return [
            "price.required" => "Поле стоимость обязательно для заполнения",
            "price.integer" => "Поле стоимость должно быть целым числом",
        ];
    }
}
