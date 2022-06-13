<?php

namespace App\Http\Requests\Catalogos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardarSexoRequest extends FormRequest
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
            'data.attributes.clave'=> ['required', 'string', 'max:1', Rule::unique('c_sexos', 'clave')->ignore($this->route('sexo'))],
            'data.attributes.valor'=> ['required', 'string', 'max:255']
        ];
    }

    public function validated()
    {
        return parent::validated()['data']['attributes'];
    }
}
