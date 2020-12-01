<?php

namespace App\Http\Requests;

use App\Models\Cittum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCittumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cittum_create');
    }

    public function rules()
    {
        return [
            'cap'   => [
                'string',
                'min:5',
                'max:5',
                'required',
            ],
            'citta' => [
                'string',
                'required',
            ],
        ];
    }
}
