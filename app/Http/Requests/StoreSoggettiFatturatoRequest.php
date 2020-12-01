<?php

namespace App\Http\Requests;

use App\Models\SoggettiFatturato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSoggettiFatturatoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('soggetti_fatturato_create');
    }

    public function rules()
    {
        return [
            'anno' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'mese' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
