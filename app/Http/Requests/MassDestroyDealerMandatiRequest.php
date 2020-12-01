<?php

namespace App\Http\Requests;

use App\Models\DealerMandati;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDealerMandatiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dealer_mandati_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dealer_mandatis,id',
        ];
    }
}
