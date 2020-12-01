<?php

namespace App\Http\Requests;

use App\Models\GareInserimento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGareInserimentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gare_inserimento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gare_inserimentos,id',
        ];
    }
}
