<?php

namespace App\Http\Requests;

use App\Models\GrabDataMexal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGrabDataMexalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grab_data_mexal_edit');
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
