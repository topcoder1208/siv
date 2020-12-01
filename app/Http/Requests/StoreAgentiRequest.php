<?php

namespace App\Http\Requests;

use App\Models\Agenti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAgentiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('agenti_create');
    }

    public function rules()
    {
        return [
            'id_brand_id'          => [
                'required',
                'integer',
            ],
            'codice'               => [
                'string',
                'nullable',
            ],
            'agente'               => [
                'string',
                'required',
            ],
            'conto_contabilita'    => [
                'string',
                'nullable',
            ],
            'indirizzo'            => [
                'string',
                'nullable',
            ],
            'cap'                  => [
                'string',
                'min:5',
                'max:5',
                'nullable',
            ],
            'telefono'             => [
                'string',
                'nullable',
            ],
            'agenzia_responsabile' => [
                'string',
                'nullable',
            ],
        ];
    }
}
