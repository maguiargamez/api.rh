<?php

namespace App\Http\Requests\Catalogos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardarEntidadFederativaRequest extends FormRequest
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
            'data.attributes.id_c_pais'=> ['required', 'integer', 'exists:c_paises,id'],
            'data.attributes.clave'=> ['required', 'string', 'max:3', Rule::unique('c_entidades_federativas', 'clave')->ignore($this->route('entidadFederativa'))],
            'data.attributes.valor'=> ['required', 'string', 'max:255'],
            'data.attributes.abrev'=> ['required', 'string', 'max:8']
        ];
    }

    public function validated()
    {
        return parent::validated()['data']['attributes'];
    }
}
