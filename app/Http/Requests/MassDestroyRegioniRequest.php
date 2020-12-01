<?php

namespace App\Http\Requests;

use App\Models\Regioni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRegioniRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('regioni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:regionis,id',
        ];
    }
}
