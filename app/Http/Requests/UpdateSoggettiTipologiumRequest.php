<?php

namespace App\Http\Requests;

use App\Models\SoggettiTipologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSoggettiTipologiumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('soggetti_tipologium_edit');
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
