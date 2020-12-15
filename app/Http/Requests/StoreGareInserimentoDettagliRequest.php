<?php

namespace App\Http\Requests;

use App\Models\GareInserimentoDettagli;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGareInserimentoDettagliRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gare_inserimento_dettagli_create');
    }

    public function rules()
    {
        return [
            'gare_inserimento_id' => [
                'required',
                'integer',
            ],
            'valore_n_1'          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'valore_n_2'          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'descrizione_valore'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
