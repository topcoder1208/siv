<?php

namespace App\Http\Requests;

use App\Models\InserimentoSoglieRange;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInserimentoSoglieRangeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('inserimento_soglie_range_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:inserimento_soglie_ranges,id',
        ];
    }
}
