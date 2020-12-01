<?php

namespace App\Http\Requests;

use App\Models\SoggettiFatturato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySoggettiFatturatoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('soggetti_fatturato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:soggetti_fatturatos,id',
        ];
    }
}
