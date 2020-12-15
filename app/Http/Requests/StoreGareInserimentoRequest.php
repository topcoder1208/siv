<?php

namespace App\Http\Requests;

use App\Models\GareInserimento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGareInserimentoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gare_inserimento_create');
    }

    public function rules()
    {
        return [
            'titolo'                => [
                'string',
                'nullable',
            ],
            'tipologia_gara'        => [
                'string',
                'nullable',
            ],
            'validita_inizio'       => [
                'nullable',
                'date_format:' . config('panel.date_format'),
            ],
            'validita_fine'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'brand_tipologias.*'    => [
                'integer',
            ],
            'brand_tipologias'      => [
                'array',
            ],
            'visibilitas.*'         => [
                'integer',
            ],
            'visibilitas'           => [
                'array',
            ],
            'esito'                 => [
                'nullable',
            ],
            'esito_incremento'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'esito_decremento'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'esito_negativos.*'     => [
                'integer',
            ],
            'esito_negativos'       => [
                'array',
            ],
            'numero_fasce_previste' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'servizi'               => [
                'string',
                'nullable',
            ],
            'brand'               => [
                'integer',
                'nullable',
            ],
            'metodo_attribuzione'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
