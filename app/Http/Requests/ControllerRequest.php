<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControllerRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'min' => 'nullable|decimal:0,2',
            'max' => 'nullable|decimal:0,2',
        ];
    }

    public function messages(): array
    {
        return [
            'min.decimal' => "Поле 'Минимальная цена' имеет неверный формат",
            'max.decimal' => "Поле 'Максимальная цена' имеет неверный формат",
        ];
    }

}
