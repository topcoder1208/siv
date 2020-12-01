<?php

namespace App\Http\Requests;

use App\Models\Tecnologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTecnologiumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tecnologium_edit');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'nullable',
            ],
        ];
    }
}
