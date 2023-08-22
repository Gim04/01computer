<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeyboardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'position_id'=> 'request',
            'manufacturer_id' => 'required|numeric',
            'inventory_number' => 'required',
            'year'=> 'request',
            'model' => 'required',
            'layout'=> 'request',
            'switch'=> 'request',
            'description' => 'nullable'
        ];
    }
}
