<?php

namespace App\Http\Requests;

use App\Models\Offerte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfferteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offerte_create');
    }

    public function rules()
    {
        return [
            'nome'            => [
                'string',
                'required',
                'unique:offertes',
            ],
            'fine_validita'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'inizio_validita' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'brand_id'        => [
                'required',
                'integer',
            ],
            'tipologia'       => [
                'required',
            ],
            'tecnologia_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
