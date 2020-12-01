<?php

namespace App\Http\Requests;

use App\Models\Vendite;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVenditeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vendite_create');
    }

    public function rules()
    {
        return [
            'data_inserimento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'ora_inserimento'  => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'operatore'        => [
                'string',
                'nullable',
            ],
            'quantita'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
