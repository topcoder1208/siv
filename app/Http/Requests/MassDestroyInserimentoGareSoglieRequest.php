<?php

namespace App\Http\Requests;

use App\Models\InserimentoGareSoglie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInserimentoGareSoglieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('inserimento_gare_soglie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:inserimento_gare_soglies,id',
        ];
    }
}
