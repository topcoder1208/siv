<?php

namespace App\Http\Requests;

use App\Models\GrabDataMexal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGrabDataMexalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grab_data_mexal_create');
    }

    public function rules()
    {
        return [
            'nomefile' => [
                'string',
                'nullable',
            ],
        ];
    }
}
