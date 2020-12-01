<?php

namespace App\Http\Requests;

use App\Models\GrabDataMexal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGrabDataMexalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('grab_data_mexal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:grab_data_mexals,id',
        ];
    }
}
