<?php

namespace App\Http\Requests;

use App\Models\Regioni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRegioniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('regioni_create');
    }

    public function rules()
    {
        return [
            'regione' => [
                'string',
                'required',
            ],
        ];
    }
}
