<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreComputerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'bool_position'=> 'required',
            'position_id'=> 'required',
            'manufacturer_id'=> 'required',
            'inventory_number' => 'required',
            'serial_number'=> 'required',
            'model' => 'required',
            'submodel' => 'required',
            'processor' => 'required',
            'speed' => 'required',
            'year' => 'required',
            'bit' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable'
        ];
    }
}
