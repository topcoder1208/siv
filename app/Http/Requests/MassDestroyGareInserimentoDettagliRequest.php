<?php

namespace App\Http\Requests;

use App\Models\GareInserimentoDettagli;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGareInserimentoDettagliRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gare_inserimento_dettaglis,id',
        ];
    }
}
