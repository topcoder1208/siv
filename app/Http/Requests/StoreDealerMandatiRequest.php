<?php

namespace App\Http\Requests;

use App\Models\DealerMandati;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDealerMandatiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dealer_mandati_create');
    }

    public function rules()
    {
        return [
            'inizio' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fine'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
