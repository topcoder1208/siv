<?php

namespace App\Http\Requests;

use App\Models\SoggettiTipologium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySoggettiTipologiumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('soggetti_tipologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:soggetti_tipologia,id',
        ];
    }
}
