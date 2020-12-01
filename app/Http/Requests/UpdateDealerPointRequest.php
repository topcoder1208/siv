<?php

namespace App\Http\Requests;

use App\Models\DealerPoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDealerPointRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dealer_point_edit');
    }

    public function rules()
    {
        return [
            'conto_contabilita' => [
                'string',
                'nullable',
            ],
            'codice'            => [
                'string',
                'required',
            ],
            'point'             => [
                'string',
                'required',
            ],
            'indirizzo'         => [
                'string',
                'nullable',
            ],
            'cap'               => [
                'string',
                'min:5',
                'max:5',
                'nullable',
            ],
            'telefono'          => [
                'string',
                'nullable',
            ],
        ];
    }
}
