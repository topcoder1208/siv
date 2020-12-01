<?php

namespace App\Http\Requests;

use App\Models\InserimentoSoglieRange;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInserimentoSoglieRangeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inserimento_soglie_range_edit');
    }

    public function rules()
    {
        return [
            'percentuale'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'soglia_minima'  => [
                'numeric',
            ],
            'soglia_massima' => [
                'numeric',
            ],
        ];
    }
}
