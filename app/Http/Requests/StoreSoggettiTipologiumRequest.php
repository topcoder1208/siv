<?php

namespace App\Http\Requests;

use App\Models\SoggettiTipologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSoggettiTipologiumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('soggetti_tipologium_create');
    }

    public function rules()
    {
        return [
            'tipologia' => [
                'string',
                'nullable',
            ],
        ];
    }
}
