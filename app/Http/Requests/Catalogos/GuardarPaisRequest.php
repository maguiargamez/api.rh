<?php

namespace App\Http\Requests\Catalogos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardarPaisRequest extends FormRequest
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
            'data.attributes.clave'=> ['required', 'string', 'max:3', Rule::unique('c_paises', 'clave')->ignore($this->route('pais'))],
            'data.attributes.valor'=> ['required', 'string', 'max:255'],
            'data.attributes.nacionalidad'=> ['required', 'string', 'max:255']
        ];
    }

    public function validated()
    {
        return parent::validated()['data']['attributes'];
    }
}
