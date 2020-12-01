<?php

namespace App\Http\Requests;

use App\Models\Exportlog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExportlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exportlog_edit');
    }

    public function rules()
    {
        return [
            'nome_file' => [
                'string',
                'nullable',
            ],
        ];
    }
}
