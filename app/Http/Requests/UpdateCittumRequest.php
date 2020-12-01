<?php

namespace App\Http\Requests;

use App\Models\Cittum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCittumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cittum_edit');
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
