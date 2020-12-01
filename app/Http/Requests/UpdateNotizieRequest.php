<?php

namespace App\Http\Requests;

use App\Models\Notizie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNotizieRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notizie_edit');
    }

    public function rules()
    {
        return [
            'titolo'                 => [
                'string',
                'nullable',
            ],
            'brand_id'               => [
                'required',
                'integer',
            ],
            'inizio_visualizzazione' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fine_visualizzazione'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'visualizza_primapagina' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'link'                   => [
                'string',
                'nullable',
            ],
        ];
    }
}
