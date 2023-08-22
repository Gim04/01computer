<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJoystickRequest extends FormRequest
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
            'manufacturer_id'=> 'request',
            'inventory_number'=> 'request',
            'serial_number'=> 'request',
            'model'=>'request',
            'description'=>'nullable'
        ];
    }
}
