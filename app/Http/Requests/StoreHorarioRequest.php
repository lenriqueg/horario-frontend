<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreHorarioRequest extends Request
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
            'dia_id'        => 'required',
            'aula_id'       => 'required',
            'hora_id'       => 'required',
            'materia_id'    => 'required',
            'ciclo_id'      => 'required'
        ];
    }
}
