<?php

namespace App\Http\Requests;

use App\Models\Regioni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegioniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('regioni_edit');
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
