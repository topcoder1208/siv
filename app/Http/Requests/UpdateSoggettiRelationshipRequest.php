<?php

namespace App\Http\Requests;

use App\Models\SoggettiRelationship;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSoggettiRelationshipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('soggetti_relationship_edit');
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
