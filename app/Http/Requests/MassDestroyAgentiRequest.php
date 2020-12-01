<?php

namespace App\Http\Requests;

use App\Models\Agenti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAgentiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:agentis,id',
        ];
    }
}
