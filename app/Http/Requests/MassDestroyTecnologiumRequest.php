<?php

namespace App\Http\Requests;

use App\Models\Tecnologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTecnologiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tecnologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tecnologia,id',
        ];
    }
}
