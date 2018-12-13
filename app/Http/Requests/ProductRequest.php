<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required | string | max: 150',
    			'price' => 'required | numeric | min:10 | max:999999.99',
          'brand_id' => 'required | integer',
    			'category_id' => 'required | integer',
          'animal_id' => 'required | integer',
          'description' => 'required | string | max:500',
          'image' => 'required | string'
        ];
    }

    public function messages()
    {
        return [
          'required' => 'Este campo es obligatorio',
          'integer' => 'La opción elegida no es válida',
  			  'name.max' => 'Máximo: 150 caracteres',
    			'price.numeric' => 'El campo precio solo admite números',
    			'price.min' => 'El precio mínimo es 10',
    			'price.max' => 'El precio máximo es 999999.99',
          'description.max' => 'Máximo: 500 caracteres',
        ];
    }
}
