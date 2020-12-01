<?php

namespace App\Http\Requests;

use App\Models\Dealer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDealerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dealer_edit');
    }

    public function rules()
    {
        return [
            'dealer'            => [
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
            'conto_contabilita' => [
                'string',
                'nullable',
            ],
            'codice'            => [
                'string',
                'nullable',
            ],
            'stato'             => [
                'string',
                'nullable',
            ],
        ];
    }
}
