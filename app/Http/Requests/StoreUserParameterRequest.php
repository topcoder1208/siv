<?php

namespace App\Http\Requests;

use App\Models\UserParameter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserParameterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_parameter_create');
    }

    public function rules()
    {
        return [
            'tipologia' => [
                'string',
                'nullable',
            ],
            'parametro' => [
                'string',
                'nullable',
            ],
        ];
    }
}
