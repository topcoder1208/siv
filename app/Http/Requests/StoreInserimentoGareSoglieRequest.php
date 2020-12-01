<?php

namespace App\Http\Requests;

use App\Models\InserimentoGareSoglie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInserimentoGareSoglieRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inserimento_gare_soglie_create');
    }

    public function rules()
    {
        return [
            'premio'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'servizio'    => [
                'string',
                'nullable',
            ],
            'percentuale' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'quantita'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
