<?php

namespace Market\Http\Requests\Productos;

use Illuminate\Foundation\Http\FormRequest;

class ProductosCreateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nombre' => 'required|min:3|unique:productos,nombre',
            'precio' => 'required',
            'marca_id' => 'required|not_in:0'
        ];
    }

    public function messages()
    {
      return[
        'marca_id.not_in' => "El campo Marcas es obligatorio",
        'nombre.required' => "El nombre es obligatorio",
        'nombre.min' => "El nombre tiene que tener mínimo 3 caracteres"
      ];
    }
}
